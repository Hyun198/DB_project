<?php
        header("Content-Type:text/html;charset=utf-8");
        session_start();
        error_reporting(E_ALL);
        ini_set("display_errors",1);
        
            if(!isset($_SESSION['_AUTH']))
            header( 'Location: login.php' );
            $auth = $_SESSION['_AUTH'];
        $name=base64_decode($auth);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style_add.css">
<link rel="stylesheet" type="text/css" href="style2.css">

<title>주문 내역</title>
</head>
<?php
$db='(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=203.249.87.57)(PORT=1521)))(CONNECT_DATA=(SID=orcl)))';
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

        $sql="select a.RESTAURANT_name,a.RIDER_ID_OS, c.USER_NAME,a.ORDER_HIS, a.CLIENT_ADDRESS from ORDER_SHEET a,RESTAURANT b,APP_USER c, where USER_ID_OS=$name";
        $stid=oci_parse($connect,$sql);

        oci_execute($stid);
       
        

}

?>

<body>
    <div class="wrap">
        <h1>Delivery Service</h1>
  
    <div class="container">
        <h1></h1>
    </div>

    <form >
        <fieldset>
        <legend>기록</legend>
        <ul>
            <?php
                while($row=oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS))
                {
                      echo "<div>";
                      echo "<li>";
                      echo "<p>가게:$row[0]</p>";
                      echo "<p>배달원:$row[1]</p>";
                      echo "<p>손님:$row[2]</p>";
                      echo "<p>내용:$row[3]</p>";
                      echo "<p>주소:$row[4]</p>";
                      echo "</li>";
                      echo "</div>";
                      echo "<br><br><br>";

                }



            ?>
            
            <li>
            <div id='my_div'></div>
          </li>
            
        </ul>
      </fieldset>
        <div class="submit">
         <input type="submit" value="돌아가기" style="width:100px; height:60pt "onclick="location.href='home.php'">
        </div>
    </form>
  </div>  
</body>
</html>
    <?php
    oci_free_statement($stid);
    oci_close($connect);
    ?>