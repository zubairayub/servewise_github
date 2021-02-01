<?php
// required files
require_once '../config.php';

// database initialization 
$connection = mysqli_connect($sql_server, $sql_user_name, $sql_password,$sql_database_name) or die('Configuration Error  : Can\'t login to the database');

// get chat settings 
$sql_settings = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'settings WHERE id=1 LIMIT 1');
$settings = mysqli_fetch_object($sql_settings);

// get chat texts
$texts = array();
$sql_texts = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'texts ORDER BY id ASC');
while ($data_texts = mysqli_fetch_object($sql_texts)) {
    $texts[$data_texts->id] = $data_texts->content;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel='stylesheet'  href='../assets/bootstrap/css/bootstrap.css' type='text/css' media='all' />
        <link rel='stylesheet'  href='../assets/css/flat-ui.css' type='text/css' media='all' />
        <link rel='stylesheet' href='../assets/css/chat.css' type='text/css' media='all' />
        <link rel='stylesheet' href='../assets/css/colors.css' type='text/css' media='all' />
        <script type='text/javascript' src='../assets/js/jquery-1.8.3.min.js'></script>
        <script type='text/javascript' src='../assets/js/jquery-ui-1.10.3.custom.min.js'></script>
        <script type='text/javascript' src='../assets/js/jquery.ui.touch-punch.min.js'></script>
        <script type='text/javascript' src='../assets/js/bootstrap.min.js'></script>
        <script type='text/javascript' src='../assets/js/bootstrap-select.min.js'></script>
        <script type='text/javascript' src='../assets/js/bootstrap-switch.min.js'></script>
        <script type='text/javascript' src='../assets/js/flatui-checkbox.min.js'></script>
        <script type='text/javascript' src='../assets/js/flatui-radio.min.js'></script>
        <script type='text/javascript' src='../assets/js/jquery.tagsinput.min.js'></script>
        <script type='text/javascript' src='../assets/js/jquery.placeholder.min.js'></script>
        <script type='text/javascript' src='../assets/js/jquery.nicescroll.min.js'></script>
        <script type='text/javascript' src='../assets/js/application.min.js'></script>
        <script>
    <?php
    echo 'var vcht_settings = {};';
    foreach ($settings as $key => $value) {
        if($key != 'purchaseCode'){
            echo 'vcht_settings.' . $key . '="' . $value . '";'."\n";
        }
    }
    echo 'var vcht_user = "";'."\n";
    echo 'var vcht_userPic = "";'."\n";
    echo 'var vcht_texts = new Array();'."\n";

    echo 'vcht_texts.push("");'."\n";
    foreach ($texts as $text) {
        $text = str_replace("\n", '<br/>', $text);
        $text=str_replace("\r","",$text);
        echo 'vcht_texts.push("'.$text.'");'."\n";
    }
    ?>
        </script>        
        <script type='text/javascript' src='../assets/js/chat.min.js'></script>
    </head>
    <body>

        <div id="chat" class="vcht_chat">
            <div id="chatPanel" class="container-fluid vcht_chat">
                <div id="chatHeader" class="palette palette-turquoise">
                    <span class="fui-chat"></span>
                    <span class="text"><?php echo $texts[12]; ?></span>
                </div>
                <div id="chatContent">
                    <span id="vcht_loader" class="ouro ouro2">
                        <span class="left"><span class="anim"></span></span>
                        <span class="right"><span class="anim"></span></span>
                    </span>
                    <div id="chatIntro">
                        <div class="row-fluid">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <div class="avatarImg"></div>
                                </div>
                                <div class="form-group" id="chatIntro_formGroup">
                                    <input type="text" class="form-control" value="" placeholder="<?php echo $texts[2]; ?>" id="chatIntro_username">
                                    <label class="chatIntro_username_icon fui-user" for="login-name"></label>
                                </div>
                                <a class="btn btn-primary btn-lg btn-block" href="javascript:" onclick="vcht_validUsername();"><?php echo $texts[3]; ?></a>
                            </div>
                        </div>
                    </div>
                    <div id="chatRoom">
                        <div id="chatHistory"></div>
                        <div id="chatWrite" class="palette palette-clouds">
                            <div class="form-group">
                                <textarea class="form-control" rows="3"></textarea>     
                                <a href="javascript:" onclick="vcht_sendMessage();" class="btn btn-default"><span class="fui-chat"></span></a>                   
                            </div>
                        </div>
                    </div>
                    <div id="emailForm">
                        <div class="row-fluid">
                            <div class="col-md-12">
                                <p><?php echo $texts[6]; ?></p>
                                <div class="form-group">
                                    <input type="email" id="chatEmail_email" class="form-control"  placeholder="<?php echo $texts[7]; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="phone" id="chatEmail_phone" class="form-control"  placeholder="<?php echo $texts[11]; ?>">
                                </div>
                                <div class="form-group">
                                    <textarea  id="chatEmail_msg" class="form-control" rows="3" placeholder="<?php echo $texts[8]; ?>"></textarea>                      
                                </div>
                                <a href="javascript:" onclick="vcht_sendEmail();" class="btn btn-default"><span class="fui-mail"></span><?php echo $texts[9]; ?></a>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>
<?php
mysqli_close($connection);
?>