<html>
<head>
</head>
<body>
<?php
session_start();
$objConnect = mysql_connect("localhost","root","12345678") or die("Error Connect to Database");
$objDB = mysql_select_db("novelism");
$strSQL = "SELECT * FROM novel where perID='".$_SESSION['id']."'";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);
?>


<table border=1>
  <thead>
  <tr>
    <th class='text-center' width="40"> <div align="center">เรื่องที่</div></th>
    <th class='text-center' width="70"> <div align="center">ชื่อเรื่อง</div></th>
    <th class='text-center' width="100">หมวดหมู่</th>
    <th class='text-center' width="100">จำนวนตอน</th>
    <th class='text-center' width="100">รูปปก</th>
  </tr>
  </thead>
<?php
$i = 1;
while($objResult = mysql_fetch_array($objQuery))
{
?> 
  <tr>
    <td width=60><div align="center"><?php echo $i;?></div></td>
    <td width=300 class='text-center'><a href="main_novel.php?noID=<?php echo $objResult["noID"];?>"><?php echo $objResult["name"];?></a></td>
    <td class='text-center'><div align="center"><?php echo $objResult["category"];?></div></td>
    <td class='text-center'><?php echo $objResult["numep"];?></td>
    <td class='text-center'><img src='<?php echo $objResult["imgurl"];?>' width=50 height=50></td>
  </tr>
<?php
$i++;
}
 mysql_close($objConnect);
?>
</table>


</body>
</html>