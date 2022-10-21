<?php
        header("Content-Type:text/html;charset=utf-8");
        session_start();
        error_reporting(E_ALL);
        ini_set("display_errors",1);
        
        $wu = $_GET["wu"];
        $wp = $_GET["wp"];

?>
<!DOCTYPE html>
<html lang="ko">
 <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title> 회원가입 </title>
 </head>



    <body>
        <!-- 주소에 줄줄이 붙어보내면 get / 값만 모내면 post -->
        <div class="wrap">
            <h1>Delivery service</h1>
        </div>
        
        <div class="intro_bg">    
            <form action="signup_ridercheck.php" method="post" >
        
            <fieldset>
                <legend> 라이더 회원가입 </legend>
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
                            <li> <label class="reg" for="user_name"> 가게 <em> * </em> </label>
                                <input type="text" id="user_name" name="user_name" size="20" required>
                            </li>
                            <li> <label class="reg" for="user_address"> 지역번호 <em> * </em> </label>
                                <li> 
                                    <select name="user_address">
                                    <option value="100">100</option>
                                    <option value="111">111</option>
                                    <option value="122">122</option>
                                    <option value="133">133</option>
                                    </select>
                                </li>
                            </li>
                            <br>
                            <div class="sendform">
                            <input type="submit" value="가입하기">
                            <input type="reset" value="다시쓰기">
                            </div>
                            <?php
                    if($wu==1)
                       echo "<p>사용자이름이 이미 있습니다.</p>";
                    else if($wp==1)
                       echo "<p>비밀번호가 일치하지 않습니다.</p>";
                   ?>
                </ul>
            </fieldset>

        
         
    </form>
 </div>
    </body>
</html>