<?php
require_once '../../config.php';

$connection = mysqli_connect($sql_server, $sql_user_name, $sql_password,$sql_database_name) or die('Configuration Error  : Can\'t login to the database');

function redimImgMax($file, $width, $height)
{

    $x = $width;
    $y = $height;
    $size = getimagesize($file);

    if (($size[0] > $x) || ($size[1] > $y)) {
        $prop = $size[0] / $size[1];
        if ($size[0] > $size[1]) {
            $prop = $size[1] / $size[0];
            $newY = $y;
            $newX = $newY / $prop;
        } else {
            $prop = $size[1] / $size[0];
            $newY = $y;
            $newX = $newY / $prop;
        }

        if ($size['mime'] == 'image/jpeg') {
            $img_big = imagecreatefromjpeg($file);
            $img_mini = imagecreatetruecolor($newX, $newY) or $img_mini = imagecreate($newX, $newY);

            imagecopyresampled($img_mini, $img_big, 0, 0, 0, 0, $newX, $newY, $size[0], $size[1]);
            imagejpeg($img_mini, $file, 100);
        } elseif ($size['mime'] == 'image/png') {
            $img_big = imagecreatefrompng($file);
            $img_mini = imagecreatetruecolor($newX, $newY) or $img_mini = imagecreate($newX, $newY);

            imagealphablending($img_mini, false);
            imagesavealpha($img_mini, true);
            imagealphablending($img_big, true);


            imagecopyresampled($img_mini, $img_big, 0, 0, 0, 0, $newX, $newY, $size[0], $size[1]);
            imagepng($img_mini, $file);
        } elseif ($size['mime'] == 'image/gif') {
            $img_big = imagecreatefromgif($file);
            $img_mini = imagecreatetruecolor($newX, $newY) or $img_mini = imagecreate($newX, $newY);
            imagecopyresampled($img_mini, $img_big, 0, 0, 0, 0, $newX, $newY, $size[0], $size[1]);

            imagegif($img_mini, $file);
        }
    }
}

function sendLogEmail($sql_prefix, $logID)
{
    $sql_logs = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'logs WHERE id=' . $logID . ' LIMIT 1') or die(mysqli_error($connection));
    $sql_settings = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'settings WHERE id=1 LIMIT 1') or die(mysqli_error($connection));
    $settings = mysqli_fetch_object($sql_settings);
    if ($settings->sendLogs) {
        $headers = "Return-Path: " . $settings->adminEmail . "\n";
        $headers .= "From:" . $settings->adminEmail . "\n";
        $headers .= "X-Mailer: PHP " . phpversion() . "\n";
        $headers .= "Reply-To: " . $settings->adminEmail . "\n";
        $headers .= "X-Priority: 3 (Normal)\n";
        $headers .= "Mime-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=utf-8\n";

        $log = mysqli_fetch_object($sql_logs);
        $content = '<p>Date : ' . $log->date . '</p>';

        $sql_msg = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'messages WHERE logID=' . $logID . ' ORDER BY date ASC') or die(mysqli_error($connection));
        while ($msg = mysqli_fetch_object($sql_msg)) {
            $date = substr($msg->date, strpos($msg->date, ' ') + 1);
            if ($msg->isOperator) {
                $content .= '<p><strong style="color: #2980b9;">' . $msg->operatorname . '</strong> <span style="font-size:11px; color: #777;">(' . $date . ')</span> : ' . $msg->content . '</p>';
            } else {
                $content .= '<p><strong>' . $log->username . '</strong> (' . $date . ') : ' . $msg->content . '</p>';
            }
        }

        mail($settings->adminEmail, $settings->emailLogSubject, $content, $headers);
    }
}

function chat_checkUpdates($sql_prefix, $set)
{
    global $wpdb;
    $repV = 1;
    $rep = "";
    $sql_settings = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'settings WHERE id=1 LIMIT 1') or die(mysqli_error($connection));
    $settings = mysqli_fetch_object($sql_settings);
    $current = $settings->updated;

    echo $repV;
}

