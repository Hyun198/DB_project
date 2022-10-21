<?php
        header("Content-Type:text/html;charset=utf-8");
        session_start();
        error_reporting(E_ALL);
        ini_set("display_errors",1);
        $auth = $_SESSION['_AUTH'];
        $type=$_SESSION['_TYPE'];
            if($type=='owner'&& !isset($_SESSION['_AUTH']))
            header( 'Location: home.php' );
            

?>
<?php
$db='(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=203.249.87.57)(PORT=1521)))(CONNECT_DATA=(SID=orcl)))';
$dbusername='db501group3';
$dbpassword='test1234';
$_restname=base64_decode($auth);
$_name=$_POST['menu_name'];
$_price=$_POST['menu_price'];
$_menu_ID=$_restname.$_name;
$connect=oci_connect($dbusername,$dbpassword,$db);
if(!$connect)
{
        $e=oci_error();
        trigger_error(htmlentities($e['message'],ENT_QUOTES),E_USER_ERROR);

}
else
{

    $sql = "select MENU_NAME from MENU a , RESTAURANT b where a.MENU_ID = b.REST_ID and b.RESTAURANT_NAME=$restname and a.MENU_NAME=$_name";
    $jb_result = oci_parse( $connect, $sql );
    oci_execute($jb_result);
    $jb_row = oci_fetch_array( $jb_result,OCI_ASSOC+OCI_RETURN_NULLS ) ;
      $menu_name_e = !empty($jb_row[0])?$jb_row[ 'MENU_NAME' ]:'';
   
    if ( $_name == $menu_name_e ) {//동일한 유저이름이 있을경우
      $wu = 1;
      
      header("Location: addproduct.php?wu=$wu");
    } 
    else {
        $sql="INSERT INTO MENU ( MENU_N_REST_N, MENU_NAME ,PRICE,REST_ID_M) VALUES ( '$_menu_ID', '$_name','$_price','$_restname' )";
        $stid=oci_parse($connect,$sql);

        oci_execute($stid);
      header( 'Location: menu_info.php' );
    }

}
oci_free_statement($stid);
oci_close($connect);
?>