<?php
        header("Content-Type:text/html;charset=utf-8");
        session_start();
        error_reporting(E_ALL);
        ini_set("display_errors",1);
            if(isset($_SESSION['_AUTH']))
            {
                unset( $_SESSION['_AUTH'] );
                unset( $_SESSION['_TYPE'] );
                header( 'Location: home.php' );
            }
            
            $wp=$_GET['wp'];
            $wu=$_GET['wu'];

?>