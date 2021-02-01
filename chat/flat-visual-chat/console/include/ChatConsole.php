<?php

class ChatConsole
{

    public $settings;
    public $sql_prefix = 'vcht_';
    private $firstLaunch = false;
    private $operator = false;
    private $conn;

    public function __construct($prefix, $conn)
    {
        $this->conn = $conn;
        $this->sql_prefix = $prefix; 
        $firstLaunch = $this->checkInstallation();
        $this->checkUpdate();
        if ($this->checkAdmin()) {
            if ($this->checkLogin()) {
                $this->render_chat();
            } else {
                $this->render_loginPanel();
            }
        } else {
            if (!$this->checkLogin()) {
                $this->render_registerPanel();
            } else {
                $this->render_loginPanel();
            }
        }
      // $this->recoverCountries();
    }

    public function getSettings()
    {
        $sql_settings = mysqli_query($this->conn, 'SELECT * FROM ' . $this->sql_prefix . 'settings WHERE id=1 LIMIT 1') or die(mysqli_error($this->conn));
        return mysqli_fetch_object($sql_settings);
    }

    private function mysqli_result($res,$row=0,$col=0){ 
    $numrows = mysqli_num_rows($res); 
    if ($numrows && $row <= ($numrows-1) && $row >=0){
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    }
    return false;
}

