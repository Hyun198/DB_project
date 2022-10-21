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
            //header( 'Location: login.php' );

            }
        $name=$_GET['name'];

?>
<?php
$db='(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=203.249.87.57)(PORT=1521)))(CONNECT_DATA=(SID=orcl)))';
$dbusername='db501group3';
$dbpassword='test1234';
$restname=base64_decode($auth);
$connect=oci_connect($dbusername,$dbpassword,$db);
if(!$connect)
{
        $e=oci_error();
        trigger_error(htmlentities($e['message'],ENT_QUOTES),E_USER_ERROR);

}
else
{

            
    $sql = "select MENU_NAME,PRICE from MENU a , RESTAURANT b where a.REST_ID_M = b.REST_ID and b.REST_ID ='$restname' and a.MENU_NAME='$name'";
    $jb_result = oci_parse( $connect, $sql );
    oci_execute($jb_result);
    $jb_row = oci_fetch_array( $jb_result,OCI_ASSOC+OCI_RETURN_NULLS ) ;
    $menu_name_e = $jb_row[ 'MENU_NAME' ];
 
  if ( $name == $menu_name_e ) {//동일한 이름의 메뉴가 있을경우
    $price=$jb_row['PRICE'];
  } 
    else {
        
        //header("Location: menu_info.php");
    }
        

}
oci_free_statement($jb_result);
oci_close($connect);
?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="stylelogin.css">
        <title>가격 변경</title>
       
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
                <legend> 가격 변경 </legend>
                <form>
                 <ul>
                     <?php
                    echo "<li><label class='my' for='menu_name'id='menu_name' name='menu_name' size='10' value=$name autofocus>메뉴 이름: $name</label></li>";
                    echo "<li><label class='my' for='menu_price'>메뉴 가격:</label><input type='text' id='menu_price' name='menu_price' size='10' value=$price></input></li>";
                    ?>
                 </ul>
                 
                 <input type=submit size="10" value="변경">
                 
                </form>
            </fieldset>
                <div class="button">
                 <a href="./menu_info.php"><input type=submit size="10" value="뒤로가기"></a>
                </div>
                
        </div>
    </body>
</html>