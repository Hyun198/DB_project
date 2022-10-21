<?php
        header("Content-Type:text/html;charset=utf-8");
        session_start();
        error_reporting(E_ALL);
        ini_set("display_errors",1);
        
        if(isset($_SESSION['_AUTH']))
            header( 'Location: home.php' );
        

?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="stylelogin.css">
        <title>회원가입</title>
    </head>


    <body>
    <div class="login"> 
        <div class="intro">
            Delivery service
        </div>
     
        <div class="post">
            <fieldset>
                <legend> 회원가입 </legend>
                <form action="signupcheck.php" method="get">
                 
                 <p>
                    회원종류 선택
                </p>
                <label><input type = "radio" name="login_type" value="restaurant">점장</label>
                <label><input type = "radio" name="login_type" value="rider">배달원</label>
                <label><input type = "radio" name="login_type" value="guest">유저</label>

                 <input type=submit size="10" value="회원가입">
                 
                </form>
            </fieldset>
        </div>
    </body>
</html>