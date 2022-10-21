
<?php
        header("Content-Type:text/html;charset=utf-8");
        session_start();
        error_reporting(E_ALL);
        ini_set("display_errors",1);
        $auth = $_SESSION['_AUTH'];
        $type=$_SESSION['_TYPE'];
            if($type=='owner'&& !isset($_SESSION['_AUTH']))
            header( 'Location: home.php' );
            $wu=$_GET['wu'];
?>


<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="stylelogin.css">
        <title>메뉴 추가</title>
       
    </head>


    <body>
     <div class="intro_bg"> 
        <div class="intro">
            <ul class="nav">
                <h1>Delivery service</h1>
                
            </ul>
     </div>
     
        <div class="login">
            <fieldset>
                <legend> 메뉴 추가 </legend>
                <form action="addproductcheck.php" method="post">
                 <ul>
                    <li><label class="my" for="user_id">메뉴 이름:<input type="text"id="menu_name" name="menu_name" size="10" autofocus> </label></li>
                    <li><label class="my" for="user_pw">메뉴 가격:<input type="text" id="menu_price" name="menu_price" size="10"></label></li>
                 </ul>
                 
                 <input type=submit size="10" value="추가">
                 
                </form>
            </fieldset>
                <div class="button">
                 <a href="./menu_info.php"><input type=submit size="10" value="뒤로가기"></a>
                </div>
                <?php
                    if($wu==1)
                       echo "<p>동일한 이름의 메뉴가 있습니다.</p>";
                   ?>
        </div>
    </body>
</html>



