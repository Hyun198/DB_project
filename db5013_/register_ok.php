<?php
        header("Content-Type:text/html;charset=utf-8");
        session_start();
        error_reporting(E_ALL);
        ini_set("display_errors",1);
        


?>
<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styleregist.css">
    <title>register_ok</title>
    
    <style>
      body { font-family: sans-serif; font-size: 14px; }
      input, button { font-family: inherit; font-size: inherit; }
    </style>
  </head>
  
  <body>
    <div class="sucess">
    회원가입에 성공하셨습니다.</div>
    <a href="./home.php">처음 화면으로 돌아가기</a>
   
  </body>
</html>