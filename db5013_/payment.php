
<?php
        header("Content-Type:text/html;charset=utf-8");
        session_start();
        error_reporting(E_ALL);
        ini_set("display_errors",1);
        $type=$_SESSION['_TYPE'];
            if($type=='guest'&& !isset($_SESSION['_AUTH']))
            header( 'Location: home.php' );
            
        $auth = $_SESSION['_AUTH'];
        
        $name=base64_decode($auth);
        $_product=$_GET;

?>


<html>
<body>


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

        $sql='select * from S';
        $stid=oci_parse($connect,$sql);

        oci_execute($stid);
        echo "<table width='300' border='1' cellpadding='0' cellspacing='0'>\n";
        while($row=oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS))
        {
                echo '<tr>\n';
                foreach($row as $item)
                {
                        echo "<td>".($item !==NULL ? htmlentities($item,ENT_QUOTES) : "&nbsp;"). "</td>\n";
                }
                echo "</tr\n>";
        }
        echo "</table>\n";

}
oci_free_statement($stid);
oci_close($connect);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="styleby.css">
</head>
<style>.selected{text-decoration: line-through;font-weight:700; color:red;}</style>




<body>
   <div class="wrap">
    <h1>Delivery Service</h1>
   </div>
    <div class="container"> 
     <form method="get" action="paymentcheck.php">
      <?php
        $sql="select address, phone_num from app_user where app_user.user_id=$_name";
        $stid=oci_parse($connect,$sql);

        oci_execute($stid);
        $row=oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS);
      ?>
        <fieldset>
            <legend style="text-align:center ;">주문서</legend>
            <ul>
                <li>
                    <label for="address" class="title">주소</label>

                    <input type="text" size="40" id="addr" required></input>
                </li>
                <li>
                    <label for ="tel" class="title">연락처</label>
                    <input type="tel" id="telnumber" placeholder="연락가능한 번호" required>
                </li>
            </ul>

            <fieldset>
                <legend>
                    주문내역 
                </legend>
                <li>
                   <?php
                    echo "$_product";
                   ?>
                </li>
             
                 
                  

            </fieldset>
            결제 수단
            <li>
                결제 수단 출력 : ex)카드, 현금
            </li>
       </fieldset>

        
        <div class="centered">
            <input type="submit"style="height: 100px; width: 150px;" value="수정하기">
            <input type="button" style="height: 100px; width: 150px;" value="홈으로" oncl>
        </div>
     </form>
</div> 








</body>
</html>
