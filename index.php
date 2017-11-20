<?php 
require_once('import/head.php'); 
?>
<title>หน้าหลัก</title>
<style>
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #72A5AD;
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: #72A5AD;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab button.active {
    background-color: white;
}

.tabcontent {
    -webkit-animation: fadeEffect 1s;
    animation: fadeEffect 1s; /* Fading effect takes 1 second */
}

@-webkit-keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}

@keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}

.tab:nth-child(1) { margin-left: 30%; }

.box
	{
		width: 150px;
		border: 1px solid #9325BC;
		padding: 10px;
	}
	.box:hover
	{
		-moz-box-shadow: 0 0 10px #ccc;
		-webkit-box-shadow: 0 0 10px #ccc;
		box-shadow: 0 0 10px #ccc;
	}
</style>


<body style="background-color:#4789B2;">

<!-- Slide Show -->
	<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
		<li data-target="#carousel" data-slide-to="3"></li>
		<li data-target="#carousel" data-slide-to="4"></li>
    </ol>
    <!-- Carousel items -->
    <div class="carousel-inner img-responsive"  role="listbox">
        <div class="active item"><img src="Img/cover1.jpg" /></div>
        <div class="item"><img src="Img/cover2.jpg" /></div>
        <div class="item"><img src="Img/cover3.jpg"  /></div>
		<div class="item"><img src="Img/cover4.jpg"  /></div>
		<div class="item"><img src="Img/cover5.jpg"  /></div>
    </div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#carousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#carousel" data-slide="next">&rsaquo;</a>
</div>
	<div id="tabs" class="tab">
		<div id='p1'><button id="defaultOpen" class="tablinks" onclick="changepage(event, 'page1') ">ยอดนิยม</button></div>
		<div id='p2'><button class="tablinks" onclick="changepage(event, 'page2')">อัพเดทล่าสุด</button></div>
		<div id='p3'><button class="tablinks" onclick="changepage(event, 'page3')">แนะนำ</button></div>

	</div>
	<br>
<table >
	<tr>
	<td width='1100'></td>
	<td width='200'>
		<div>
		<select  class='form-control' id='category' onchange="change()">
		<option id="topic">หมวดหมู่นิยาย</option>
		<option>รักโรแมนติก</option>
		</select>
		</div>
	<td>
	</tr>
</table>

<br>
<!-- Table -->
<div id="page1" class="tabcontent">
	<div class="scroll">
		<center><table>
			<tr>
				<td width='500'><a href="main_novel.php?noID=17"><img src='Img/1.png' height='50%'></a></td>
				<td><a href="main_novel.php?noID=18"><img src='Img/2.png' height='50%'></a></td>
			</tr>
			<tr>
				<td><a href="main_novel.php?noID=16"><img src='Img/3.png' height='50%'></a></td>
				<td><a href="main_novel.php?noID=19"><img src='Img/4.png' height='50%'></a></td>
			</tr>
			<tr>
				<td><img src='Img/5.png' height='50%'></a></td>
				<td><img src='Img/6.png' height='50%'></a></td>
			</tr>
		</table>
	</div>
</div>
<div id="page2" class="tabcontent">
	<div class="scroll">
		<center><table>
			<tr>
				<td width='500'><img src='Img/7.png' height='50%'></td>
				<td><a href="main_novel.php?noID=20"><img src='Img/8.png' height='50%'></td>
			</tr>
			<tr>
				<td><img src='Img/9.png' height='50%'></td>
				<td><img src='Img/10.png' height='50%'></td>
			</tr>
			<tr>
				<td><img src='Img/11.png' height='50%'></td>
				<td><a href="main_novel.php?noID=21"><img src='Img/12.png' height='50%'></td>
			</tr>
		</table>
	</div>
</div>
<div id="page3" class="tabcontent">
	<div class="scroll">
		<center><table>
			<tr>
				<td width='500'><img src='Img/13.png' height='50%'></td>
				<td><img src='Img/14.png' height='50%'></td>
			</tr>
			<tr>
				<td><img src='Img/15.png' height='50%'></td>
				<td><img src='Img/16.png' height='50%'></td>
			</tr>
			<tr>
				<td><a href="main_novel.php?noID=22"><img src='Img/17.png' height='50%'></td>
				<td><img src='Img/18.png' height='50%'></td>
			</tr>
		</table>
	</div>
</div>
<div id="page4" class="tabcontent">
	<div class="scroll">
		<center><table>
			<tr>
				<td width='500'><img src='Img/19.png' height='50%'></td>
				<td><img src='Img/20.png' height='50%'></td>
			</tr>
			<tr>
				<td><img src='Img/21.png' height='50%'></td>
				<td><img src='Img/22.png' height='50%'></td>
			</tr>
			<tr>
				<td><img src='Img/23.png' height='50%'></td>
				<td><img src='Img/24.png' height='50%'></td>
			</tr>
		</table>
	</div>
</div>
<div id="page5" class="tabcontent">
	<div class="scroll">
		<center><table>
			<tr>
				<td width='500'><img src='Img/25.png' height='50%'></td>
				<td><img src='Img/26.png' height='50%'></td>
			</tr>
			<tr>
				<td><img src='Img/27.png' height='50%'></td>
				<td><img src='Img/28.png' height='50%'></td>
			</tr>
			<tr>
				<td><img src='Img/29.png' height='50%'></td>
				<td><a href="main_novel.php?noID=23"><img src='Img/30.png' height='50%'></td>
			</tr>
		</table>
	</div>
</div>
<div id="page6" class="tabcontent">
	<div class="scroll">
		<center><table>
			<tr>
				<td width='500'><img src='Img/31.png' height='50%'></td>
				<td><img src='Img/32.png' height='50%'></td>
			</tr>
			<tr>
				<td><a href="main_novel.php?noID=24"><img src='Img/33.png' height='50%'></td>
				<td><a href="main_novel.php?noID=25"><img src='Img/34.png' height='50%'></td>
			</tr>
			<tr>
				<td><img src='Img/35.png' height='50%'></td>
				<td><img src='Img/36.png' height='50%'></td>
			</tr>
		</table>
	</div>
</div>




<br>
<br>

</body>
<script>
function change(){
	var x = document.getElementById("category").value;
	var p1 = "page1";
	var p2 = "page2";
	var p3 = "page3";
	var p4 = "page4";
	var p5 = "page5";
	var p6 = "page6";
	if(x=="รักโรแมนติก")
	{
		document.getElementById("p1").innerHTML =
		"<button id='defaultOpen' class='tablinks' onclick=changepage(event,'"+p4+"')>ยอดนิยม</button>";
		document.getElementById("p2").innerHTML =
		"<button  class='tablinks' onclick=changepage(event,'"+p5+"')>อัพเดทล่าสุด</button>";
		document.getElementById("p3").innerHTML =
		"<button  class='tablinks' onclick=changepage(event,'"+p6+"')>แนะนำ</button>";
	}
	else
	{
		document.getElementById("p1").innerHTML =
		"<button id='defaultOpen' class='tablinks' onclick=changepage(event,'"+p1+"')>ยอดนิยม</button>";
		document.getElementById("p2").innerHTML =
		"<button  class='tablinks' onclick=changepage(event,'"+p2+"')>อัพเดทล่าสุด</button>";
		document.getElementById("p3").innerHTML =
		"<button  class='tablinks' onclick=changepage(event,'"+p3+"')>แนะนำ</button>";
	}
	
	document.getElementById("defaultOpen").click();

}

function changepage(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();
</script>

