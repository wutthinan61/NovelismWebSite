<style>
.table-borderless > tbody > tr > td,
.table-borderless > tbody > tr > th,
.table-borderless > tfoot > tr > td,
.table-borderless > tfoot > tr > th,
.table-borderless > thead > tr > td,
.table-borderless > thead > tr > th {
    border: none;
}

.table-nonfluid { width: auto !important; }
.bg-gray{
    background-color: #696969;
}
.navbar-pink {
  background-color: #72A5AD;
}

.navbar-nav li a {
    color: black;
}

.navbar-brand,
.navbar-nav li a {
    line-height: 90px;
    height: 90px;
    padding-top: 0;
}

.navbar-naf li a {
	height: 30px;
	color: white;
}

ul.nav a:hover { color: #cc66ff !important; }
ul.nav a font2:hover { color: #cc66ff !important; }
ul.nav font2X:hover { color: #cc66ff !important; }
.dropdown-menu {
    width: 250px !important;
}


fontsize {
	font-size: 1.5em
}

.navbar-nav > li > .dropdown-menu { background-color: #4789B2; }

.img-circle {
    border-radius: 50%;
}
</style>

<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body style="background-color:c8c8c8;">
	<nav class="navbar navbar-pink" role="navigation">
		<a class="navbar-brand" href="index.php"><img src="Img/webname.png" style="height:300%;" ></a>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><br><fontsize>หน้าแรก</a></li>
				<li class="dropdown navbar-naf">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><br><fontsize>นิยาย
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li>
							<center><font2>-------หมวดหมู่---------</center>
							<center><table>
								<tr>
									<td width=120 height=30><font2X>แนวสืบสวน</td>
									<td width=120><font2X>แนววิทยาศาสตร์</td>
									
								</tr>
								<tr>
									<td height=30><font2X>แนวระทึกขวัญ</td>
									<td><font2X>แนวย้อนยุค</td>
								</tr>
								<tr>
									<td height=30><font2X>แนวฆาตกรรม</td>
									<td><font2X>แนวรักโรแมนติก</td>
								</tr>
							</table></center>
						</li>
			
					</ul>
				</li>
			<li class="dropdown navbar-naf">
				
				<span class="caret"></span></a>
				<ul class="dropdown-menu">
					
					<?php 	session_start(); require_once('login.php'); ?>
				</ul>
				</li>
			<li><a href="contact.php"><br><fontsize>ติดต่อเรา</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
		<li><br><form class="navbar-form">
				<div class="input-group">
					<a href="search.php"><img src="Img/search.png" height="45"></a>
				</div>
			</form>
		</li>
		<?php
			if($_SESSION['id']==null) {
				echo "<li><a class='initialism fall_open nav navbar-nav' ><br><fontsize>เข้าสู่ระบบ</a></li>";
				//require_once('login.php');
			}
			else
				{ echo "<li><br><img class='img-circle' onclick='changep()' src='".$_SESSION['imgurl']."' height='50px' width='50px'></li>
					  <li class='dropdown navbar-naf'><a class='dropdown-toggle nav navbar-nav' data-toggle='dropdown'><br>
					  <fontsize>".$_SESSION['username']."</a><span class='caret'></span></a>
					  <ul class='dropdown-menu'>
						<li>
							<table>
							<tr class='text-center'>
								<td width='200'><br><a href='profile.php'><img class='img-circle' src='".$_SESSION['imgurl']."' height='80px' width='80px'></a></td>
								<td width='300'><font2><H2>".$_SESSION['username']."</H2><font2>".$_SESSION['email'].
								"<br><a href='edit_profile.php'><H4>แก้ไขโปรไฟล์</H4></a></td>
							</tr>
							</table>
							<a href='profile.php?tab=2'><font2>นิยายของฉัน</a>
							<a href='index.php'><font2>นิยายอัพเดท</a>
							<a href='profile.php?tab=1'><font2>นิยายที่ติดตาม</a>
							<a href=# class='initialism fall_open' onclick='changewrite()' ><font2>แต่งนิยาย</a>
						</li>";
						
				
					 if($_SESSION['id']=="14")
						echo "<li><a href='manage.php'><font2>จัดการนิยาย</a></li>";
				echo "<li><a href='import/logout.php'><font2>ออกจากระบบ</a></li></ul></li>";
				}	
		?>
		
		</ul>
</div>
</nav>


<script>
function changep(){
	window.location = "profile.php?tab=1";
}
</script>