<?php
 
//session_start();
$dbclass = '../app/model/classDatabaseManager.php';
require_once '../../../lib/functions.php';
 
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
    <form action="#" method="post">
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
        <style>
            
   
  form {
    padding: 15px 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;

  }
   
  form label {
    font-size: 14px;
    font-weight: bold;
    text-align: start;
    width: 100%;
  }
    
  #wrapper,
  #loginform {
    margin: 0 auto;
    padding-bottom: 5px;
    background: #fff;
    width: 350px;
    overflow: hidden;
    max-width: 100%;
    border: 1px solid rgba(0,0,0,0.1);
    box-shadow: 0px 3px 6px rgba(0,0,0,0.1);
    border-radius: 4px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
  }
   
  #loginform {
    padding-top: 18px;
    text-align: center;
  }
   
  #loginform p {
    padding: 15px 25px;
    font-size: 14px;
    font-weight: bold;
    font-family: sans-serif;
  }
   
  #chatbox {
    text-align: left;
    margin: 0 auto;
    margin-bottom: 5px;
    padding: 10px;
    background: #fff;
    height: 250px;
    width: 530px;
    border: 1px solid #a7a7a7;
    overflow: auto;
    border: none;
    border-bottom: 4px solid #a7a7a7;
  }
   
  #usermsg {
    flex-basis: 70%;
    width: 200px;
    border: none;
    border-bottom: 1px solid rgba(0,0,0,0.4);
    outline: none;
    font-size: 20px;
    font-family: sans-serif;
  }
   
  #name {
    border-radius: 4px;
    border: 1px solid rgba(0,0,0,0.2);
    padding: 2px 8px;
    width: 100%;
    margin-top: 10px;
    font-size: 14px;
    margin-bottom: 10px;
    box-shadow: 0px 3px 6px rgb(0 0 0 / 10%);
  }
   

  #enter{
    background: #3ff57f;
    border: 1px solid #08732c;
    color: white;
    padding: 4px 10px;
    font-weight: bold;
    border-radius: 4px;
    font-size: 20px;
    cursor: pointer;
    transition: .3s ease;
  }
  #enter:hover{
    background: #08732c;
  }
   
  .error {
    color: #ff0000;
  }
   
  #menuChat {
    width: 100%;
    padding: 15px 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #2979ff;
  }
   
  #menuChat p.welcome {
    flex: 1;
    color: #ffff;
  }
   
  a#exit {
    color: white;
    text-decoration: none;
    border: 1px solid #ffff;
    padding: 4px 8px;
    border-radius: 50%;
    font-weight: bold;
    transition: .3s ease;
  }

  .chat-inner-btn{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    width: 100%;
    background-color: #fff;
  }

  .chat-inner-btn .chat-text-box{
    font-size: 18px;
    margin: 5px 0px;
    flex-basis: 50%;
  }
  .chat-inner-btn .chat-text-button {
    flex-basis: 26%;
    margin-left: 10px;
    font-family: sans-serif;
    font-size: 18px;
    color: #928c8c;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    padding: 5px;
    transition: .3s ease;
}

  .chat-inner-btn .chat-text-button:hover{
    background-color: #2979ff;
    color: white;
    box-shadow: 0px 3px 6px rgba(0,0,0,0.2);
  }


  a#exit:hover {
    background: #c62828;
    color: white;
    border: 1px solid #c62828;
  }
   
   
  #chatbox .msgIn{
    margin: 0 0 10px 0;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    flex-wrap: wrap;
  }

  #chatbox .msgIn .msgc{
    background-color: #e0e0e0;
    width: 60%;
    border-radius: 0px 10px 10px 10px;
    box-shadow: 0px 3px 6px rgba(0,0,0,0.1);
    padding: 5px;
    overflow: hidden;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
  }
  #chatbox .msgSend{
    margin: 0 0 5px 0;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    flex-wrap: wrap;
  }

  #chatbox .msgSend .msgs{
    background: rgb(41,121,255);
