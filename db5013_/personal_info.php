<?php
        header("Content-Type:text/html;charset=utf-8");
        session_start();
        error_reporting(E_ALL);
        ini_set("display_errors",1);
            if(isset($_SESSION['_AUTH']))
            {
                $type=$_SESSION['_TYPE'];
                $auth = $_SESSION['_AUTH'];
                
                $name=base64_decode($auth);
            }
            else
            {
            header( 'Location: login.php' );

            }
            

?>
<!DOCTYPE html>
<html lang="ko">
 <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title> 유저정보 </title>
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
    if($type=='guest')
    {
        $sql="select * from APP_USER where USERID='$name'";
    }
    else if($type=='restaurant')
    {
        $sql="select * from RESTAURANT where REST_ID = '$name'";
    }
    else if($type=='rider')
    {
        $sql="select a.RIDER_ID, b.RESTAURANT_NAME,a.AREA_CODE_D from DELIVER a,RESTAURANT b where RIDER_ID='$name' and b.REST_ID=a.REST_ID_D";
    }
    else
    {
        
        header( 'Location: login.php' );
    }
    $stid=oci_parse($connect,$sql);
    echo $sql;
    oci_execute($stid);
    $row=oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS);
}
        
?>

 <body>
    <div class="wrap">
        <h1>Delivery service</h1>
    </div>

    <form>
    <fieldset>
    <ul>
    <?php


        if($type=='guest')
        {
            echo "<li>NAME :$row['USER_NAME']</li>";
            echo "<li>ID :$row['USERID']</li>";
            echo "<li>주소 :$row['ADDRESS']</li>";
            echo "<li>전화번호 :$row['PHONE_NUM']</li>";
            echo "<li>유저분류 :guest</li>";
        }
            
        else if($type=='restaurant')
        {
            echo "<li>가게 이름 :{$row['RESTAURANT_NAME']}</li>";
            echo "<li>ID :{$row['REST_ID']}</li>";
            echo "<li>지역번호 :{$row['AREA_CODE_R']}</li>";
            echo "<li>전화번호 :{$row['PHONE_NUM_R']}</li>";
            echo "<li>유저분류 :owner</li>";
            echo "<a href='./menu_info.php'>'메뉴 정보'</a>" ;
        }
        else if($type=='rider')
        {
            echo "<li>ID :$row['RIDER_ID']</li>";
            echo "<li>지역 :$row['AREA_CODE_D']</li>";
            echo "<li>가게 이름 :$row['RESTAURANT_NAME']</li>";
            echo "<li>유저분류 :rider</li>";
        }
    ?>
    </ul>    
</fieldset>
    </form>
</body>
<?php
oci_free_statement($stid);
oci_close($connect);
?>