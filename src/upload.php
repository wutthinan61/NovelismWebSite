<script src="js/jquery-1.8.2.min.js"></script>
<script src="js/jquery.popupoverlay.js"></script>
<script src="js/CallPHP.js"></script>

<?
session_start();
$file=$_FILES['pix'];
$place2place="Img"; //ระบุตำแหน่งที่เก็บไฟล์

/*echo "ชื่อของไฟล์ คือ ".$file[name]."<br>";
echo "ขนาดของไฟล์ คือ ".$file[size]."<br>";
echo "เนื้อหาของไฟล์ คือ ".$file[tmp_name]."<br>";
echo "ชนิดของไฟล์ คือ ".$file[type]."<br><br>";
*/
echo "<input type='hidden' id=imgurl value=Img/".$file[name].">";
echo "<input type='hidden' id=perid value=".$_SESSION['id'].">";


if(@copy($file[tmp_name],"$place2place/".$file[name]))
{
if(eregi("^image",$file[type]))
//echo "<img src=\"$place2place/$file[name]\">";
  echo "";
else
//echo "<a href=\"$place2place/$file[name]\">$file[name] </a>";
   echo "";
}
else
echo exit;;


?>


<script>
changeimgurl();
returnpage();
function changeimgurl(){
	var imgname = document.getElementById("imgurl").value;
	var perid = document.getElementById("perid").value;
	var result = call3("Sql.php","change","imgurl", imgname , perid );
}
function returnpage(){
	window.location = "profile.php";
}

</script>