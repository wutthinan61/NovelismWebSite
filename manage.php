<?php require_once('import/head.php'); ?>

<?php
$objConnect = mysql_connect("127.0.0.1:56286","azure","6#vWHD_$") or die("Error Connect to Database");
$objDB = mysql_select_db("localdb");
mysql_query("SET NAMES UTF8");
$strSQL = "SELECT * FROM novel";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);
$i = 1;
echo "<center><table class='table table-nonfluid bg-success table-hover'>
  <thead>
  <tr>
    <th class='text-center' width='100'> <div align='center'>เรื่องที่</div></th>
    <th class='text-center' width='70'> <div align='center'>ชื่อเรื่อง</div></th>
    <th class='text-center' width='100'>หมวดหมู่</th>
    <th class='text-center' width='100'>จำนวนตอน</th>
    <th class='text-center' width='100'>รูปปก</th>
	</tr>
	</thead>";


while($objResult = mysql_fetch_array($objQuery))
{
?> 
  <tr>
    <td width=60><div align="center"><?php echo $i;?></div></td>
    <td width=300 class='text-center'><a href="main_novel.php?noID=<?php echo $objResult["noID"];?>"><?php echo $objResult["name"];?></a></td>
    <td class='text-center'><div align="center"><?php echo $objResult["category"];?></div></td>
    <td class='text-center'><?php echo $objResult["numep"];?></td>
    <td class='text-center'><img src='<?php echo $objResult["imgurl"];?>' width=50 height=50></td>
	<td class='text-center'><button class='btn btn-danger' onclick="remove('<?php  echo $objResult["noID"]; ?>')">ลบนิยาย</button></td>
  </tr>
<?php
   $i++;
}
mysql_close($objConnect);
?>


<script>
function remove(noID){
	var result = call("Sql.php","deletenovel",noID);
	window.location = "manage.php";
}
</script>
