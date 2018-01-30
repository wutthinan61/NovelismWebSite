<?php 
require_once('import/head.php'); 
?>

<?php
$objConnect = mysql_connect("127.0.0.1:56286","azure","6#vWHD_$") or die("Error Connect to Database");
$objDB = mysql_select_db("localdb");
mysql_query("SET NAMES UTF8");
$strSQL = "SELECT name FROM novel where noID='".$_GET['noID']."'";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
while($objResult = mysql_fetch_array($objQuery)){
		echo "<a href='index.php'>หน้าหลัก</a> > หมวดหมู่นิยาย > รักโรแมนติก > ".$objResult["name"];
}
mysql_close($objConnect);
?>


<?php
require_once('import/Webboard.php'); 
?>