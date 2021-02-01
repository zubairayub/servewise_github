<?php

require_once '../config.php';

$connection = mysqli_connect($sql_server, $sql_user_name, $sql_password, $sql_database_name) or die('Configuration Error  : Can\'t login to the database');

function get_country_city_from_ip($ip) {
    if (!filter_var($ip, FILTER_VALIDATE_IP)) {
        throw new InvalidArgumentException("IP is not valid");
    }
    $response = @file_get_contents('https://api.apility.net/geoip/'.$ip);
    return $response;
}

function table_exists($tablename, $database = false) {

    if (!$database) {
        $res = mysqli_query($connection, "SELECT DATABASE()");
        $database = $this->mysqli_result($res, 0);
    }

    $res = mysqli_query($this->conn, "
        SELECT COUNT(*) AS count
        FROM information_schema.tables
        WHERE table_schema = '$database'
        AND table_name = '$tablename'
    ");

    return $this->mysqli_result($res, 0) == 1;
}

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'vcht_recoverChat') {
        $logID = mysqli_real_escape_string($connection, $_POST['logID']);

        $sql_logs = mysqli_query($connection, 'SELECT * FROM ' . $sql_prefix . 'logs WHERE id=' . $logID . ' LIMIT 1') or die(mysqli_error($connection));
        $log = mysqli_fetch_object($sql_logs);
        $sql_msgs = mysqli_query($connection, 'SELECT * FROM ' . $sql_prefix . 'messages WHERE logID=' . $logID . ' ORDER BY id ASC') or die(mysqli_error($connection));
        while ($value = mysqli_fetch_object($sql_msgs)) {
            if ($value->isOperator) {
                $sql_operators = mysqli_query($connection, 'SELECT * FROM ' . $sql_prefix . 'operators WHERE id=' . $value->userID . ' LIMIT 1') or die(mysqli_error($connection));
                $operator = mysqli_fetch_object($sql_operators);
                $value->username = $operator->username;
                $value->avatarOperator = $operator->picture;
            }
            $value->content = stripslashes(nl2br($value->content));
            $messages[] = $value;
        }
        echo json_encode($messages);
    }
    if ($_POST['action'] == 'vcht_checkChat') {
        $chkOperator = false;
        $sql_operators = mysqli_query($connection, 'SELECT * FROM ' . $sql_prefix . 'operators WHERE online=1') or die(mysqli_error($connection));
        while ($value = mysqli_fetch_object($sql_operators)) {
            if (abs(strtotime(date('Y-m-d h:i:s')) - strtotime($value->lastActivity)) < 5) {
                $chkOperator = true;
            }
        }
        if ($chkOperator) {
            echo '1';
        } else {
            echo 'nobody';
        }
    }
    if ($_POST['action'] == 'vcht_sendEmail') {
        $sql_settings = mysqli_query($connection, 'SELECT * FROM ' . $sql_prefix . 'settings WHERE id=1 LIMIT 1') or die(mysqli_error($connection));
        $settings = mysqli_fetch_object($sql_settings);
        $sql_texts = mysqli_query($connection, 'SELECT * FROM ' . $sql_prefix . 'texts WHERE id=11 LIMIT 1') or die(mysqli_error($connection));
        $text = mysqli_fetch_object($sql_texts);
        $sql_operator = mysqli_query($connection, 'SELECT * FROM ' . $sql_prefix . 'operators WHERE rights=1 LIMIT 1') or die(mysqli_error($connection));
        $operator = mysqli_fetch_object($sql_operator);
        $phone_text = $text->content;

        $sql_texts = mysqli_query($connection, 'SELECT * FROM ' . $sql_prefix . 'texts WHERE id=13 LIMIT 1') or die(mysqli_error($connection));
        if (mysqli_num_rows($sql_texts) > 0) {
            $text = mysqli_fetch_object($sql_texts);
            $name_text = $text->content;
        } else {
            $name_text = 'Name';
        }

        $userID = mysqli_real_escape_string($connection, $_POST['userID']);
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $msg = mysqli_real_escape_string($connection, $_POST['message']);
        $phone = mysqli_real_escape_string($connection, $_POST['phone']);

        $headers = "Return-Path: " . $email . "\n";
        $headers .= "From:" . $email . "\n";
        $headers .= "X-Mailer: PHP " . phpversion() . "\n";
        $headers .= "Reply-To: " . $email . "\n";
        $headers .= "X-Priority: 3 (Normal)\n";
        $headers .= "Mime-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=utf-8\n";
        $content = '<p>' . $name_text . ' : <strong>' . stripslashes($username) . '</strong></p>';
        $content .= '<p>' . $phone_text . ' : <strong>' . stripslashes($phone) . '</strong></p>';
        $content .= '<p>' . nl2br(stripslashes($msg)) . '</p>';

        mail($operator->email, $settings->emailSubject, $content, $headers);
        echo 1;
    }
    if ($_POST['action'] == 'vcht_check_user_chat') {
        $logID = mysqli_real_escape_string($connection, $_POST['logID']);
        $date_past = date('Y-m-d H:i:s', time() - 1 * 60);
        $rep = array();
        $rep['messages'] = array();
        $sql_logs = mysqli_query($connection, 'SELECT * FROM ' . $sql_prefix . 'logs WHERE id=' . $logID . ' LIMIT 1') or die(mysqli_error($connection));

        $log = mysqli_fetch_object($sql_logs);
        $rep['finished'] = $log->finished;

        if ($logID == 0) {
            $chkOperator = false;
            $sql_operators = mysqli_query($connection, 'SELECT * FROM ' . $sql_prefix . 'operators WHERE online=1') or die(mysqli_error($connection));
            while ($value = mysqli_fetch_object($sql_operators)) {
                if (abs(strtotime(date('Y-m-d h:i:s')) - strtotime($value->lastActivity)) < 10) {
                    $chkOperator = true;
                }
            }
            if (!$chkOperator) {
                $rep['finished'] = 1;
            }
        } else {


            if ($log->operatorID > 0) {
                if (abs(strtotime(date('Y-m-d h:i:s')) - strtotime($log->operatorLastActivity)) > 10) {
                    mysqli_query($connection, 'UPDATE ' . $sql_prefix . 'logs SET finished=1 WHERE id=' . $logID) or die(mysqli_error($connection));
                    $rep['finished'] = 1;
                }
                $sql_operators = mysqli_query($connection, 'SELECT * FROM ' . $sql_prefix . 'operators WHERE id=' . $log->operatorID . ' AND online=1 LIMIT 1') or die(mysqli_error($connection));
                if (mysqli_num_rows($sql_operators) == 0) {
                    mysqli_query($connection, 'UPDATE ' . $sql_prefix . 'logs SET finished=1 WHERE id=' . $logID) or die(mysqli_error($connection));
                    $rep['finished'] = 1;
                }
            } else {
                $chkOperator = false;
                $sql_operators = mysqli_query($connection, 'SELECT * FROM ' . $sql_prefix . 'operators WHERE online=1') or die(mysqli_error($connection));
                while ($value = mysqli_fetch_object($sql_operators)) {
                    if (abs(strtotime(date('Y-m-d h:i:s')) - strtotime($value->lastActivity)) < 10) {
                        $chkOperator = true;
                    }
                }
                if (!$chkOperator) {
                    mysqli_query($connection, 'UPDATE ' . $sql_prefix . 'logs SET finished=1 WHERE id=' . $logID) or die(mysqli_error($connection));
                    $rep['finished'] = 1;
                }
            }
        }


        $sql_msgs = mysqli_query($connection, 'SELECT * FROM ' . $sql_prefix . 'messages WHERE logID=' . $logID . ' AND  isOperator=1 AND isRead=0') or die(mysqli_error($connection));
        while ($value = mysqli_fetch_object($sql_msgs)) {
            if ($value->isOperator) {
                $sql_operators = mysqli_query($connection, 'SELECT * FROM ' . $sql_prefix . 'operators WHERE id=' . $value->userID . ' LIMIT 1') or die(mysqli_error($connection));
                $operator = mysqli_fetch_object($sql_operators);
                $value->username = $operator->username;
                $value->avatarOperator = $operator->picture;
            }
            $value->content = stripslashes(nl2br($value->content));
            $rep['messages'][] = $value;
            mysqli_query($connection, 'UPDATE ' . $sql_prefix . 'messages SET isRead=1 WHERE id=' . $value->id) or die(mysqli_error($connection));
        }
        mysqli_query($connection, 'UPDATE ' . $sql_prefix . 'logs SET lastActivity="' . date('Y-m-d h:i:s') . '" WHERE id=' . $logID) or die(mysqli_error($connection));

        echo json_encode($rep);
    }
    if ($_POST['action'] == 'vcht_newMessage') {
        $userID = mysqli_real_escape_string($connection, $_POST['userID']);
        $operatorID = mysqli_real_escape_string($connection, $_POST['operatorID']);
        $username = stripslashes(mysqli_real_escape_string($connection, $_POST['username']));
        $message = mysqli_real_escape_string($connection, $_POST['message']);
        $message = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $message);
        $logID = mysqli_real_escape_string($connection, $_POST['logID']);
        $operatorID = mysqli_real_escape_string($connection, $_POST['operatorID']);
        $url = mysqli_real_escape_string($connection, $_POST['url']);

        if ($logID == 0) {
            $sql_logs = mysqli_query($connection, 'SELECT * FROM ' . $sql_prefix . 'logs WHERE finished=0 AND operatorID=' . $operatorID . ' AND username="' . $username . '" LIMIT 1') or die(mysqli_error($connection));
            if (mysqli_num_rows($sql_logs) > 0) {
                $log = mysqli_fetch_object($sql_logs);
                $logID = $log->id;
                $operatorID = $log->operatorID;
            } else {

                
                 $country = '';
                 $city = '';
                 try{
                 $geoInfos = json_decode(get_country_city_from_ip($_SERVER['REMOTE_ADDR']),true);                 
                 $country = $geoInfos['ip']['country_names']['en'];
                 $city = $geoInfos['ip']['city'];
                 } catch(Exception $e){}
                mysqli_query($connection, 'INSERT INTO ' . $sql_prefix . 'logs (username,operatorID,date,ip,country,city) VALUES ("' . $username . '","' . $operatorID . '","' . date('Y-m-d h:i:s') . '","' . $_SERVER['REMOTE_ADDR'] . '","'.$country.'","'.$city.'");') or die(mysqli_error($connection));
                $logID = mysqli_insert_id($connection);
            }
        }
        mysqli_query($connection, 'UPDATE ' . $sql_prefix . 'logs SET lastActivity="' . date('Y-m-d h:i:s') . '" WHERE id=' . $logID) or die(mysqli_error($connection));
        mysqli_query($connection, 'INSERT INTO ' . $sql_prefix . 'messages (logID,content,date,url) VALUES ("' . $logID . '","' . stripslashes($message) . '","' . date('Y-m-d h:i:s') . '","' . $url . '");');
        echo '{"logID": "' . $logID . '", "operatorID": "' . $operatorID . '"}';
    }


    if ($_POST['action'] == 'vcht_getMsgElement') {
        $msgID = mysqli_real_escape_string($connection, $_POST['msgID']);
        $sql_msg = mysqli_query($connection, 'SELECT * FROM ' . $sql_prefix . 'messages WHERE id=' . $msgID . ' LIMIT 1') or die(mysqli_error($connection));
        $msg = mysqli_fetch_object($sql_msg);
        echo $msg->domElement;
    }

    if ($_POST['action'] == 'vcht_get_url') {
        try {
            $sql_settings = mysqli_query($connection, 'SELECT * FROM ' . $sql_prefix . 'settings WHERE id=1 LIMIT 1') or die(mysqli_error($connection));
            $settings = mysqli_fetch_object($sql_settings);
            echo '{"url":"' . $settings->url . '", "position": "' . $settings->chatPosition . '"}';
        } catch (Throwable $t) {
            echo 'no';
        } catch (Exception $e) {
            echo 'no';
        }
    }

    if ($_POST['action'] == 'vcht_lifeTimer') {
        $vcht_id = mysqli_real_escape_string($connection, $_POST['vcht_id']);
        $name = mysqli_real_escape_string($connection, $_POST['name']);

        $chkEx = false;
        if ($vcht_id != '' && $vcht_id > 0) {
            $table_name = $sql_prefix . "users";
            $sql_user = mysqli_query($connection, 'SELECT * FROM ' . $table_name . ' WHERE id="' . $vcht_id . '" LIMIT 1') or die(mysqli_error($connection));

            if (mysqli_num_rows($sql_user) > 0) {
                $chkEx = true;
                mysqli_query($connection, 'UPDATE ' . $table_name . 'SET  lastActivity="' . date('Y-m-d h:i:s') . '", username="' . $name . '"  WHERE id=' . $vcht_id);

                $table_name = $sql_prefix . "logs";

                $sql_log = mysqli_query($connection, 'SELECT * FROM ' . $table_name . ' WHERE vcht_id="' . $vcht_id . '" AND finished=0 LIMIT 1') or die(mysqli_error($connection));
                $log = mysqli_fetch_object($sql_log);
                if (mysqli_num_rows($sql_log) > 0) {
                    echo '*' . $log->id;
                } else {
                    echo $vcht_id;
                }
            }
        }
        if (!$chkEx) {

            $table_name = $sql_prefix . "users";
            $sql_user = mysqli_query($connection, 'SELECT * FROM ' . $table_name . ' WHERE username="' . $name . '" LIMIT 1') or die(mysqli_error($connection));
            $user = mysqli_fetch_object($sql_user);
            if (mysqli_num_rows($sql_user) > 0) {
                mysqli_query($connection, 'UPDATE ' . $table_name . ' SET  lastActivity="' . date('Y-m-d h:i:s') . '", username="' . $name . '", userID="' . $userID . '" WHERE id=' . $user->id)or die(mysqli_error($connection));
                echo $user->id;
            } else {
                mysqli_query($connection, 'INSERT INTO ' . $table_name . ' (lastActivity,username,IP) VALUES ("' . date('Y-m-d h:i:s') . '","' . $name . '","' . $_SERVER['REMOTE_ADDR'] . '")')or die(mysqli_error($connection));
                echo mysqli_insert_id($connection);
            }
        }
    }
}
mysqli_close($connection);
?>
