<?php
        header("Content-Type:text/html;charset=utf-8");
        session_start();
        error_reporting(E_ALL);
        ini_set("display_errors",1);
        $auth = $_SESSION['_AUTH'];
        $type=$_SESSION['_TYPE'];
            if($type=='owner'&& !isset($_SESSION['_AUTH']))
            header( 'Location: home.php' );
        $name=base64_decode($auth);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style_add.css">
<link rel="stylesheet" type="text/css" href="style2.css">

<title>메뉴 정보</title>
</head>
<?php
$db="(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=203.249.87.57)(PORT=1521)))(CONNECT_DATA=(SID=orcl)))";
$dbusername='db501group3';
$dbpassword='test1234';

$connect=oci_connect($dbusername,$dbpassword,$db);
if(!$connect)
{
        $e=oci_error();
        trigger_error(htmlentities($e['message'],ENT_QUOTES),E_USER_ERROR);

}
else
{

        $sql="select MENU_NAME,PRICE from MENU a , RESTAURANT b where a.REST_ID_M = b.REST_ID and b.REST_ID ='$name'";
        $stid=oci_parse($connect,$sql);

        oci_execute($stid);
        
        

}

?>





 
<body>
    <div class="wrap">
        <h1>Delivery Service</h1>
  
    <div class="container">
        <h1>메뉴 정보</h1>
    </div>

    <form>
        <fieldset>
        <legend>메뉴</legend>
        <ul>
            <?php
                while($row=oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS))
                {
                      echo "<div id='delete'";
                      echo "<li>";
                      echo "<p>{$row['MENU_NAME']}</p>";
                      echo "<p>가격:{$row['PRICE']}</p>";
                      echo "<a href='./changeproduct.php?name={$row['MENU_NAME']}'>수정</a></p>" ;
                      echo "<a href='./deleteproduct.php?name={$row['MENU_NAME']}'>삭제</a>" ;
                      echo "</li>";
                      echo "</div>";
                      echo "<br>";

                }



            ?>
            
            <li>
            <div id='my_div'></div>
          </li>
            
        </ul>
      </fieldset>
        <div class="submit">
         <input type="button" value="돌아가기" style="width:100px; height:60pt "onclick="location.href='personal_info.php'">
         <input type='button' value="추가" style="width:100px; height:60pt "onclick="location.href='addproduct.php'"/>
        </div>
    </form>
  </div>  
</body>
    <?php
    oci_free_statement($stid);
    oci_close($connect);
    ?>