function updateCSS($sqlprefix)
{

    chmod('../../assets/css/colors.css', 0747);
    chmod('../../assets/css/colors_front.css', 0747);
    $sql_settings = mysqli_query($connection,'SELECT * FROM ' . $sqlprefix . 'settings WHERE id=1 LIMIT 1') or die(mysqli_error($connection));
    $settings = mysqli_fetch_object($sql_settings);
    $colorsStyles = '
        body {
            color: ' . $settings->colorB . ';
        }
        .vcht_chat .palette-turquoise,.btn-primary,.btn-primary:hover,.btn-primary:active {
            background-color: ' . $settings->colorA . ';
            color: ' . $settings->colorE . ';
        }
        .vcht_chat .bubble_right .bubble_arrow {
            border-color: transparent transparent transparent ' . $settings->colorA . ';
        }
        .vcht_chat .palette-clouds {
            background-color: ' . $settings->colorC . ';
            color: ' . $settings->colorF . ';
        }
        .vcht_chat .form-control:focus {
            border-color: ' . $settings->colorA . ';
        }
        .vcht_chat .anim {
            background: none repeat scroll 0 0 ' . $settings->colorA . ';
        }
        .vcht_chat .btn-default,.btn-default:hover,.btn-default:active {
            background-color: ' . $settings->colorD . ';
        }
        .vcht_chat .form-control {
            border-color: ' . $settings->colorD . ';
        }
        .vcht_chat .bubble_left .bubble_arrow {
            border-color: transparent ' . $settings->colorC . ' transparent transparent;
        }
        .vcht_selectedDom {
            -moz-box-shadow: 0px 0px 40px 0px ' . $settings->shineColor . ' ;
            -webkit-box-shadow: 0px 0px 40px 0px ' . $settings->shineColor . ' ;
            -o-box-shadow: 0px 0px 40px 0px ' . $settings->shineColor . ' ;
            box-shadow: 0px 0px 40px 0px ' . $settings->shineColor . ' ;
        }
        .nicescroll-rails > div {
            background-color: ' . $settings->colorD . ' !important;
        }
        .avatarImg {
            background-image: url(../../console/include/files/' . $settings->chatDefaultPic . ');
        }

        @-o-keyframes glow {
            0% {
                -o-box-shadow: 0px 0px 10px 0px ' . $settings->shineColor . ';
            }
            50% {
                -o-box-shadow: 0px 0px 40px 0px ' . $settings->shineColor . ';
            }
            100% {
                -o-box-shadow: 0px 0px 10px 0px ' . $settings->shineColor . ';
            }
        }
        @-moz-keyframes glow {
            0% {
                -moz-box-shadow: 0px 0px 10px 0px ' . $settings->shineColor . ';
            }
            50% {
                -moz-box-shadow: 0px 0px 40px 0px ' . $settings->shineColor . ';
            }
            100% {
                -moz-box-shadow: 0px 0px 10px 0px ' . $settings->shineColor . ';
            }
        }
        @-webkit-keyframes glow {
            0% {
                -webkit-box-shadow: 0px 0px 10px 0px ' . $settings->shineColor . ';
            }
            50% {
                -webkit-box-shadow: 0px 0px 40px 0px ' . $settings->shineColor . ';
            }
            100% {
                -webkit-box-shadow: 0px 0px 10px 0px ' . $settings->shineColor . ';
            }
        }
        @keyframes glow {
            0% {
                box-shadow: 0px 0px 10px 0px ' . $settings->shineColor . ' ;
            }
            50% {
                box-shadow: 0px 0px 40px 0px ' . $settings->shineColor . ' ;
            }
            100% {
                box-shadow: 0px 0px 10px 0px ' . $settings->shineColor . ' ;
            }
        }
        ';

    $fp = fopen('../../assets/css/colors.css', 'w');
    fwrite($fp, $colorsStyles);
    fclose($fp);

    $colorsStyles2 = '
        .vcht_selectedDom {
            -moz-box-shadow: 0px 0px 40px 0px ' . $settings->shineColor . ' !important;
            -webkit-box-shadow: 0px 0px 40px 0px ' . $settings->shineColor . ' !important;
            -o-box-shadow: 0px 0px 40px 0px ' . $settings->shineColor . ' !important ;
            box-shadow: 0px 0px 40px 0px ' . $settings->shineColor . ' !important ;
        }
        @-o-keyframes glow {
            0% {
                -o-box-shadow: 0px 0px 10px 0px ' . $settings->shineColor . ';
            }
            50% {
                -o-box-shadow: 0px 0px 40px 0px ' . $settings->shineColor . ';
            }
            100% {
                -o-box-shadow: 0px 0px 10px 0px ' . $settings->shineColor . ';
            }
        }
        @-moz-keyframes glow {
            0% {
                -moz-box-shadow: 0px 0px 10px 0px ' . $settings->shineColor . ';
            }
            50% {
                -moz-box-shadow: 0px 0px 40px 0px ' . $settings->shineColor . ';
            }
            100% {
                -moz-box-shadow: 0px 0px 10px 0px ' . $settings->shineColor . ';
            }
        }
        @-webkit-keyframes glow {
            0% {
                -webkit-box-shadow: 0px 0px 10px 0px ' . $settings->shineColor . ';
            }
            50% {
                -webkit-box-shadow: 0px 0px 40px 0px ' . $settings->shineColor . ';
            }
            100% {
                -webkit-box-shadow: 0px 0px 10px 0px ' . $settings->shineColor . ';
            }
        }
        @keyframes glow {
            0% {
                box-shadow: 0px 0px 10px 0px ' . $settings->shineColor . ' ;
            }
            50% {
                box-shadow: 0px 0px 40px 0px ' . $settings->shineColor . ' ;
            }
            100% {
                box-shadow: 0px 0px 10px 0px ' . $settings->shineColor . ' ;
            }
        }';
    $fp2 = fopen('../../assets/css/colors_front.css', 'w');
    fwrite($fp2, $colorsStyles2);
    fclose($fp2);
}


