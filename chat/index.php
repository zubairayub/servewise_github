<?php
 
session_start();
$dbclass = '../app/model/classDatabaseManager.php';
require_once '../app/lib/functions.php';
 
if(isset($_GET['logout'])){    
     
    //Simple exit message
    $logout_message = "<div class='msgln'><div class='left-info'><p> User <b class='user-name-left'>". $_SESSION['name'] ."</b> has left the chat session.</p></div></div>";
    file_put_contents("log.html", $logout_message, FILE_APPEND | LOCK_EX);
     
    session_destroy();
    header("Location: index.php"); //Redirect the user
}
 
if(isset($_POST['enter'])){
    if($_POST['name'] != ""){

        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
        $name = $_SESSION['name'];
    $useremail = $_SESSION['email'] = $_POST['email'];
    $phoneno = $_SESSION['phone'] = $_POST['phone'];
    $branch_id  = $_SESSION['vb_id'] = $_POST['vb_id'];
      $user_data =   register_user($dbclass,$useremail,$name,$phoneno);

  $_SESSION['visitor_id'] = $user_data[0]['user_id']; 
    }
    else{
        echo '<span class="error">Please type in a name</span>';
    }
}
 
function loginForm(){
    echo
    '<div id="loginform">
    <p>Please enter your name to continue!</p>
    <form action="index.php" method="post">
      <label for="name">Name &mdash;</label>
      <input type="text" name="name" id="name" />
       <input type="text" name="email" id="name" />
        <input type="text" name="phone" id="name" />
         <input type="text" name="vb_id" id="name" value='. $_SESSION['vb_id'].' />
      <input type="submit" name="enter" id="enter" value="Enter" />
    </form>
  </div>';
}
 
?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
 
        <title>Tuts+ Chat Application</title>
        <meta name="description" content="Tuts+ Chat Application" />
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
    <!--  -->
        <div class="chatbox">
            <div class="chatbox__support">
            <?php 
            if(!isset($_SESSION['name'])){
        loginForm();
    }else{
        ?>

<div id="wrapper">
                <div id="menu">
                    <p class="welcome">Welcome, <br><b><?php echo $_SESSION['name']; ?></b></p>
                    <p class="logout"><a id="exit" href="#">X</a></p>
                </div>
    
                <div id="chatbox">
                Coversations
                </div>
    
                <form class="chat-inner-btn" name="message" action="">
                    <input class="chat-text-box" name="usermsg" type="text" id="usermsg" />
                    <input class="chat-text-button" name="submitmsg" type="submit" id="submitmsg" value="Send" />
                </form>
                </div>
    <?php } ?>
                    
            </div>
            <div class="chatbox__button">
                <button>Branch-1</button>
            </div>
        </div>
    <!--  -->

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
        <script type="text/javascript">
            // jQuery Document
            $(document).ready(function () {
                $("#submitmsg").click(function () {
                    var clientmsg = $("#usermsg").val();
                    $.post("../app/lib/chat.php", { text: clientmsg });
                    $("#usermsg").val("");
                    return false;
                });
 
                function loadLog() {
                    var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request
                    var postForm = { //Fetch form data
                       
            'user_id'     :  '<?php echo $_SESSION['visitor_id'] ;?>',
            'branch_id'     :  '<?php echo $_SESSION['vb_id']  ?>' //Store name fields value
        };
                    
                    $.ajax({
                        type : 'POST',
                        url: "../app/lib/getchat.php",
                        data : postForm,
                        cache: false,
                        success: function (html) {
                            $("#chatbox").html(html); //Insert chat log into the #chatbox div
 
                            //Auto-scroll           
                            var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height after the request
                            if(newscrollHeight > oldscrollHeight){
                                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                            }   
                        }
                    });
                }
 
                setInterval (loadLog, 1500);
 
                $("#exit").click(function () {
                    var exit = confirm("Are you sure you want to end the session?");
                    if (exit == true) {
                    window.location = "index.php?logout=true";
                    }
                });
            });
            class InteractiveChatbox {
    constructor(a, b, c) {
        this.args = {
            button: a,
            chatbox: b
        }
        this.icons = c;
        this.state = false; 
    }

    display() {
        const {button, chatbox} = this.args;
        
        button.addEventListener('click', () => this.toggleState(chatbox))
    }

    toggleState(chatbox) {
        this.state = !this.state;
        this.showOrHideChatBox(chatbox, this.args.button);
    }

    showOrHideChatBox(chatbox, button) {
        if(this.state) {
            chatbox.classList.add('chatbox--active')
            this.toggleIcon(true, button);
        } else if (!this.state) {
            chatbox.classList.remove('chatbox--active')
            this.toggleIcon(false, button);
        }
    }

    toggleIcon(state, button) {
        const { isClicked, isNotClicked } = this.icons;
        let b = button.children[0].innerHTML;

        if(state) {
            button.children[0].innerHTML = isClicked; 
        } else if(!state) {
            button.children[0].innerHTML = isNotClicked;
        }
    }
}


const chatButton = document.querySelector('.chatbox__button');
const chatContent = document.querySelector('.chatbox__support');
const icons = {
    isClicked: '</p style="background-color:red; color:white;">X</p>',
    isNotClicked: '<p>CHAT</p>'
}
const chatbox = new InteractiveChatbox(chatButton, chatContent, icons);
chatbox.display();
chatbox.toggleIcon(false, chatButton);
        </script>
    </body>
</html>
<?php

?>