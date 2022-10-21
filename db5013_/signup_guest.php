<?php
        header("Content-Type:text/html;charset=utf-8");
        session_start();
        error_reporting(E_ALL);
        ini_set("display_errors",1);
        
    
?>
<!DOCTYPE html>
<html lang="ko">
 <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title> 회원가입 </title>
 </head>



    <body>
        <div class="wrap">
            <h1>Delivery service</h1>
        </div>
        
        <div class="wrap2">
        <!-- 주소에 줄줄이 붙어보내면 get / 값만 모내면 post -->
            
                <fieldset>
                    <form action="./signup_guestcheck.php" method="post" >
                <legend> 유저 회원가입 </legend>
                <ul>
                <!-- em : 진하게, 강조 -->
                <!-- id : lable의 for랑 연결된 부분 / name은 다른 파일로 넘겨줄 파라미터 명 -->
                    <li> <label class="reg" for="new_id"> 아이디 <em> * </em> </label>
                        <input type="text" id="new_id" name="new_id" size="20" autocomplete="on" required>
                    </li>
                    <li> <label class="reg" for="new_pw1"> 비밀번호 <em> * </em> </label>
                        <input type="password" id="new_pw1" name="new_pw1" size="20" required>
                    </li>
                    <li> <label class="reg" for="new_pw2"> 비밀번호 확인 <em> * </em> </label>
                        <input type="password" id="new_pw2" name="new_pw2" size="20" required>
                    </li>
                    <li> <label class="reg" for="user_name"> 이름 <em> * </em> </label>
                        <input type="text" id="user_name" name="user_name" size="20" required>
                    </li>
                    <li> <label class="reg" for="user_address"> 주소 <em> * </em> </label>
                        <input type="text" id="user_address" name="user_address" size="20" required>
                    </li>
                    <li> <label class="reg" for="user_tel"> 전화 번호 <em> * </em> </label>
                        <input type="tel" id="user_tel" name="user_tel" size="20" required>
                    </li>
                    <li> <label class="reg" for="card"> 계좌번호 <em> * </em> </label>
                        <input type="text" id="card" name="card" size="20" required>
                    </li>
                        <br>
                        <div class="sendform">
                            <input type="submit" value="가입하기">
                            <input type="reset" value="다시쓰기">
                        </div>
                </ul>
                </fieldset>
        </form>
        </div>
      </div>
 
    </body>
</html>
