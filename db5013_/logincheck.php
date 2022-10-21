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
  $type= $_POST['login_type'];
  $username = $_POST[ 'user_id' ];
  $password = $_POST[ 'user_pw' ];
  

  if ( !is_null( $username ) ) {
    $jb_conn = oci_connect($dbusername,$dbpassword,$db);
    if(!$jb_conn){
        $e=oci_error();
        trigger_error(htmlentities($e['message'],ENT_QUOTES),E_USER_ERROR);

    }
    if($type=='guest')
    $jb_sql = "select USER_PW from APP_USER where USERID = '$username'";
    
    elseif($type=='rider')
    $jb_sql = "select RIDER_PW from DELIVER where RIDER_ID = '$username'";
    else
    $jb_sql = "select REST_PW from RESTAURANT where REST_ID = '$username'";
    echo $jb_sql;
    $jb_result = oci_parse( $jb_conn, $jb_sql );
    oci_execute($jb_result);
    $jb_row = oci_fetch_array( $jb_result ,OCI_ASSOC+OCI_RETURN_NULLS);
    
    if ( is_null( $jb_row ) ) {
      $wu = 1;
    } 
    else {
      if($type=='guest')
      {
        if ( $jb_row['USER_PW']==$password  ) {
        
          $_IDvalue=base64_encode($username);
          $_SESSION["_AUTH"]=$_IDvalue;
          $_SESSION["_TYPE"]=$type;
          header( 'Location: login_ok.php' );
        } else {
          $wp = 1;
        }
      }
      elseif($type=='rider')
      {
        if ( $jb_row['RIDER_PW']==$password  ) {
        
          $_IDvalue=base64_encode($username);
          $_SESSION["_AUTH"]=$_IDvalue;
          $_SESSION["_TYPE"]=$type;
          header( 'Location: login_ok.php' );
        } else {
          $wp = 1;
        }
      }
      else
      {
        if ( $jb_row["REST_PW"]==$password  ) {
        
          $_IDvalue=base64_encode($username);
          $_SESSION["_AUTH"]=$_IDvalue;
          $_SESSION["_TYPE"]=$type;
          header( 'Location: login_ok.php' );
        } else {
          $wp = 1;
        }
      }

      
    }
    oci_free_statement($jb_result);
    oci_close($jb_conn);
    
    header( "Location: login.php?wp=$wp&wu=$wu" );

  }
?>

