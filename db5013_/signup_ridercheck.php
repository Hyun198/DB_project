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
  $restid = $_POST[ 'user_name' ];
  $address =  $_POST[ 'user_address' ];
  $password_confirm = $_POST[ 'new_pw2' ];
  if ( !is_null( $username ) ) {
    $jb_conn = oci_connect($dbusername,$dbpassword,$db);
    
      $jb_sql = "SELECT RIDER_ID FROM DELIVER WHERE RIDER_ID = '$username'";
      $jb_result = oci_parse( $jb_conn, $jb_sql );
      oci_execute($jb_result);
      $jb_row = oci_fetch_array( $jb_result,OCI_ASSOC+OCI_RETURN_NULLS ) ;
        $username_e = !empty($jb_row[0])?$jb_row[ 'RIDER_ID' ]:'';
     
      if ( $username == $username_e ) {//동일한 유저이름이 있을경우
        $wu = 1;
      } elseif ( $password != $password_confirm ) {//패스워드가 비허가 될경우
        $wp = 1;
      } 
      else {
        $jb_sql = "SELECT REST_ID FROM RESTAURANT WHERE REST_ID = '$restid'";
      $jb_result = oci_parse( $jb_conn, $jb_sql );
      oci_execute($jb_result);
      $jb_row = oci_fetch_array( $jb_result,OCI_ASSOC+OCI_RETURN_NULLS ) ;
        $username_e = !empty($jb_row['REST_ID'])?$jb_row[ 'REST_ID' ]:'';
        if($username_e!="")
        {
          $jb_sql = "INSERT INTO DELIVER ( RIDER_ID, RIDER_PW ,REST_ID_D,AREA_CODE_D) VALUES ( '$username', '$password','$restid','$address' )";
        $jb_result =oci_parse( $jb_conn, $jb_sql );
        oci_execute($jb_result);
        header( 'Location: register_ok.php' );
        }
        else
        {
          
          echo "<script>location.replace('signup_rider.php?wp=$wp&wu=$wu');</script>"; 
        }


        
      }
    
  }
  
  
?>