/*
     function get_country_city_from_ip($ip) {
        if (!filter_var($ip, FILTER_VALIDATE_IP)) {
            throw new InvalidArgumentException("IP is not valid");
        }
        $response = @file_get_contents('https://www.netip.de/search?query=' . $ip);
        if (empty($response)) {
            return "error";
        }
        $patterns = array();
        $patterns["domain"] = '#Name: (.*?)&nbsp;#i';
        $patterns["country"] = '#Country: (.*?)&nbsp;#i';
        $patterns["state"] = '#State/Region: (.*?)<br#i';
        $patterns["town"] = '#City: (.*?)<br#i';

        $ipInfo = array();
        foreach ($patterns as $key => $pattern) {
            $ipInfo[$key] = preg_match($pattern, $response, $value) && !empty($value[1]) ? $value[1] : 'not found';
        }
        return $ipInfo;
    }*/

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'vcht_settings_view') {

        $sql_settings = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'settings WHERE id=1 LIMIT 1') or die(mysqli_error($connection));
        $settings = mysqli_fetch_object($sql_settings);
        ?>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs" style="margin-bottom: 28px;" role="tablist">
                        <li class="active"><a href="#set_general" role="tab" data-toggle="tab">General</a></li>
                        <li><a href="#set_colors" role="tab" data-toggle="tab">Colors</a></li>
                        <li><a href="#set_texts" role="tab" data-toggle="tab">Texts</a></li>
                    </ul>
                    <div class="vcht_response"></div>
                    <form id="form_settings" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="vcht_settings_save">

                        <div class="tab-content">
                            <div class="tab-pane active" id="set_general">
                                <div class="form-group">
                                    <label for="set_purchaseCode">Envato purchase code (<a href="../assets/images/themeforest_purchasecode.png" target="_blank">Where can I find it ?</a>)</label>
                                    <input type="text" id="set_purchaseCode" name="purchaseCode" value="<?php
                                    echo $settings->purchaseCode;
                                    ?>" class="form-control" placeholder="Enter your purchase code">
                                </div>
                                <div class="form-group">
                                    <label for="set_url">Website url</label>
                                    <input type="text" id="set_url" name="url" value="<?php
                                    echo $settings->url;
                                    ?>" class="form-control" placeholder="http://www.mywebsite.com">
                                </div>
                                <div class="form-group">
                                    <label for="set_operatorPicture">Default picture</label>
                                    <input type="file" id="set_operatorPicture" name="chatLogo" value="<?php
                                    echo $settings->chatLogo;
                                    ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="set_customerPicture">Customer picture</label>
                                    <input type="file" id="set_customerPicture" name="chatDefaultPic" value="<?php
                                    echo $settings->chatDefaultPic;
                                    ?>" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label for="set_enableInitiate">Enable "Initiate chat" feature ?</label>
                                    <select id="set_enableInitiate" class="form-control" name="enableInitiate"
                                            class="form-control">
                                        <option value="0">No</option>
                                        <option value="1" <?php
                                        if ($settings->enableInitiate) {
                                            echo 'selected';
                                        }
                                        ?>>Yes
                                        </option>
                                    </select>
                                    <small>If you are experiencing slowdowns on the server, disable this option to save network resources</small>
                                </div>
                                <div class="form-group">
                                    <label for="set_playSound">Play sound as notification</label>
                                    <select id="set_playSound" class="form-control" name="playSound"
                                            class="form-control">
                                        <option value="0">No</option>
                                        <option value="1" <?php
                                        if ($settings->playSound) {
                                            echo 'selected';
                                        }
                                        ?>>Yes
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="set_chatPosition">Chat position</label>
                                    <select id="set_chatPosition" name="chatPosition" class="form-control">
                                        <option value="right">Right</option>
                                        <option value="left" <?php
                                        if ($settings->chatPosition == 'left') {
                                            echo 'selected';
                                        }
                                        ?>>Left
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="set_emailSubject">Contact email subject</label>
                                    <input type="text" id="set_emailSubject" name="emailSubject"
                                           class="form-control"
                                           value="<?php
                                           echo $settings->emailSubject;
                                           ?>" placeholder="The contact email subject">
                                </div>
                                <div class="form-group">
                                    <label for="set_sendLogs">Send logs to the admin </label>
                                    <select id="set_sendLogs" name="sendLogs" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1" <?php
                                        if ($settings->sendLogs) {
                                            echo 'selected';
                                        }
                                        ?>>Yes
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="set_emailLogSubject">Log email subject</label>
                                    <input type="text" id="set_emailLogSubject" name="emailLogSubject"
                                           class="form-control"
                                           value="<?php
                                           echo $settings->emailLogSubject;
                                           ?>" placeholder="The log email subject">
                                </div>
                                <div class="form-group">
                                    <label for="set_bounceFx">Bounce Fx</label>
                                    <select id="set_bounceFx" class="form-control" name="bounceFx">
                                        <option value="0">No</option>
                                        <option value="1" <?php
                                        if ($settings->bounceFx) {
                                            echo 'selected';
                                        }
                                        ?>>Yes
                                        </option>
                                    </select>
                                </div>
                                <p>
                                    <a href="javascript:" onclick="vcht_settingsSave();" class="btn btn-primary">Save
                                        settings</a>
                                </p>
                            </div>
                            <div class="tab-pane" id="set_colors">
                                <div class="form-group">
                                    <label for="set_colorB">Default text color</label>
                                    <input type="text" id="set_colorB" name="colorB" value="<?php
                                    echo $settings->colorB;
                                    ?>" class="form-control colorpick">
                                </div>
                                <div class="form-group">
                                    <label for="set_colorA">User bubble background color and header</label>
                                    <input type="text" id="set_colorA" name="colorA" value="<?php
                                    echo $settings->colorA;
                                    ?>" class="form-control colorpick">
                                </div>
                                <div class="form-group">
                                    <label for="set_colorE">User bubble text color</label>
                                    <input type="text" id="set_colorE" name="colorE" value="<?php
                                    echo $settings->colorE;
                                    ?>" class="form-control colorpick">
                                </div>
                                <div class="form-group">
                                    <label for="set_colorC">Operator bubble background color</label>
                                    <input type="text" id="set_colorC" name="colorC" value="<?php
                                    echo $settings->colorC;
                                    ?>" class="form-control colorpick">
                                </div>
                                <div class="form-group">
                                    <label for="set_colorF">Operator bubble text color</label>
                                    <input type="text" id="set_colorF" name="colorF" value="<?php
                                    echo $settings->colorF;
                                    ?>" class="form-control colorpick">
                                </div>
                                <div class="form-group">
                                    <label for="set_colorD">Default button color</label>
                                    <input type="text" id="set_colorD" name="colorD" value="<?php
                                    echo $settings->colorD;
                                    ?>" class="form-control colorpick">
                                </div>
                                <div class="form-group">
                                    <label for="set_shineColor">Shining element color</label>
                                    <input type="text" id="set_shineColor" name="shineColor" value="<?php
                                    echo $settings->shineColor;
                                    ?>" class="form-control colorpick">
                                </div>
                                <p>
                                    <a href="javascript:" onclick="vcht_settingsSave();" class="btn btn-primary">Save
                                        settings</a>
                                </p>
                            </div>
                            <div class="tab-pane" id="set_texts">
                                <?php

                                $sql_text_offline = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'texts WHERE id=12 LIMIT 1') or die(mysqli_error($connection));
                                $text_offline = mysqli_fetch_object($sql_text_offline);
                                echo '<div class="form-group">';
                                    echo '<input id="t_' . $text_offline->id . '"  class="form-control" type="text" name="t_' . $text_offline->id . '"  placeholder="' . $text_offline->original . '" value="' . $text_offline->content . '"/>';
                                echo '</div>';

                                $sql_texts = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'texts ORDER BY id ASC') or die(mysqli_error($connection));
                                while ($text = mysqli_fetch_object($sql_texts)) {
                                    echo '<div class="form-group">';
                                    if ($text->isTextarea) {
                                        echo '<textarea id="t_' . $text->id . '"  class="form-control" name="t_' . $text->id . '"  placeholder="' . $text->original . '" >' . $text->content . '</textarea>';
                                    } else {
                                        echo '<input id="t_' . $text->id . '"  class="form-control" type="text" name="t_' . $text->id . '"  placeholder="' . $text->original . '" value="' . $text->content . '"/>';
                                    }
                                    echo '</div>';
                                }
                                ?>
                                <p>
                                    <a href="javascript:" onclick="vcht_settingsSave();" class="btn btn-primary">Save
                                        settings</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    <?php
    }
    if ($_POST['action'] == 'vcht_settings_save') {
        $sqlDatas = "";

        foreach ($_POST as $key => $value) {
            if ($key != 'action' && substr($key, 0, 2) != 't_') {
                if ($key == 'url') {
                    if (substr($value, -1) != '/') {
                        $value = mysqli_real_escape_string($connection,$value) . '/';
                    }
                }
                $sqlDatas .= $key . '="' . $value . '",';
            } else if (substr($key, 0, 2) == 't_') {

                $key = substr($key, 2);
                mysqli_query($connection,'UPDATE ' . $sql_prefix . 'texts SET content="' . stripslashes($value) . '" WHERE id=' . $key) or die(mysqli_error($connection));
            }
        }
        $sqlDatas = substr($sqlDatas, 0, -1);
        mysqli_query($connection,'UPDATE ' . $sql_prefix . 'settings SET ' . $sqlDatas . ' WHERE id=1') or die(mysqli_error($connection));

        if ($_FILES["chatLogo"]["error"] > 0) {

        } else {
            move_uploaded_file($_FILES["chatLogo"]["tmp_name"], "files/" . $_FILES["chatLogo"]["name"]);

            redimImgMax("files/" . $_FILES["chatLogo"]["name"], 96, 96);
            mysqli_query($connection,'UPDATE ' . $sql_prefix . 'settings SET chatLogo="' . $_FILES["chatLogo"]["name"] . '" WHERE id=1') or die(mysqli_error($connection));
        }
        if ($_FILES["chatDefaultPic"]["error"] > 0) {

        } else {
            move_uploaded_file($_FILES["chatDefaultPic"]["tmp_name"], "files/" . $_FILES["chatDefaultPic"]["name"]);
            redimImgMax("files/" . $_FILES["chatDefaultPic"]["name"], 48, 48);
            mysqli_query($connection,'UPDATE ' . $sql_prefix . 'settings SET chatDefaultPic="' . $_FILES["chatDefaultPic"]["name"] . '" WHERE id=1') or die(mysqli_error($connection));
        }
        if ($dh = opendir("files/")){
          while (($file = readdir($dh)) !== false){
            if(is_file("files/".$file) && strpos($file,'.png') === false && strpos($file,'.jpg') === false && strpos($file,'.PNG') === false && strpos($file,'.JPG') === false){
              unlink("files/".$file);
            }
          }
          closedir($dh);
        }
        updateCSS($sql_prefix);
        echo chat_checkUpdates($sql_prefix, true);
    }


