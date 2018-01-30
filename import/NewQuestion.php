<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
$objConnect = mysql_connect("127.0.0.1:56286","azure","6#vWHD_$") or die("Error Connect to Database");
$objDB = mysql_select_db("localdb");
mysql_query("SET NAMES UTF8");

$strSQL = "SELECT * FROM novel where noID='".$_GET['noID']."'";
$objQuery  = mysql_query($strSQL);
mysql_query("SET NAMES UTF8");
while($objResult = mysql_fetch_array($objQuery)){
	$name = "<center><H1>".$objResult["name"]."</H1><center>";
	$category = $objResult["category"];
	$author = $objResult["author"];
}




if($_GET["Action"] == "Save")
{
	//*** Insert Question ***//
	$strSQL = "INSERT INTO webboard ";
	$strSQL .="(noID,CreateDate,Question,Details) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_GET["noID"]."','".date("Y-m-d H:i:s")."','".$_POST["txtQuestion"]."','".$_POST["txtDetails"]."') ";
	$objQuery = mysql_query($strSQL);
	
	echo "<input type='hidden' id='id' value='".$_GET["noID"]."'>";
}
?>
<script>
changepage();
function changepage(){
	var id =  document.getElementById("id").value;
	window.location = "main_novel.php?noID="+id;
}
</script>




<html>
<head>
</head>
<body>


<!-- status -->
<?php echo $name; ?>
<div class="container">
<table class='table  bg-success'>
	<tr>
		<td>
			<label>หมวดหมู่:</label><?php echo $category; ?>
		</td>
		<td>
			<label>ผู้แต่ง:</label><?php echo $author; ?>
		</td>
		<td>
			<label>ผู้แต่ง:</label>Mymind
		</td>
	</tr>
	<tr>
		<td>
			<label>สถานะ:</label>ยังไม่จบ
		</td>
	</tr>
</table>
</div>

<form action="add_ep.php?Action=Save&noID=<?php echo $_GET["noID"] ?>" method="post" name="frmMain" id="frmMain">
  <center>
  <table   cellpadding="1" cellspacing="1">
    <tr class="text-center">
      <td width="100">ชื่อตอน</td>
      <td><input name="txtQuestion" type="text" id="txtQuestion" value="" size="35"></td>
	  <td width="200"><div class='radio'><label><input type='radio' id='sex1' name='optradio'>เผยแพร่&nbsp;&nbsp;</label></td>
	  <td width="200"><div class='radio'><label><input type='radio' id='sex1' name='optradio'>ส่วนตัว&nbsp;&nbsp;</label></td>
    </tr>
  </table>
  
  <br>
  
  <table>
  <tr>
  <td></td>
  <td width="1000">
  <div class='form-group'><textarea name="txtDetails" class='form-control' rows='20' id='comment'></textarea></div>
  </td>
  <td></td>
  </tr>
  <table>
    <a href="main_novel.php?noID=<?php echo $_GET["noID"] ?>">ย้อนกลับ</a>
  <input name="btnSave" type="submit" id="btnSave" value="Submit">

</form>
</body>
</html>
<?php
mysql_close($objConnect);
?>