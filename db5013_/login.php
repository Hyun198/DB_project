<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="stylelogin.css">
        <title>로그인</title>
    </head>


    <body>
     <div class="intro_bg"> 
        <div class="intro">
         Delivery service
         </div>
     
        <div class="login">
            <fieldset>
                <legend> 로그인 </legend>
                <form action="logincheck.php" method="post">
                 <ul>
                    <li><label class="my" for="user_id">아이디:<input type="text"id="user_id" name="user_id" size="10" autofocus> </label></li>
                    <br>
                    <li><label class="my" for="user_pw">비밀번호:<input type="password" id="user_pw" name="user_pw" size="10"></label></li>
                    <br>
                 </ul>
                 <p>
                    회원종류 선택
                </p>
              
                <label><input type = "radio" name="login_type" value="restaurant">점장</label>
                <label><input type = "radio" name="login_type" value="rider">배달원</label>
                <label><input type = "radio" name="login_type" value="guest">유저</label>
                <br>
                <div class="button">
                <input type=submit size="10" style="width:40pt;height:30pt;" value="로그인">
                </div>
                </form>
            </fieldset>
                <div class="button">
                 <a href="signup.php"><input type=submit size="10" style="width:50pt;height:30pt;" value="회원가입"></a>
                </div>
        </div>
    </body>
</html>