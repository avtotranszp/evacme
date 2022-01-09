<?php
if (count($_POST)) {
    $flag = false;
    $now = time();

    if (isset($_SESSION['now']) 
        && ($now - $_SESSION['now']) > 1)
        {	
            $flag = true;
        }
        unset($_SESSION['now']);
        return $flag;
}
else {   
    if(!isset($_SESSION['now'])) {
        $_SESSION['now'] = time();
    }
}