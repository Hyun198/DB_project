<?php
        header("Content-Type:text/html;charset=utf-8");
        session_start();
        error_reporting(E_ALL);
        ini_set("display_errors",1);
       

?>
<?php
    $db='(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=203.249.87.57)(PORT=1521)))(CONNECT_DATA=(SID=orcl)))';
    $dbusername='db501group3';
    $dbpassword='test1234';

  $username = $_POST[ 'new_id' ];
  $password = $_POST[ 'new_pw1' ];
  $realname = $_POST[ 'user_name' ];
  $address =  $_POST[ 'user_address' ];
  $pnumber =  $_POST[ 'user_tel' ];
  $password_confirm = $_POST[ 'new_pw2' ];
  $card=$_POST['card'];
  if ( !is_null( $username ) ) {
    $jb_conn = oci_connect($dbusername,$dbpassword,$db);
    
      $jb_sql = "SELECT USERID FROM APP_USER WHERE USERID = '$username'";
      $jb_result = oci_parse( $jb_conn, $jb_sql );
      oci_execute($jb_result);
      $jb_row = oci_fetch_array( $jb_result,OCI_ASSOC+OCI_RETURN_NULLS ) ;
        $username_e = !empty($jb_row['USERID'])?$jb_row[ 'USERID' ]:'';
     
      if ( $username == $username_e ) {//동일한 유저이름이 있을경우
        $wu = 1;
      } elseif ( $password != $password_confirm ) {//패스워드가 비허가 될경우
        $wp = 1;
      } 
      else {
        $jb_sql_add_user = "INSERT INTO APP_USER ( USERID, USER_PW ,USER_NAME,ADDRESS,PHONE_NUM) VALUES ( '$username', '$password','$realname','$address','$pnumber' )";
        $jb_result =oci_parse( $jb_conn, $jb_sql_add_user );
        oci_execute($jb_result);
        $jb_sql_add_user = "INSERT INTO USER_ACCOUNT ( BANK_NAME_ACCOUNT_NUM,USER_ID_A) VALUES ( '$card','$username')";
        $jb_result =oci_parse( $jb_conn, $jb_sql_add_user );
        oci_execute($jb_result);
        header( 'Location: register_ok.php' );
      }
    
      //header( "Location: signup_guest.php?wu=$wu&wp=$wp" );
  }
  
  
?>
<?php
    oci_free_statement($stid);
    oci_close($connect);
    ?>