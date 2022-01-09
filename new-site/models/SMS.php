<?php


class SMS
{

    public static $sender = 'Evacme';
    public static $login = 'evacme';
    public static $pwd = '142215';
    /**
     *  $r - Recipient
     *  $m - Message
     *  $d - Date, default "NOW()"
     */
    public static function send($r, $m, $d = false)
    {
        // try
        // {
        //     $pdo = new PDO("mysql:host=sql.turbosms.ua;dbname=users", SMS::$login, SMS::$pwd);
        //     $pdo->query("SET NAMES utf8;");
        //     if ($d == false) $pdo->query("INSERT INTO `{SMS::$login}` (`number`,`message`,`sign`) VALUES ('$r','$m','{SMS::$sender}')");
        //     else $pdo->query("INSERT INTO `{SMS::$login}` (`number`,`message`,`sign`,`send_time`) VALUES ('$r','$m','{SMS::$sender}','$d')");
        // }
        // catch(Exception $e)
        // {
            $client = new SoapClient('http://turbosms.in.ua/api/wsdl.html');
            $auth = array(
                'login' => SMS::$login,
                'password' => SMS::$pwd
            );
            $res = $client->Auth($auth);
            $sms = array(
                'sender' => SMS::$sender,
                'destination' => $r,
                'text' => $m
            );
            $res = $client->SendSMS($sms);
        // }
    }
}