    private function table_exists($tablename, $database = false)
    {

        if (!$database) {
            $res = mysqli_query($this->conn,"SELECT DATABASE()");
            $database = $this->mysqli_result($res, 0);
        }

        $res = mysqli_query($this->conn,"
        SELECT COUNT(*) AS count
        FROM information_schema.tables
        WHERE table_schema = '$database'
        AND table_name = '$tablename'
    ");

        return $this->mysqli_result($res, 0) == 1;
    }

    private function getCurrentUrl()
    {
        if (isset($_SERVER['HTTPS'])) {
            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        } else {
            $protocol = 'http';
        }
        return $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    }

    private function checkUpdate()
    {
        $sql_update1 = mysqli_query($this->conn,"SELECT ip FROM " . $this->sql_prefix . "logs");
        if (!$sql_update1) {
            mysqli_query($this->conn,"ALTER TABLE " . $this->sql_prefix . "logs ADD ip VARCHAR (128) NOT NULL");
            mysqli_query($this->conn,"ALTER TABLE " . $this->sql_prefix . "logs ADD country VARCHAR (128) NOT NULL");
            mysqli_query($this->conn,"ALTER TABLE " . $this->sql_prefix . "logs ADD city VARCHAR (250) NOT NULL");
        }
        $sql_update2 = mysqli_query($this->conn,"SELECT sendLogs FROM " . $this->sql_prefix . "settings");
        if (!$sql_update2) {
            mysqli_query($this->conn,"ALTER TABLE " . $this->sql_prefix . "settings ADD sendLogs BOOL NOT NULL");
            mysqli_query($this->conn,"ALTER TABLE " . $this->sql_prefix . "settings ADD emailLogSubject VARCHAR(250) NOT NULL");
            mysqli_query($this->conn,'UPDATE ' . $this->sql_prefix . 'settings SET emailLogSubject="New chat log from your website" WHERE id=1') or die(mysqli_error($this->conn));
            mysqli_query($this->conn,'INSERT INTO ' . $this->sql_prefix . 'texts (id,content,original,isTextarea) VALUES (11,"Phone","Phone",0);');
        }
        $sql_update3 = mysqli_query($this->conn,"SELECT updated FROM " . $this->sql_prefix . "settings");
        if (!$sql_update3) {
            mysqli_query($this->conn,"ALTER TABLE " . $this->sql_prefix . "settings ADD updated BOOL NOT NULL");
            mysqli_query($this->conn,"ALTER TABLE " . $this->sql_prefix . "settings ADD purchaseCode VARCHAR(250) NOT NULL");
            mysqli_query($this->conn,'INSERT INTO ' . $this->sql_prefix . 'texts (id,content,original,isTextarea) VALUES (12,"Let us a message","Let us a message",0);');
        }
        $sql_update4 = mysqli_query($this->conn,"SELECT * FROM " . $this->sql_prefix . "texts WHERE id=12");
        if (mysqli_num_rows($sql_update4) == 0) {
            mysqli_query($this->conn,'INSERT INTO ' . $this->sql_prefix . 'texts (id,content,original,isTextarea) VALUES (12,"Let us a message","Let us a message",0);');
        }
        $sql_update5 = mysqli_query($this->conn,"SELECT enableInitiate FROM " . $this->sql_prefix . "settings");
        if (mysqli_num_rows($sql_update5) == 0) {
            mysqli_query($this->conn,"ALTER TABLE " . $this->sql_prefix . "settings ADD enableInitiate BOOL NOT NULL");
        }
        
        $sql_update6 = mysqli_query($this->conn,"SELECT id FROM " . $this->sql_prefix . "users");
        if (mysqli_num_rows($sql_update6) == 0) {
             mysqli_query($this->conn,"CREATE TABLE " . $this->sql_prefix . "users (
		id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
                lastActivity DATETIME NOT NULL,
                userID INT(9) NOT NULL,
                IP VARCHAR(250) NOT NULL,
                username VARCHAR(250) NOT NULL,
		UNIQUE KEY id (id)
		);");
        }
               
        $sql_update7 = mysqli_query($this->conn,"SELECT vcht_id FROM " . $this->sql_prefix . "logs");
        if (mysqli_num_rows($sql_update7) == 0) {
            mysqli_query($this->conn,"ALTER TABLE " . $this->sql_prefix . "logs ADD vcht_id INT(11) NOT NULL");
            
        }     
        
        
    }

    private function recoverCountries()
    {
        $sql_logs = mysqli_query($this->conn,'SELECT * FROM ' . $this->sql_prefix . 'logs WHERE country=""') or die(mysqli_error($this->conn));
        while ($log = mysqli_fetch_object($sql_logs)) {
            try {
                $country = 'unknow';
                $city = 'unknow';
                $xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=$log->ip");
                $country = $xml->geoplugin_countryName;
                $city = $xml->geoplugin_city;
                mysqli_query($this->conn,'UPDATE ' . $this->sql_prefix . 'logs SET country="' . $country . '", city="' . $city . '"') or die(mysqli_error($this->conn));
            } catch (Exception $exc) {

            }
        }
    }

    private function checkInstallation()
    {
            $rep = $this->table_exists($this->sql_prefix . 'settings');
            if($rep != 1){
            // settings table
            $db_table_name = $this->sql_prefix . 'settings';
            $sql = "CREATE TABLE IF NOT EXISTS `$db_table_name` (
            `id` mediumint(9) NOT NULL AUTO_INCREMENT,
            `adminEmail` varchar(250) NOT NULL DEFAULT '',
            `emailSubject` varchar(250) NOT NULL DEFAULT '',
            `chatLogo` varchar(250) NOT NULL DEFAULT '',
            `chatDefaultPic` varchar(250) NOT NULL DEFAULT '',
            `colorA` varchar(7) NOT NULL DEFAULT '',
            `colorB` varchar(7) NOT NULL DEFAULT '',
            `colorC` varchar(7) NOT NULL DEFAULT '',
            `colorD` varchar(7) NOT NULL DEFAULT '',
            `colorE` varchar(7) NOT NULL DEFAULT '',
            `colorF` varchar(7) NOT NULL DEFAULT '',
            `shineColor` varchar(7) NOT NULL DEFAULT '',
            `bounceFx` tinyint(1) NOT NULL DEFAULT 1,
            `purchaseCode` varchar(250) NOT NULL DEFAULT '',
            `updated` tinyint(1) NOT NULL DEFAULT 0,
            `playSound` tinyint(1) NOT NULL DEFAULT 1,
            `url` varchar(250) NOT NULL DEFAULT '',
            `chatPosition` varchar(8) NOT NULL  DEFAULT 'right',
            `sendLogs` tinyint(1) NOT NULL DEFAULT 0,
            `emailLogSubject` varchar(250) NOT NULL DEFAULT '',
            `enableInitiate` tinyint(1) NOT NULL DEFAULT 1,
	     UNIQUE KEY id (id)
          ) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;";
            mysqli_query($this->conn,$sql) or die(mysqli_error($this->conn));
            mysqli_query($this->conn,'INSERT INTO ' . $db_table_name . ' (id,chatLogo,chatDefaultPic,adminEmail,emailSubject,colorA,colorB,colorC,colorD,colorE,colorF,shineColor,bounceFx,playSound,url,chatPosition,emailLogSubject) VALUES ('
                . '1,"administrator-48.png","guest-48.png","loopus_web@hotmail.fr","New message from your website chat",'
                . '"#1ABC9C","#34495E","#ECF0F1","#CACFD2","#FFFFFF","#bdc3c7","#1ABC9C",1,1,"' . $_SERVER['HTTP_HOST'] . '","right","New chat log from your website")') or die(mysqli_error($this->conn));

            // logs table
            $db_table_name = $this->sql_prefix . 'logs';
            $sql = "CREATE TABLE IF NOT EXISTS `$db_table_name` (
            `id` mediumint(9) NOT NULL AUTO_INCREMENT,
            `date` datetime ,
            `lastActivity` datetime DEFAULT NULL,
            `operatorLastActivity` datetime DEFAULT NULL,
            `userID` smallint(5) NOT NULL DEFAULT 0,
            `username` varchar(250) NOT NULL DEFAULT '',
            `operatorname` varchar(250) NOT NULL DEFAULT '',
            `operatorID` smallint(5) NOT NULL DEFAULT 0,
            `finished` tinyint(1) NOT NULL DEFAULT 0,
            `sent` tinyint(1) NOT NULL DEFAULT 0,
            `transfer` tinyint(1) NOT NULL DEFAULT 0,
            `ip` varchar(128) NOT NULL DEFAULT '',
            `country` varchar(128) NOT NULL DEFAULT '',
            `city` varchar(250) NOT NULL DEFAULT '',
            `vcht_id` int(11) NOT NULL DEFAULT 0,
	     UNIQUE KEY id (id)
          ) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;";
            mysqli_query($this->conn,$sql)or die(mysqli_error($this->conn));


            // messages table
            $db_table_name = $this->sql_prefix . 'messages';
            $sql = "CREATE TABLE IF NOT EXISTS `$db_table_name` (
            `id` mediumint(9) NOT NULL AUTO_INCREMENT,
            `date` datetime DEFAULT NULL,
            `logID` smallint(5) NOT NULL DEFAULT 0,
            `userID` smallint(5) NOT NULL DEFAULT 0,
            `isOperator` tinyint(1) NOT NULL DEFAULT 0,
            `operatorname` varchar(250) NOT NULL DEFAULT '',
            `content` text NOT NULL,
            `domElement` text NOT NULL,
            `url` varchar(250) NOT NULL DEFAULT '',
            `isRead` tinyint(1) NOT NULL DEFAULT 0,
	     UNIQUE KEY id (id)
          ) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;";
            mysqli_query($this->conn,$sql) or die(mysqli_error($this->conn));


