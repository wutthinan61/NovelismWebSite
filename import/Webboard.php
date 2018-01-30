<html>
<head>

</head>
<body>

<?php
date_default_timezone_set("Asia/Bangkok");
session_start();
$objConnect = mysql_connect("127.0.0.1:56286","azure","6#vWHD_$") or die("Error Connect to Database");
$objDB = mysql_select_db("localdb");
mysql_query("SET NAMES UTF8");
$strSQL = "SELECT * FROM novel where noID='".$_GET['noID']."'";
$objQuery  = mysql_query($strSQL);
while($objResult = mysql_fetch_array($objQuery)){ ?>
	
<!-- content -->
<center><H1><?php echo $objResult["name"]; ?></H1><center>
<B>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</B>
<br><br>
<div class="container">
<table class='table  bg-success'>
	<tr>
		<td>
			<label>หมวดหมู่:</label><?php echo $objResult["category"]; ?>
		</td>
		<td>
			<label>ผู้แต่ง:</label><?php echo $objResult["author"]; ?>
		</td>
		
	</tr>
	<tr>
		<td>
			<label>สถานะ:</label>ยังไม่จบ
		</td>
	</tr>
</table>
<B>----------------------------------------------------------------------------------------------เรื่องย่อ---------------------------------------------------------------------------------------------------------------------------</B>
<br><br>
<table class='table  bg-success'>
	<tr>
		<td>
			<?php echo $objResult["story"]; ?>
		</td>
	</tr>
</table>
</div>
	
<?php	
}


$strSQL = "SELECT * FROM webboard where noID='".$_GET['noID']."'";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);

$Per_Page = 10;   // Per Page

$Page = $_GET["Page"];
if(!$_GET["Page"])
{
	$Page=1;
}

$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page)
{
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}

$strSQL .=" order  by QuestionID DESC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>












<div class="container">
<table class="table bg-success table-hover">
  <thead>
  <tr>
    <th width="20"> <div align="center">ตอนที่</div></th>
    <th width="500"> <div align="center">ชื่อตอน</div></th>
    <th> <div align="center">วันที่</div></th>
    <th> <div align="center">จำนวนผู้อ่าน</div></th>
    <th> <div align="center">ตอบกลับ</div></th>
  </tr>
  </thead>
<?php
$ep = 0;
while($objResult = mysql_fetch_array($objQuery))
{ $ep = $ep + 1; }
$objQuery  = mysql_query($strSQL);
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><?php echo $ep;?></div></td>
    <td><a href="sub_ep.php?QuestionID=<?php echo $objResult["QuestionID"];?>&noID=<?php echo $_GET["noID"];?>"><?php echo $objResult["Question"];?></a></td>
    <td><div align="center"><?php echo $objResult["CreateDate"];?></div></td>
    <td align="right"><?php echo $objResult["View"];?></td>
    <td align="right"><?php echo $objResult["Reply"];?></td>
  </tr>
<?php
$ep = $ep - 1;
}
?>
  <tr>
  <td><a href="add_ep.php?noID=<?php echo  $_GET["noID"]?>"><img src="Img/addep.png" width="50%"></a></td>
  </tr>
</table>
</div>

<!-- comment -->
<?php
if($_GET["Action"] == "Save")
{
	//*** Insert Reply ***//
	$strSQL = "INSERT INTO novelreply ";
	$strSQL .="(noID,CreateDate,Details,Name,imgurl) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_GET["noID"]."','".date("Y-m-d H:i:s")."','".$_POST["txtDetails"]."','".$_SESSION["username"]."','".$_SESSION["imgurl"]."') ";
	$objQuery = mysql_query($strSQL);
}
?>




<?php
$intRows = 0;
$strSQL2 = "SELECT * FROM novelreply  WHERE noID = '".$_GET["noID"]."' ";
$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL."]");

while($objResult2 = mysql_fetch_array($objQuery2)) { $intRows++; }
$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL."]");
?>

<center>
<B>---------------------------------------------------------------------------------------------<?php echo $intRows; ?>คอมเมนท์--------------------------------------------------------------------------------------------------------------------------</B>
<br><br><br>


<?php 
while($objResult2 = mysql_fetch_array($objQuery2))
{
	
?> 

<table border=1>
	<tr>
		<td>
			------------------------------------<img src="<?php echo $objResult2["imgurl"]; ?>" height="30" width="30"><?php echo $objResult2["Name"]; ?>------------------------------------
		</td>
	</tr>
	<tr>
		<td>
			<?php echo $objResult2["Details"]; ?>
		</td>
	</tr>
</table>
<br><br>
<?php 
} 
?>





<br><br><br>











<form action="main_novel.php?Action=Save&noID=<?php echo $_GET["noID"]; ?>" method="post">
<table>
		<tr>
			<td width="500">
				<input class="form-control input-lg" name="txtDetails">
			</td>
			<td>
				<button class="btn btn-primary btn-lg">คอมเมนท์</button>
			</td>
		</tr>
	</table>
</form>
</center>
	
<br><br><br>
<?php
mysql_close($objConnect);
?>
</body>
</html>