<?php
        header("Content-Type:text/html;charset=utf-8");
        session_start();
        error_reporting(E_ALL);
        ini_set("display_errors",1);
       $type=$_GET['login_type'];
        if($type=='guest')
        header( 'Location: signup_guest.php' );
        else if($type=='rider')
        header( 'Location: signup_rider.php' );
        else
        header( 'Location: signup_owner.php' );
    
    
?>