            // operators tables
            $db_table_name = $this->sql_prefix . 'operators';
            $sql = "CREATE TABLE IF NOT EXISTS `$db_table_name` (
                `id` mediumint(9) NOT NULL AUTO_INCREMENT,
                `lastActivity` datetime DEFAULT NULL,
                `username` varchar(250) NOT NULL DEFAULT '',
                `picture` varchar(250) NOT NULL DEFAULT '',
                `email` varchar(250) NOT NULL DEFAULT '',
                `pass` varchar(250) NOT NULL DEFAULT '',
                `online` tinyint(1) NOT NULL DEFAULT 0,
                `rights` smallint(5) NOT NULL DEFAULT 0,
		UNIQUE KEY id (id)
              ) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;";
            mysqli_query($this->conn,$sql)or die(mysqli_error($this->conn));


            // users tables
            $db_table_name = $this->sql_prefix . 'users';
            $sql = "CREATE TABLE IF NOT EXISTS `$db_table_name` (
            `id` mediumint(9) NOT NULL AUTO_INCREMENT,
            `lastActivity` datetime NOT NULL,
            `userID` int(9) NOT NULL DEFAULT 0,
            `IP` varchar(250) NOT NULL DEFAULT '',
            `username` varchar(250) NOT NULL DEFAULT '',
		UNIQUE KEY id (id)
          ) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;";

            // texts tables
            $db_table_name = $this->sql_prefix . 'texts';
            $sql = "CREATE TABLE IF NOT EXISTS `$db_table_name` (
            `id` mediumint(9) NOT NULL AUTO_INCREMENT,
            `content` text NOT NULL,
            `original` text NOT NULL,
            `isTextarea` tinyint(1) NOT NULL DEFAULT 0,
		UNIQUE KEY id (id)
          ) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;";
            mysqli_query($this->conn,$sql) or die(mysqli_error($this->conn));
            mysqli_query($this->conn,'INSERT INTO ' . $db_table_name . ' (id,content,original,isTextarea) VALUES (1,"Need Help ?","Need Help ?",0);');
            mysqli_query($this->conn,'INSERT INTO ' . $db_table_name . ' (id,content,original,isTextarea) VALUES (2,"Enter your name","Enter your name",0);');
            mysqli_query($this->conn,'INSERT INTO ' . $db_table_name . ' (id,content,original,isTextarea) VALUES (3,"Start","Start",0);');
            mysqli_query($this->conn,'INSERT INTO ' . $db_table_name . ' (id,content,original,isTextarea) VALUES (4,"Hello :)\nPlease write your question.","Hello :)\nPlease write your question.",1);');
            mysqli_query($this->conn,'INSERT INTO ' . $db_table_name . ' (id,content,original,isTextarea) VALUES (5,"This discussion is finished.","This discussion is finished.",0);');
            mysqli_query($this->conn,'INSERT INTO ' . $db_table_name . ' (id,content,original,isTextarea) VALUES (6,"Sorry, there are currently no operators online.\nIf you wish, send us your question using the form below.","Sorry, there are currently no operators online.\nIf you wish, send us your question using the form below.",1);');
            mysqli_query($this->conn,'INSERT INTO ' . $db_table_name . ' (id,content,original,isTextarea) VALUES (7,"Enter your email here","Enter your email here",0);');
            mysqli_query($this->conn,'INSERT INTO ' . $db_table_name . ' (id,content,original,isTextarea) VALUES (8,"Write your message here","Write your message here",0);');
            mysqli_query($this->conn,'INSERT INTO ' . $db_table_name . ' (id,content,original,isTextarea) VALUES (9,"Send this message","Send this message",0);');
            mysqli_query($this->conn,'INSERT INTO ' . $db_table_name . ' (id,content,original,isTextarea) VALUES (10,"Thank you.\nYour message has been sent.\nWe will contact you soon.","Thank you.\nYour message has been sent.\nWe will contact you soon.",1);');
            mysqli_query($this->conn,'INSERT INTO ' . $db_table_name . ' (id,content,original,isTextarea) VALUES (11,"Phone","Phone",0);');
            mysqli_query($this->conn,'INSERT INTO ' . $db_table_name . ' (id,content,original,isTextarea) VALUES (12,"Let us a message","Let us a message",0);');
            mysqli_query($this->conn,'INSERT INTO ' . $db_table_name . ' (id,content,original,isTextarea) VALUES (13,"Name","Name",0);');

            }
            return $rep;
        
    }

    private function checkAdmin()
    {
        $sql_operators = mysqli_query($this->conn,'SELECT * FROM ' . $this->sql_prefix . 'operators WHERE rights=1') or die(mysqli_error($this->conn));
        return mysqli_num_rows($sql_operators);
    }

    private function checkLogin()
    {
        $rep = false;
        if (isset($_GET['action']) && $_GET['action'] == 'registerAdmin') {
            $username = mysqli_real_escape_string($this->conn,$_POST['username']);
            $email = mysqli_real_escape_string($this->conn,$_POST['email']);
            $pass = mysqli_real_escape_string($this->conn,$_POST['pass']);
            $url = mysqli_real_escape_string($this->conn,$_POST['url']);
            

            if (substr($url, -1) != '/') {
                $url = $url . '/';
            }

            mysqli_query($this->conn,'UPDATE ' . $this->sql_prefix . 'settings SET adminEmail="' . $email . '", url="' . $url . '"') or die(mysqli_error($this->conn));
            mysqli_query($this->conn,'INSERT INTO ' . $this->sql_prefix . 'operators (username,email,pass,rights,picture) VALUES ("' . $username . '","' . $email . '","' . $pass . '",1,"administrator-48.png")') or die(mysqli_error($this->conn));
            $sql_operator = mysqli_query($this->conn,'SELECT * FROM ' . $this->sql_prefix . 'operators WHERE email="' . $email . '" AND pass="' . $pass . '" LIMIT 1') or die(mysqli_error($this->conn));
            if (mysqli_num_rows($sql_operator) > 0) {
                $this->operator = mysqli_fetch_object($sql_operator);
                $rep = true;
            }
        } else if (isset($_GET['action']) && $_GET['action'] == 'login') {
            if (isset($_POST['email']) && isset($_POST['pass'])) {
                $email = mysqli_real_escape_string($this->conn,$_POST['email']);
                $pass = mysqli_real_escape_string($this->conn,$_POST['pass']);
            
            $sql_operator = mysqli_query($this->conn,'SELECT * FROM ' . $this->sql_prefix . 'operators WHERE email="' . $email . '" AND pass="' . $pass . '" LIMIT 1') or die(mysqli_error($this->conn));
            if (mysqli_num_rows($sql_operator) > 0) {
                $this->operator = mysqli_fetch_object($sql_operator);
                $rep = true;
            }
            } 
        }
        return $rep;
    }


    private function chat_checkUpdates()
    {
        mysqli_query($this->conn,'UPDATE ' . $this->sql_prefix . 'settings SET updated=0 WHERE id=1') or die(mysqli_error($this->conn));
        setcookie('pll_updateCP', 1, time() + 60 * 60 * 24 * 1);
    }

    private function render_registerPanel()
    {
        ?>
        <div class="container" style="width: 970px;">
            <form id="formLogin" method="POST" action="index.php?action=registerAdmin">
                <div class="login">
                    <div class="login-screen">
                        <div class="login-icon">
                            <img src="include/files/administrator-48.png" alt="Welcome">
                            <h4>Register the
                                <small>Admin account</small>
                            </h4>
                        </div>

                        <div class="login-form">
                            <div class="form-group">
                                <input type="text" class="form-control login-field" value=""
                                       placeholder="Choose a nickname" id="login-name" name="username">
                                <label class="login-field-icon fui-user" for="login-name"></label>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control login-field" value=""
                                       placeholder="Enter your email" id="login-email" name="email">
                                <label class="login-field-icon fui-mail" for="login-email"></label>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control login-field" value=""
                                       placeholder="Choose a password" id="login-pass" name="pass">
                                <label class="login-field-icon fui-lock" for="login-pass"></label>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control login-field"
                                       value="<?php echo "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s://" : "://") . $_SERVER['HTTP_HOST']; ?>"
                                       placeholder="Enter the website url" id="login-url" name="url">
                                <label class="login-field-icon " for="login-url"><span
                                        class="glyphicon glyphicon-link"></span></label>
                            </div>

                            <a class="btn btn-primary btn-lg btn-block" href="javascript:" onclick="validLoginForm();">Register</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php
    }

    private function render_loginPanel()
    {
        $settings = $this->getSettings();
        ?>
        <div class="container-fluid" style="width: 970px;">
            <form id="formLogin" method="POST" action="index.php?action=login">
                <div class="login">
                    <div class="login-screen">
                        <div class="login-icon">
                            <img src="include/files/<?php echo $settings->chatLogo; ?>" alt="Welcome">
                            <h4>Log in
                                <small>Chat console</small>
                            </h4>
                        </div>

                        <div class="login-form">
                            <div class="form-group">
                                <input type="email" class="form-control login-field" value=""
                                       placeholder="Enter your email" id="login-email" name="email">
                                <label class="login-field-icon fui-mail" for="login-email"></label>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control login-field" value=""
                                       placeholder="Enter your password" id="login-pass" name="pass">
                                <label class="login-field-icon fui-lock" for="login-pass"></label>
                            </div>

                            <a class="btn btn-primary btn-lg btn-block" href="javascript:" onclick="validLoginForm();">Login</a>
                            <a class="login-link" href="javascript:" onclick="$('#modal_lostpass').modal('show');">Lost
                                your password?</a>
                        </div>
                    </div>
            </form>
        </div>
        </div>

        <div class="modal fade" id="modal_lostpass">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                                class="sr-only">Close</span></button>
                        <h4 class="modal-title">Password lost ?</h4>
                    </div>
                    <div class="modal-body">
                        <p>Please enter your email :</p>

                        <div class="form-group">
                            <input type="email" class="form-control login-field" value="" placeholder="Enter your email"
                                   id="lost-email" name="email">
                        </div>
                        <div class="alert alert-danger" role="alert">
                            <p>This email is not registered</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="sendPass();">Send me the password
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div><!-- /.modal -->
    <?php
    }

    private function isUpdated()
    {

        $sql_settings = mysqli_query($this->conn,'SELECT * FROM ' . $this->sql_prefix . 'settings WHERE id=1 LIMIT 1') or die(mysqli_error($this->conn));
        $settings = mysqli_fetch_object($sql_settings);
        if ($settings->updated) {
            return false;
        } else {
            return true;
        }
    }

    private function render_chat()
    {
        $sql_settings = mysqli_query($this->conn,'SELECT * FROM ' . $this->sql_prefix . 'settings WHERE id=1 LIMIT 1') or die(mysqli_error($this->conn));
        $settings = mysqli_fetch_object($sql_settings);

        if ($this->isUpdated()) {
            ?>
            <div id="chat">
                <iframe id="vcht_consoleFrame" src="<?php echo $settings->url; ?>"></iframe>
                <?php
                if ($this->operator->rights == 1) {
                    ?>
                    <div id="vcht_admin_settings" class="vcht_admin_panel"></div>
                    <div id="vcht_admin_logs" class="vcht_admin_panel"></div>
                    <div id="vcht_admin_operators" class="vcht_admin_panel"></div>

                    <div id="vcht_adminPanel">
                        <nav class="navbar navbar-inverse navbar-embossed" role="navigation">

                            <ul class="nav  navbar-nav pull-left">
                                <li>
                                    <a href="javascript:" onclick="vcht_homeOpen();">
                                        <span class="glyphicon glyphicon-home"></span>Home
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:" onclick="vcht_operatorsOpen();">
                                        <span class="glyphicon glyphicon-user"></span>Operators List
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:" onclick="vcht_logsOpen();">
                                        <span class="glyphicon glyphicon glyphicon-th-list"></span>Logs
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:" onclick="vcht_settingsOpen();">
                                        <span class="glyphicon glyphicon glyphicon-cog"></span>Settings
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                <?php
                }
                ?>
                    
                <?php
                if ($settings->enableInitiate == 1) {
                    $top = 0;
                    if ($this->operator->rights == 1) {
                         $top = 53;
                    }
                    
                    ?>
                    <div id="vcht_initiatePanel" style="<?php echo 'top:'.$top.'px'; ?>">
                        <nav class="navbar navbar-inverse navbar-embossed" role="navigation">
                                 <ul id="customersList" class="nav navbar-nav navbar-left ">
                                    <li>
                                        <label><span class="vcht_connectedUsersNb">0</span> Users online </label>
                                        <div class="btn-group">
                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                    data-toggle="dropdown">
                                                Initiate a chat <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                            </ul>
                                        </div>
                                    </li>
                                </ul>                            
                        </nav>
                    </div>
                <?php
                }
                ?>
                   
                <div id="vcht_consolePanel">
                    <div class="container">

                        <nav class="navbar navbar-inverse navbar-embossed" role="navigation">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                        data-target="#navbar-collapse-01">
                                    <span class="sr-only">Toggle navigation</span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="navbar-collapse-01">
                                <ul id="usersList" class="nav navbar-nav navbar-left ">
                                    <li class="operatorTab text-center">
                                        <div class="avatar vcht_avatarImg"
                                             style="background-image: url(include/files/<?php echo $this->operator->picture; ?>);"></div>
                                        <strong id="vcht_operatorname"></strong>
                                        <input type="checkbox" id="vcht_onlineCB" data-toggle="switch"/>
                                    </li>
                                </ul>
                                <ul class="nav pull-right">
                                    <li>
                                        <a href="javascript:" onclick="vcht_toggleChatPanel();"
                                           id="vcht_btnMinimize"><span class="glyphicon glyphicon-chevron-down"></span></a>
                                    </li>
                                    <li>
                                        <a href="./" onclick="vcht_operatorDisconnect();"><span
                                                class="glyphicon glyphicon-remove"></span></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </nav>

                        <div id="vcht_consolePanelContent">
                        <span id="vcht_loader" class="ouro ouro2">
                            <span class="left"><span class="anim"></span></span>
                            <span class="right"><span class="anim"></span></span>
                        </span>

                            <div data-panel="chat" data-logid="0" class="row-fluid">
                                <div class="col-md-2 palette palette-wet-asphalt" id="vcht_userInfos">
                                    <div class="vcht_avatarImg"></div>
                                    <p>
                                        <strong></strong>
                                    </p>
                                </div>
                                <div class="col-md-9">
                                    <div id="vcht_chatContent"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="vcht_infosPanel">
                    <div class="container palette palette-wet-asphalt">
                        <div class="col-md-12 text-center">

                        </div>
                    </div>
                </div>
                <audio id="vcht_audioMsg" controls data-enable="<?php
                if ($settings->playSound) {
                    echo 'true';
                } else {
                    echo 'false';
                }
                ?>">
                    <source src="../assets/sound/message.ogg" type="audio/ogg">
                    <source src="../assets/sound/message.mp3" type="audio/mpeg">
                </audio>
            </div>
        <?php
        } else {
            ?>
            <div id="chat">
                <iframe id="vcht_consoleFrame" src="<?php echo $settings->url; ?>"></iframe>
                <?php
                if ($this->operator->rights == 1) {
                    ?>
                    <div id="vcht_admin_settings" class="vcht_admin_panel"></div>

                    <div id="vcht_adminPanel" class="only_settings">
                        <nav class="navbar navbar-inverse navbar-embossed" role="navigation">

                            <ul class="nav  navbar-nav pull-left">
                                <li>
                                    <a href="javascript:" onclick="vcht_settingsOpen();">
                                        <span class="glyphicon glyphicon glyphicon-cog"></span>Settings
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                <?php
                } else {
                    echo '<div class="alert alert-danger" role="alert">The plugin need to be activated, please login as administrator.</div>';
                }
                ?>
            </div>
        <?php
        }
        ?>
    <?php
    }

}