// Logs
    if ($_POST['action'] == 'vcht_logs_view') {
        ?>
        <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped tablesorter">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Hour</th>
                        <th>Operator</th>
                        <th>User</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>IP</th>
                        <th class="sorter-false filter-false">Read log</th>
                        <th class="sorter-false filter-false">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $filterSQL = '';
                    if ($_POST['filter']) {
                        foreach ($_POST['filter'] as $key => $value) {
                            $filterSQL .= 'AND ' . $key . '="' . mysqli_real_escape_string($connection,$value) . '" ';
                        }
                        $filterSQL = substr($filterSQL, 3);
                        $filterSQL = 'WHERE ' . $filterSQL;
                    }
                    $sql_logs = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'logs ' . $filterSQL . ' ORDER BY id DESC') or die(mysqli_error($connection));
                    while ($log = mysqli_fetch_object($sql_logs)) {
                        echo '<tr><td>' . substr($log->date, 0, strpos($log->date, ' ')) . '</td>';
                        echo '<td>' . substr($log->date, strpos($log->date, ' ') + 1) . '</td>';
                        echo '<td>';
                        $sql_operator = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'operators WHERE id=' . $log->operatorID . ' LIMIT 1') or die(mysqli_error($connection));
                        if (mysqli_num_rows($sql_operator)) {
                            $operator = mysqli_fetch_object($sql_operator);
                            echo $operator->username;
                        }
                        echo '</td>';
                        echo '<td>' . $log->username . '</td>';
                        echo '<td>' . $log->country . '</td>';
                        echo '<td>' . $log->city . '</td>';
                        echo '<td>' . $log->ip . '</td>';
                        echo '<td><a href="javascript:" onclick="vcht_logOpen(' . $log->id . ');" class="btn btn-primary">Read this log</a></td>';
                        echo '<td><a href="javascript:" onclick="vcht_logRemove(' . $log->id . ');">Delete</a></td></tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="vcht_logRemoveModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p>Are you sure you want to delete this log ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-primary">Yes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div><!-- /.modal -->
    <?php
    }
    if ($_POST['action'] == 'vcht_log_remove') {
        $logID = mysqli_real_escape_string($connection,$_POST['logID']);
        mysqli_query($connection,'DELETE FROM ' . $sql_prefix . 'logs WHERE id=' . $logID) or die(mysqli_error($connection));
        echo 1;
    }

    if ($_POST['action'] == 'vcht_log_view') {
        $logID = mysqli_real_escape_string($connection,$_POST['logID']);
        $sql_logs = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'logs WHERE id=' . $logID . ' LIMIT 1') or die(mysqli_error($connection));
        $log = mysqli_fetch_object($sql_logs);
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        User : <strong><?php echo $log->username ?></strong>
                    </p>

                    <p>
                        Date : <strong><?php echo $log->date ?></strong>
                    </p>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <th>Hour</th>
                        <th>Username</th>
                        <th>Message</th>
                        <th>Is Operator ?</th>
                        <th>Page</th>
                        <th>Element displayed</th>
                        </thead>
                        <tbody>
                        <?php
                        $sql_msgs = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'messages WHERE logID=' . $logID . ' ORDER BY id DESC') or die(mysqli_error($connection));
                        while ($msg = mysqli_fetch_object($sql_msgs)) {
                            echo '<tr>';
                            echo '<td>' . substr($msg->date, strrpos($msg->date, ' ')) . '</td>';
                            if ($msg->isOperator) {
                                echo '<td>' . $msg->operatorname . '</td>';
                            } else {
                                echo '<td>' . $log->username . '</td>';
                            }
                            echo '<td>' . $msg->content . '</td>';
                            echo '<td>';
                            if ($msg->isOperator) {
                                echo 'Yes';
                            } else {
                                echo 'No';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($msg->url != "") {
                                echo '<a href="' . $msg->url . '" target="_blank">' . $msg->url . '</a>';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($msg->domElement != "") {
                                $url = $msg->url;
                                if (strpos('?', $url) !== false) {
                                    $url .= '&vcht_element=' . $msg->id;
                                } else {
                                    $url .= '?vcht_element=' . $msg->id;
                                }
                                echo '<a href="' . $url . '" target="_blank" class="btn btn-primary">View Element</a>';
                            }
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php
    }


    // Operators
if ($_POST['action'] == 'vcht_operators_view') {
    ?>
<div class="container">
    <div class="vcht_response"></div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped">
                <thead>
                <th>Username</th>
                <th>Email</th>
                <th>Is admin ?</th>
                <th>View logs</th>
                <th>Delete</th>
                </thead>
                <tbody>
                <?php
                $sql_logs = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'operators ORDER BY username ASC') or die(mysqli_error($connection));
                while ($operator = mysqli_fetch_object($sql_logs)) {
                    echo '<tr>';
                    echo '<td><a href="javascript:" onclick="vcht_operatorOpen(' . $operator->id . ')">' . $operator->username . '</td>';
                    echo '<td>' . $operator->email . '</td>';
                    echo '<td>';
                    if ($operator->rights == 1) {
                        echo 'Yes';
                    } else {
                        echo 'No';
                    }
                    echo '</td>';
                    echo '<td><a href="javascript:" onclick="vcht_logsOpen({operatorID: ' . $operator->id . '});" class="btn btn-primary">View logs</a></td>';
                    echo '<td>';
                    if ($operator->rights != 1) {
                        echo '<a href="javascript:" onclick="vcht_operatorRemove(' . $operator->id . ');">Delete</a>';
                    }
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
            <p>
                <a href="javascript:" onclick="vcht_operatorOpen();" class="btn btn-default">Add new operator</a>
            </p>
        </div>
    </div>
<?php
}
    if ($_POST['action'] == 'vcht_operator_remove') {
        $operatorID = mysqli_real_escape_string($connection,$_POST['operatorID']);
        mysqli_query($connection,'DELETE FROM ' . $sql_prefix . 'operators WHERE id=' . $operatorID) or die(mysqli_error($connection));
        echo 1;
    }
    if ($_POST['action'] == 'vcht_operator_save') {
        $operatorID = mysqli_real_escape_string($connection,$_POST['operatorID']);
        $email = mysqli_real_escape_string($connection,$_POST['email']);
 
        if ($operatorID > 0) {
            mysqli_query($connection,'UPDATE ' . $sql_prefix . 'operators SET username="' . mysqli_real_escape_string($connection,$_POST['username']). '",email="' . mysqli_real_escape_string($connection,$_POST['email']) . '",pass="' . mysqli_real_escape_string($connection,$_POST['pass']) . '" WHERE id=' . $operatorID) or die(mysqli_error($connection));
        } else {
            
            
            $sql_operator = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'operators WHERE email="' . $email . '" LIMIT 1') or die(mysqli_error($connection));
            $operator = mysqli_fetch_object($sql_operator);
            if(count($operator) == 0){
            
                mysqli_query($connection,'INSERT INTO ' . $sql_prefix . 'operators (username,email,pass) VALUES ("' . mysqli_real_escape_string($connection,$_POST['username']) . '","' . mysqli_real_escape_string($connection,$_POST['email']) . '","' . mysqli_real_escape_string($connection,$_POST['pass']) . '");');
                $operatorID = mysql_insert_id();
                if (!isset($_FILES["picture"])) {
                    mysqli_query($connection,'UPDATE ' . $sql_prefix . 'operators SET picture="administrator-48.png" WHERE id=' . $operatorID) or die(mysqli_error($connection));
                }
            }
        }
        if ($operator->rights == 1) {
            mysqli_query($connection,'UPDATE ' . $sql_prefix . 'settings SET adminEmail="' . mysqli_real_escape_string($connection,$_POST['email']) . '" WHERE id=1') or die(mysqli_error($connection));
        }

        if ($_FILES["picture"]["error"] > 0) {

        } else {
            move_uploaded_file($_FILES["picture"]["tmp_name"], "files/" . mysqli_real_escape_string($connection,$_FILES["picture"]["name"]));
            redimImgMax("files/" . mysqli_real_escape_string($connection,$_FILES["picture"]["name"]), 48, 48);
            mysqli_query($connection,'UPDATE ' . $sql_prefix . 'operators SET picture="' . mysqli_real_escape_string($connection,$_FILES["picture"]["name"]) . '" WHERE id=' . $operatorID) or die(mysqli_error($connection));
        }
        echo 1;
    }
    if ($_POST['action'] == 'vcht_operator_view') {
        $operator = false;
        $operatorID = 0;
        if (isset($_POST['operatorID']) && $_POST['operatorID'] > 0) {
            $operatorID = mysqli_real_escape_string($connection,$_POST['operatorID']);
            $sql_operator = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'operators WHERE id=' . $operatorID . ' LIMIT 1') or die(mysqli_error($connection));
            $operator = mysqli_fetch_object($sql_operator);
        }
        ?>
        <form id="form_operator" enctype="multipart/form-data">
            <input type="hidden" name="action" value="vcht_operator_save">
            <input type="hidden" name="operatorID" value="<?php echo $operatorID; ?>">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>
                            Operator : <?php
                            if ($operator) {
                                echo $operator->username;
                            }
                            ?>
                        </h2>

                        <div class="vcht_response"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="op_username">Username :</label>
                            <input type="text" id="op_username" name="username" value="<?php
                            if ($operator) {
                                echo $operator->username;
                            }
                            ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="op_email">Email :</label>
                            <input type="text" id="op_email" name="email" value="<?php
                            if ($operator) {
                                echo $operator->email;
                            }
                            ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="op_pass">Password :</label>
                            <input type="text" id="op_pass" name="pass" value="<?php
                            if ($operator) {
                                echo $operator->pass;
                            }
                            ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="op_picture">Avatar picture :</label>
                            <input type="file" id="op_picture" name="picture" value="<?php
                            if ($operator) {
                                echo $operator->picture;
                            }
                            ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="op_lastActivity">Last activity :</label>
                            <input type="text" id="op_lastActivity" name="lastActivity" disabled value="<?php
                            if ($operator) {
                                echo $operator->lastActivity;
                            }
                            ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="javascript:" onclick="vcht_operatorSave(<?php
                        if ($operator) {
                            echo $operator->id;
                        }
                        ?>);" class="btn btn-primary">Save</a>
                    </div>
                </div>
            </div>

            </div>
        </div>
        <?php
    }
    if ($_POST['action'] == 'vcht_operatorConnect') {
        $operatorID = mysqli_real_escape_string($connection,$_POST['operatorID']);
        mysqli_query($connection,'UPDATE ' . $sql_prefix . 'operators SET online=1, lastActivity="' . date('Y-m-d h:i:s') . '" WHERE id=' . $operatorID) or die(mysqli_error($connection));
    }
    if ($_POST['action'] == 'operatorDisconnect') {
        $operatorID = $mysqli_real_escape_string($connection,$_POST['operatorID']);
        mysqli_query($connection,'UPDATE ' . $sql_prefix . 'operators SET online=0, lastActivity="' . date('Y-m-d h:i:s') . '" WHERE id=' . $operatorID) or die(mysqli_error($connection));
    }
    if ($_POST['action'] == 'vcht_recoverChats') {
        $rep = array();

        $sql_settings = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'settings WHERE id=1 LIMIT 1') or die(mysqli_error($connection));
        $settings = mysqli_fetch_object($sql_settings);

        $operatorID = mysqli_real_escape_string($connection,$_POST['operatorID']);
        $sql_logs = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'logs WHERE finished=0 AND operatorID=' . $operatorID) or die(mysqli_error($connection));
        while ($value = mysqli_fetch_object($sql_logs)) {
            $value->avatarImg = $settings->chatDefaultPic;
            $sql_msgs = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'messages WHERE logID=' . $value->id) or die(mysqli_error($connection));
            while ($msg = mysqli_fetch_object($sql_msgs)) {
                $msg->avatarOperator = $settings->chatLogo;

                if ($msg->isOperator) {
                    $sql_operators = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'operators WHERE id=' . $msg->userID . ' LIMIT 1') or die(mysqli_error($connection));
                    $operator = mysqli_fetch_object($sql_operators);
                    $msg->avatarOperator = $operator->picture;
                    $msg->username = $value->operatorname;
                } else {
                    $msg->username = $value->username;
                }
                $msg->content = nl2br(stripslashes($msg->content));
                $value->messages[] = $msg;
                mysqli_query($connection,'UPDATE ' . $sql_prefix . 'messages SET isRead=1 WHERE id=' . $msg->id) or die(mysqli_error($connection));
            }
            $rep[] = $value;
        }
        echo json_encode($rep);
    }
    if ($_POST['action'] == 'vcht_closeChat') {
        $logID = mysqli_real_escape_string($connection,$_POST['logID']);
        mysqli_query($connection,'UPDATE ' . $sql_prefix . 'logs SET finished=1 WHERE id=' . $logID) or die(mysqli_error($connection));
        sendLogEmail($sql_prefix, $logID);

    }
    if ($_POST['action'] == 'vcht_check_operator_chat') {
        $operatorID = mysqli_real_escape_string($connection,$_POST['operatorID']);
        $rep = array();
        $rep['chatRequests'] = array();
        $rep['chats'] = array();
        $rep['chatsClosed'] = array();
        $rep['operators'] = array();
        $rep['transfers'] = array();
        $rep['users'] = array();

        // check new chat requests
        $sql_logs = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'logs WHERE finished=0 AND operatorID=0') or die(mysqli_error($connection));
        while ($value = mysqli_fetch_object($sql_logs)) {
            if (abs(strtotime(date('Y-m-d h:i:s')) - strtotime($value->lastActivity)) > 10) { // close chat
                mysqli_query($connection,'UPDATE ' . $sql_prefix . 'logs SET finished=1 WHERE id=' . $value->id) or die(mysqli_error($connection));
            } else {
                $rep['chatRequests'][] = $value;
            }
        }
        
        // check online users
        $sql_users = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'users') or die(mysqli_error($connection));
        while ($value = mysqli_fetch_object($sql_users)) {
            if (abs(strtotime(date('Y-m-d h:i:s')) - strtotime($value->lastActivity)) >40) { // remove user
                mysqli_query($connection,'DELETE FROM ' . $sql_prefix . 'users WHERE id=' . $value->id) or die(mysqli_error($connection));                
            } else {
                 $chkLog = false;
                $sql_logs = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'logs WHERE finished=0 AND vcht_id='.$value->id) or die(mysqli_error($connection));
                while ($log = mysqli_fetch_object($sql_logs)) {
                    if (abs(strtotime(date('Y-m-d h:i:s')) - strtotime($log->lastActivity)) < 60) {
                        $chkLog = true;
                    }
                }
                $value->logExist = $chkLog;
                $rep['users'][] = $value;
            }
            
        }
                

        // check chats
        $sql_logs = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'logs WHERE finished=0 AND operatorID=' . $operatorID) or die(mysqli_error($connection));
        while ($value = mysqli_fetch_object($sql_logs)) {
            mysqli_query($connection,'UPDATE ' . $sql_prefix . 'logs SET operatorLastActivity="' . date('Y-m-d h:i:s') . '" WHERE id=' . $value->id) or die(mysqli_error($connection));


            if (abs(strtotime(date('Y-m-d h:i:s')) - strtotime($value->lastActivity)) > 30) { // close chat
                mysqli_query($connection,'UPDATE ' . $sql_prefix . 'logs SET finished=1 WHERE id=' . $value->id) or die(mysqli_error($connection));
            }
            $sql_msg = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'messages WHERE isOperator=0 AND isRead=0 AND logID=' . $value->id) or die(mysqli_error($connection));
            $value->timePast = abs(strtotime(date('Y-m-d h:i:s')) - strtotime($value->date));
            $value->messages = array();
            while ($msg = mysqli_fetch_object($sql_msg)) {
                $msg->content = nl2br(stripslashes($msg->content));
                $value->messages[] = $msg;
                mysqli_query($connection,'UPDATE ' . $sql_prefix . 'messages SET isRead=1 WHERE id=' . $msg->id) or die(mysqli_error($connection));
            }
            $rep['chats'][] = $value;
        }

        // check closed chats
        if (strlen($_POST['currentChats']) > 0) {
            $currentChats = explode(',', $_POST['currentChats']);
            if (count($currentChats) > 0) {
                foreach ($currentChats as $currentChat) {
                    $sql_logs = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'logs WHERE sent=0 AND finished=1 AND id=' . $currentChat) or die(mysqli_error($connection));
                    if (mysqli_num_rows($sql_logs) > 0) {
                        $rep['chatsClosed'][] = $currentChat;
                        mysqli_query($connection,'UPDATE ' . $sql_prefix . 'logs SET sent=1 WHERE id=' . $currentChat) or die(mysqli_error($connection));
                        sendLogEmail($sql_prefix, $currentChat);
                    }
                }
            }
        }


        // check transfers
        $sql_logs = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'logs WHERE transfer=1 AND finished=0 AND operatorID=' . $operatorID) or die(mysqli_error($connection));
        while ($value = mysqli_fetch_object($sql_logs)) {
            mysqli_query($connection,'UPDATE ' . $sql_prefix . 'logs SET transfer=0 WHERE id=' . $value->id) or die(mysqli_error($connection));
            $sql_msg = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'messages WHERE logID=' . $value->id) or die(mysqli_error($connection));
            while ($msg = mysqli_fetch_object($sql_msg)) {
                $msg->content = nl2br(stripslashes($msg->content));
                if ($msg->isOperator) {
                    $msg->username = $value->username;
                }
                $value->messages[] = $msg;
            }
            $rep['transfers'][] = $value;
        }

        // return online operators
        mysqli_query($connection,'UPDATE ' . $sql_prefix . 'operators SET lastActivity="' . date('Y-m-d h:i:s') . '" WHERE id=' . $operatorID) or die(mysqli_error($connection));
        $sql_operators = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'operators WHERE online=1') or die(mysqli_error($connection));
        while ($value = mysqli_fetch_object($sql_operators)) {
            if (abs(strtotime(date('Y-m-d h:i:s')) - strtotime($value->lastActivity)) < 20) { // close chat
                $rep['operators'][] = $value;
            } else {
                mysqli_query($connection,'UPDATE ' . $sql_prefix . 'operators SET online=0 WHERE id=' . $value->id) or die(mysqli_error($connection));
            }
        }

        echo json_encode($rep);
    }


    if ($_POST['action'] == 'vcht_acceptChat') {
        $logID = mysqli_real_escape_string($connection,$_POST['logID']);
        $operatorID = mysqli_real_escape_string($connection,$_POST['operatorID']);
        $sql_logs = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'logs WHERE id=' . $logID) or die(mysqli_error($connection));
        $log = mysqli_fetch_object($sql_logs);
        if ($log->operatorID == 0) {
            mysqli_query($connection,'UPDATE ' . $sql_prefix . 'logs SET operatorID=' . $operatorID . ',operatorLastActivity="' . date('Y-m-d h:i:s') . '"  WHERE id=' . $logID) or die(mysqli_error($connection));
        }
        echo '1';
    }

    if ($_POST['action'] == 'vcht_operatorSay') {

        $operatorID = mysqli_real_escape_string($connection,$_POST['operatorID']);
        $msg = mysqli_real_escape_string($connection,$_POST['msg']);
        $domElement = mysqli_real_escape_string($connection,$_POST['domElement']);
        $url = mysqli_real_escape_string($connection,$_POST['url']);
        $logID = mysqli_real_escape_string($connection,$_POST['logID']);
        $operatorname = '';
        if (isset($_POST['operatorname'])) {
            $operatorname = mysqli_real_escape_string($connection,$_POST['operatorname']);
        }
        mysqli_query($connection,'UPDATE ' . $sql_prefix . 'logs SET operatorLastActivity="' . date('Y-m-d h:i:s') . '"  WHERE id=' . $logID) or die(mysqli_error($connection));

        mysqli_query($connection,'INSERT INTO ' . $sql_prefix . 'messages (logID,content,url,domElement,isOperator,date,userID,operatorname) VALUES (' . $logID . ',"' . $msg . '","' . $url . '","' . $domElement . '",1,"' . date('Y-m-d h:i:s') . '",' . $operatorID . ',"' . $operatorname . '");') or die(mysqli_error($connection));
        echo date('Y-m-d h:i:s');
    }

    if ($_POST['action'] == 'vcht_getLogChat') {
        $logID = mysqli_real_escape_string($connection,$_POST['logID']);
        $sql_logs = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'logs WHERE id=' . $logID) or die(mysqli_error($connection));
        if (mysqli_num_rows($sql_logs) > 0) {
            $log = mysqli_fetch_object($sql_logs);
            $sql_msgs = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'messages WHERE logID=' . $logID . ' ORDER BY id ASC') or die(mysqli_error($connection));
            while ($value = mysqli_fetch_object($sql_msgs)) {
                $value->content = nl2br(stripslashes($value->content));
                $log->messages[] = $value;
            }
            echo json_encode($log);
        }
    }
    if ($_POST['action'] == 'vcht_transferChat') {

        $logID = mysqli_real_escape_string($connection,$_POST['logID']);
        $operatorID = $_POST['operatorID'];
        mysqli_query($connection,'UPDATE ' . $sql_prefix . 'logs SET operatorID="' . $operatorID . '",transfer=1  WHERE id=' . $logID) or die(mysqli_error($connection));
        echo 1;
    }
    if ($_POST['action'] == 'vcht_recoverPass') {
        $sql_settings = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'settings WHERE id=1 LIMIT 1') or die(mysqli_error($connection));
        $settings = mysqli_fetch_object($sql_settings);

        $email = mysqli_real_escape_string($connection,$_POST['email']);
        $sql_operator = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'operators WHERE email="' . $email . '"') or die(mysqli_error($connection));

        if (mysqli_num_rows($sql_operator) > 0) {
            $operator = mysqli_fetch_object($sql_operator);
            $headers = "Return-Path: " . $settings->adminEmail . "\n";
            $headers .= "From:" . $settings->adminEmail . "\n";
            $headers .= "X-Mailer: PHP " . phpversion() . "\n";
            $headers .= "Reply-To: " . $settings->adminEmail . "\n";
            $headers .= "X-Priority: 3 (Normal)\n";
            $headers .= "Mime-Version: 1.0\n";
            $headers .= "Content-type: text/html; charset=utf-8\n";
            $urlConsole = $settings->url . 'flat-visual-chat/console/';
            $content = '<p>A password recovery request was made from <a href="' . $urlConsole . '">' . $urlConsole . '</a></p>';
            $content .= '<p>There is your password : <strong>' . $operator->pass . '</strong></p><br/>';
            $content .= '<p><i>You can reply to this email</i></p>';
            if (mail($email, "Chat operator password recovery", $content, $headers)) {
                echo 1;
            } else {
                echo 2;
            }
        } else {
            echo 'no';
        }
    }
    
    if ($_POST['action'] == 'vcht_initiateChat') {
        $operatorID = mysqli_real_escape_string($connection,$_POST['operatorID']);
        $operatorname = mysqli_real_escape_string($connection,$_POST['operatorname']);
        $vcht_id = mysqli_real_escape_string($connection,$_POST['vcht_id']);            
        
        $sql_user = mysqli_query($connection,'SELECT * FROM ' . $sql_prefix . 'users WHERE id='.$vcht_id.' LIMIT 1') or die(mysqli_error($connection));
        $user = mysqli_fetch_object($sql_user);
        
        mysqli_query($connection,'INSERT INTO ' . $sql_prefix . 'logs (lastActivity,vcht_id,username,operatorID,date,ip) VALUES ("' . date('Y-m-d h:i:s') . '","'.$vcht_id.'","' . $user->username . '","' .$operatorID . '","'.date('Y-m-d h:i:s').'","'.$user->IP.'")') or die(mysqli_error($connection));
        echo mysql_insert_id();
    }
}

mysqli_close($connection);
?>
