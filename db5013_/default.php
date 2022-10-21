
<?php
        header("Content-Type:text/html;charset=utf-8");
        session_start();
        error_reporting(E_ALL);
        ini_set("display_errors",1);
        

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
