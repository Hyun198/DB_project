
<?php
        header("Content-Type:text/html;charset=utf-8");
        session_start();
        error_reporting(E_ALL);
        ini_set("display_errors",1);
        if(isset($_SESSION['_AUTH']))
        {
            $auth=$_SESSION['_AUTH'];
            $type=$_SESSION['_TYPE'];
        }

?>

<!DOCTYPE html>
<html lang="ko">
<head>
 <meta charset="utf-8">
 <link rel="stylesheet" type="text/css" href="stylenewhome.css">
<title>홈페이지</title>
</head>


<body>
    <div class="wrap">
      <h1>Delivery Service</h1>
        <div class="nav">
          <ul>
            <a href="./home.php">HOME</a>
            <div class="dropdown">
                <button class="dropdown-button">치킨</button>
                    <div class="dropdown-content">
                        <a href="./resipt.php?name=BBQ">BBQ</a>
                        <a href="./resipt.php?name=교촌치킨">교촌치킨</a>
                        <a href="./resipt.php?name=노랑통닭">노랑통닭</a>
                        <a href="./resipt.php?name=네네치킨">네네치킨</a>
                    </div>
            </div>
            <div class="dropdown">
                <button class="dropdown-button">피자</button>
                <div class="dropdown-content">
                    <a href="./resipt.php?name=피자 알볼로">피자 알볼로</a>
                    <a href="./resipt.php?name=피자 헛">피자 헛</a>
                    <a href="./resipt.php?name=파파존스">파파존스</a>
                    <a href="./resipt.php?name=청년피자">청년피자</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropdown-button">햄버거</button>
                <div class="dropdown-content">
                    <a href="./resipt.php?name=맥도날드">맥도날드</a>
                    <a href="./resipt.php?name=롯데리아">롯데리아</a>
                    <a href="./resipt.php?name=맘스터치">맘스터치</a>
                    <a href="./resipt.php?name=버거킹">버거킹</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropdown-button">커피</button>
                <div class="dropdown-content">
                    <a href="./resipt.php?name=스타벅스">스타벅스</a>
                    <a href="./resipt.php?name=메가커피">메가커피</a>
                    <a href="./resipt.php?name=엔젤리너스">엔젤리너스</a>
                    <a href="./resipt.php?name=투썸플레이스">투썸플레이스</a>
                </div>
            </div>
            <a href="./orderhistory.php">주문서</a>
            
            <?php
            if(!isset($_SESSION['_AUTH']))
                echo "<a href='./login.php'>로그인</a>";
                else 
                echo "<a href='./logout.php'>로그아웃</a>";

            ?>
            

            <a href="./personal_info.php">개인정보</a>
        </ul>
          
        </div>
      </div>
      <div class="intro_bg">
      </div>

    </div>


    </div>
</body>


</html>