background: linear-gradient(274deg, rgba(41,121,255,1) 0%, rgba(80,143,249,1) 100%);
    width: 60%;
    border-radius: 10px 0px 10px 10px;
    padding: 5px;
    overflow: hidden;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    box-shadow: 0px 3px 6px rgba(0,0,0,0.1);
  }
   
  .msgIn .left-info{
    width: 100%;
    border-right: 4px;
    padding: 5px;
    overflow: hidden;
  }

  .msgIn .left-info p{
    width: 100%;
    text-align: center;
    border-right: 4px;
    padding: 5px;
    overflow: hidden;
    border-top: 1px dashed rgba(0,0,0,0.2);
    border-bottom: 1px dashed rgba(0,0,0,0.2);
  }
   
  .msgIn span.chat-time {
    color: #3a3a3a;
    font-size: 60%;
    vertical-align: super;
    width: 100%;
    text-align: end;
  }
  .msgSend span.chat-time {
    color: white;
    font-size: 60%;
    vertical-align: super;
    width: 100%;
    text-align: end;
  }
   
  .msgIn b.user-name, .msgIn b.user-name-left {
    font-weight: bold;
    color: white;
    padding: 2px 4px;
    font-size: 90%;
    border-radius: 4px;
    margin: 0 5px 0 0;
  }

  #chatbox .msgIn .user-name{
    width: 100%;
    background-color: transparent;
    color: #3a3a3a;
  }
  .msgIn .msgc .msginner{
    text-align: start;
    font-size: 20px;
    margin-top: 5px;
    padding: 0px 5px;
    color: #3a3a3a;
    display: flex;
    flex-wrap: wrap;
  }
  .msgIn .msgc .msginner p{
    display: flex;
    flex-wrap: wrap;
    font-size: 14px;
  }


  /*  */
  #chatbox .msgSend .user-name{
    width: 100%;
    background-color: transparent;
    color: white;
  }
  .msgSend .msgs .msginner{
    text-align: start;
    font-size: 20px;
    margin: 5px 0px;
    padding: 0px 5px;
    color: white;
    display: flex;
    flex-wrap: wrap;
  }
  .msgSend .msgs .msginner p{
    display: flex;
    flex-wrap: wrap;
    font-size: 14px;
  }
   
  .msgIn b.user-name-left {
    background: orangered;
  }

  /* chatbox */
  .chatbox__support {
    display: flex;
    flex-direction: column;
    background: #eee;
    width: 300px;
    height: 450px;
    z-index: -123456;
    opacity: 0;
    transition: all .5s ease-in-out;
}

.chatbox--active {
  transform: translateY(-40px);
  z-index: 123456;
  opacity: 1;
}

.chatbox{
  position: fixed;
  bottom: 20px;
  right: 20px;
}

.chatbox .chatbox__button{
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

.chatbox .chatbox__button button{
    font-size: 40px;
    font-weight: 600;
    padding: 5px;
    border-radius: 50px;
    border: none;
    border: 1px solid rgba(0,0,0,0.2);
    outline:none;
    transition:.3s ease;
}
.chatbox .chatbox__button button:hover{
    background-color:#2979ff;
    color:white;
}

        </style>
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
                <div id="menuChat">
                    <p class="welcome">Welcome, <br><b><?php echo $_SESSION['name']; ?></b></p>
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
 
           <!--  <form class="chat-inner-btn" name="message" action="">
                <input class="chat-text-box" name="usermsg" type="text" id="usermsg" />
              
                <input class="chat-text-button" name="submitmsg" type="submit" id="submitmsg" value="Send" />
            </form> -->
        </div>
    <!--  -->

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
        <script type="text/javascript">
            // jQuery Document
            $(document).ready(function () {
              
                $("#submitmsg").click(function () {
                    var clientmsg = $("#usermsg").val();
                    $.post("../../../lib/chat.php", { text: clientmsg });
                    $("#usermsg").val("");
                    return false;
                });
 <?php  if(isset($_SESSION['visitor_id'])){
?>
      function loadLog() {
                    var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request
                    var postForm = { //Fetch form data
                       
            'user_id'     :  '<?php echo $_SESSION['visitor_id'] ;?>',
            'branch_id'     :  '<?php echo $_SESSION['vb_id']  ?>' //Store name fields value
        };
                    
                    $.ajax({
                        type : 'POST',
                        url: "../../../lib/getchat.php",
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


<?php
 } ?>
          
 
                $("#exit").click(function () {
                     
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
    isClicked: '</p class="Close">X</p>',
    isNotClicked: '<p class="CloseAplha"><i class="fa fa-comments" aria-hidden="true"></i></p>'
}
const chatbox = new InteractiveChatbox(chatButton, chatContent, icons);
chatbox.display();
chatbox.toggleIcon(false, chatButton);
        </script>
    </body>
</html>
<?php

?>