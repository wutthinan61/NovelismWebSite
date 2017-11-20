<?php 
require_once('import/head.php'); 
?>

<?php
$objConnect = mysql_connect("localhost","root","12345678") or die("Error Connect to Database");
$objDB = mysql_select_db("novelism");
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