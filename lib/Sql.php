<?php
$username = "azure";
$servername = "127.0.0.1:56286";
$password = "6#vWHD_$";
$dbname = "localdb";
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
switch ($_GET['f']) {
    case login:
        login($_GET['data'],$_GET['data2']);
        break;
	case register:
		register($_GET['data'],$_GET['data2'],$_GET['data3'],$_GET['data4'],$_GET['data5']);
		break;
	case change:
        change($_GET['data'],$_GET['data2'],$_GET['data3']);
        break;	
	case addnovel:
        addnovel($_GET['data'],$_GET['data2'],$_GET['data3'],$_GET['data4'],$_GET['data5'],$_GET['data6']);
        break;
	case search:
        search($_GET['data'],$_GET['data2'],$_GET['data3']);
        break;
	case deletenovel:
        deletenovel($_GET['data']);
        break;	
	default:
        echo "Cannot found function";
}
function login($val,$val2){
	$sql = "select * from profile where (username='".$val."') AND (password='".$val2."')" ;
	$result = $GLOBALS["conn"]->query($sql);
	while($row = $result->fetch_assoc()){
		if($row['perID']!=null) { 
           echo "1";
		   session_start();
		   $_SESSION['id']=$row['perID'];
		   $_SESSION['username']=$row['username'];
           $_SESSION['imgurl']=$row['imgurl'];
		   $_SESSION['email']=$row['email'];
		   return;
		}
	}
	echo "0";
}
function register($val,$val2,$val3,$val4,$val5){
	$sql = "INSERT INTO profile (username,password,birthday,gender,email,imgurl) VALUES ( '".$val."', '".$val2."' , '".$val3."' , '".$val4."' , '". $val5 ."' , '"."Img/profile.jpg"."')";
	$result = $GLOBALS["conn"]->query($sql);
	if ($result==1) 
	{	echo "1";
	}
    else 
		echo $sql;
}
function change($val,$val2,$val3){
	$sql = "UPDATE profile SET ".$val."='".$val2."' where perID =".$val3;
	$result = $GLOBALS["conn"]->query($sql);
	if ($result==1) 
	{	echo "1";
		session_start();
		if($val=="perID") $val = "id";
		 $_SESSION[$val]=$val2;
	}
    else 
		echo $sql;
}
function addnovel($val,$val2,$val3,$val4,$val5,$val6){
	session_start(); 
	$sql = "INSERT INTO novel (perID,name,author,story,category,numep,imgurl) VALUES ('".$_SESSION['id']."', '".$val."' , '".$val2."' , '".$val3."' , '". $val4 ."' , '".$val5."','".$val6."')";
	$result = $GLOBALS["conn"]->query($sql);
	if ($result==1) 
	{	echo "1";
	}
    else 
		echo $sql;
}
function search($val,$val2,$val3){
	echo "<center><table class='table bg-info table-hover table-nonfluid'>
			<thead>
				<tr>
					<th class='text-center' width=100> <div align=center>เรื่องที่</div></th>
					<th class='text-center' width=200> <div align=center>ชื่อเรื่อง</div></th>
					<th class='text-center' width=200>หมวดหมู่</th>
					<th class='text-center' width=100>จำนวนตอน</th>
					<th class='text-center' width=100>รูปปก</th>
					<th class='text-center' width=100>ผู้แต่ง</th>
				</tr>
			</thead>";
	
	$i = 1;
	$sql = "select * from novel where name='".$val."'";
	
	if($val == "" && $val2 == "") 
		$sql = "select * from novel";
	else if($val == "")
		$sql = "select * from novel where author='".$val2."'";
		
	$result = $GLOBALS["conn"]->query($sql);
	while($row = $result->fetch_assoc()){
		if($row['noID']!=null)
		{ 
		echo 
			"<tr>
			<td class='text-center' width=100>".$i."</td>
			<td class='text-center' width=70><a href='main_novel.php?noID=".$row['noID']."'>".$row['name']."</a></td>
			<td class='text-center' width=200>".$row['category']."</td>
			<td class='text-center' width=100>".$row['numep']."</td>
			<td class='text-center' width=100><img height=70 src='".$row['imgurl']."'></td>
			<td class='text-center' width=100>".$row['author']."</td>
			</tr>";
			$i++;
		}
	}
}
function deletenovel($val){
	$sql = "DELETE FROM novel where noID='".$val."'";
	$result = $GLOBALS["conn"]->query($sql);
	if ($result==1) 
	{	
		echo "1";
	}
    else 
		echo $sql;
}


?>
