<style>
font {
	color: black;
}
font2 {
	color: white;
}
font2X {
	color: white;
}
font3 {
	color: yellow;
}

</style>

<link rel="stylesheet" href="css/bootstrap.css">
<script src="js/jquery-1.8.2.min.js"></script>
<script src="js/jquery.popupoverlay.js"></script>
<script src="js/CallPHP.js"></script>
<div id="fall" style="background-color:#4789B2;">
<br>
<div class="text-center white"><H2><font2 id='head'>เข้าสู่ระบบ</H2></div>
<p id="alert"></p>
<br>
<div id="changeinput" >
<table  width=400>
<tr>
<td class="text-right col-xs-2"><font2>Email/Username</th>
<td class="text-center"><div class="col-xs-10"><input id="Username" class="form-control" type=text ></div></td>
</tr>
<tr height=15>
</tr>
<tr>
<td class="text-right col-xs-2"><font2>Password</th>
<td class="text-center"><div class="col-xs-10"><input id="Password" class="form-control" type=password></div></td>
</tr>
<tr height=15><td></td>
<td>
	<div class="checkbox col-xs-10">
	<label><input type="checkbox" value=""><font2>จำฉันไว้ในระบบ</label>
</div></td>
</tr>
<tr height=15><td></td>
<td class="col-xs-10"><a href="#"><font2>ลืมรหัสผ่าน?</a></td>
</tr>
</table>

<center>
<table>
<tr>
<td height=100 class='text-center'>
<button onclick="login()" class="btn btn-success"><font>เข้าสู่ระบบ</font></button>
</td></tr>
<tr><td class='text-center'><font2>-------------------------------หรือ-------------------------------</td></tr>
<tr>
<td height=100 class='text-center'>
<button class="btn  btn-danger" onclick=changeregister() ><font>สมัครสมาขิก</font></button>
</td>
</tr>
</table>
</div>
</div>
<style>
    #fall_background {
        -webkit-transition: all 1s;
           -moz-transition: all 1s;
                transition: all 1s;
    }
    #fall_wrapper {
        -webkit-transition: all 1s;
           -moz-transition: all 1s;
                transition: all 1s;
        -webkit-perspective: 1300px;
        -moz-perspective: 1300px;
        perspective: 1300px;
    }
    #fall {
        -webkit-transition: all 1s ease-in;
        -moz-transition: all 1s ease-in;
        transition: all 1s ease-in;
        -webkit-transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
        transform-style: preserve-3d;
        -webkit-transform: translateZ(600px) rotateX(20deg);
        -moz-transform: translateZ(600px) rotateX(20deg);
        -ms-transform: translateZ(600px) rotateX(20deg);
        transform: translateZ(600px) rotateX(20deg);
    }
    .popup_visible #fall {
        -webkit-transform: translateZ(0px) rotateX(0deg);
        -moz-transform: translateZ(0px) rotateX(0deg);
        -ms-transform: translateZ(0px) rotateX(0deg);
        transform: translateZ(0px) rotateX(0deg);
    }
	

.table-borderless > tbody > tr > td,
.table-borderless > tbody > tr > th,
.table-borderless > tfoot > tr > td,
.table-borderless > tfoot > tr > th,
.table-borderless > thead > tr > td,
.table-borderless > thead > tr > th {
    border: none;
}
</style>
<?php
	echo "<input type=hidden id=author value='".$_SESSION["username"]."'>";
?>

<script>

var imgurl;

function login(){
	var username = document.getElementById("Username").value;
	var password = document.getElementById("Password").value;
	if(username==""){
		document.getElementById("alert").innerHTML = "<center><font3>*กรุณาป้อนชื่อผู้ใช้</font3></center>";
		return;
	}
	else if(password==""){
		document.getElementById("alert").innerHTML = "<center><font3>*กรุณาป้อนรหัสผ่าน</font3></center>";
		return;
	}
	
	var result = call2("Sql.php","login",username,password);
	if( result == "1")
	{
		if(username=="admin") 
			window.location = "manage.php";
		else 
			window.location = "index.php";
	}
	else if ( result == "0")
		document.getElementById("alert").innerHTML = "<center><font3>*ไม่พบผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง</font3></center>";
	else
		alert("มีข้อผิดพลาดเกิดขึ้น"+result);
}
function register(){
	var username = document.getElementById("Username").value;
	var email = document.getElementById("email").value;
	var password = document.getElementById("Password").value;
	var password2 = document.getElementById("Password2").value;

	if(username=="") 
	{	document.getElementById("alert").innerHTML = "<center><font3>*กรุณาป้อนชื่อผู้ใช้</font3></center>";
		return;
	}
	else if(email=="")
	{
		document.getElementById("alert").innerHTML = "<center><font3>*กรุณาป้อนอีเมลล์</font3></center>";
		return;
	}
	else if(password=="")
	{	document.getElementById("alert").innerHTML = "<center><font3>*กรุณาป้อนรหัสผ่าน</font3></center>";
		return;
	}	
	else if(password != password2)
	{	document.getElementById("alert").innerHTML = "<center><font3>*รหัสผ่านต้องตรงกัน</font3></center>";
		return;
	}
	
	var gender;
	var bdate = document.getElementById("date").value;
	if(document.getElementById("sex1").checked)
		gender = "M";
	else if(document.getElementById("sex2").checked)
		gender = "F";
	else
	{
		document.getElementById("alert").innerHTML = "<center><font3>*กรุณาเลือกเพศของคุณ</font3></center>";
		return;
	}
	
	if(bdate=="")
	{
		document.getElementById("alert").innerHTML = "<center><font3>*กรุณาเลือกวันเกิดของคุณ</font3></center>";
		return;
	}
	
	
	var result = call5("Sql.php","register",username,password,bdate,gender,email);
	if(result == "1") {
		window.location = "index.php";
	}
	else alert("มีข้อผิดพลาดเกิดขึ้น");
}
function beginwrite(){
	var title = document.getElementById("title").value;
	var author = document.getElementById("author").value;
	var story = document.getElementById("story").value;
	var category = document.getElementById("category").value;
	var numep = document.getElementById("numep").value;
	var novelurl = "Img/"+imgurl;
	
	var result = call6("Sql.php","addnovel",title,author,story,category,numep,novelurl);
	if(result == "1") {
		window.location = "profile.php";
	}
	else alert("มีข้อผิดพลาดเกิดขึ้น");
	//window.location = "main_novel.php";
}
function changeregister(){
document.getElementById("head").innerHTML = "สมัครสมาขิก";
document.getElementById("alert").innerHTML = null;
document.getElementById("changeinput").innerHTML = 
"<table  width=400 >"
+"<tr><td class='text-right col-xs-2'><font2>Username</th><td class='text-center'><div class='col-xs-10'><input id='Username' class='form-control' type=text ></div></td></tr>"
+"<tr height=65><td class='text-right col-xs-2'><font2>Email</th><td class='text-center'><div class='col-xs-10'><input id='email' class='form-control' type=text></div></td></tr>"
+"<tr></tr><tr><td class='text-right col-xs-2'><font2>รหัสผ่าน</th><td class='text-center'><div class='col-xs-10'><input id='Password' class='form-control' type=password></div></td></tr>"
+"<tr height=65><td class='text-right col-xs-2'><font2>รหัสผ่าน</th><td class='text-center'><div class='col-xs-10'><input id='Password2' class='form-control' type=password></div></td></tr>"
+"<tr height=15><td class='text-right col-xs-2'><font2>วันเกิด</th><td class='col-xs-10'><input type='date' id='date' name='bday'></td></tr>"
+"<tr><td></td><td class='col-xs-10'><div class='radio'><label><input type='radio' id='sex1' name='optradio'><font2>เพศชาย&nbsp;&nbsp;</label><label><input type='radio' id='sex2' name='optradio'><font2>เพศหญิง</label></div></td></tr>"
+"</table><center><table><tr><td height=100 class='text-center'><button class='btn  btn-danger' onclick=register() ><font>สมัครสมาขิก</font></button></td></tr>"
+"<tr><td class='text-center'><font2>-------------------------------หรือ-------------------------------</td></tr>"
+"<tr><td height=100 class='text-center'>"
+"<button onclick='changelogin()' class='btn btn-success'><font>เข้าสู่ระบบ</font></button></td></tr>";
+"</table>";
}
function changelogin(){
	document.getElementById("head").innerHTML = "เข้าสู่ระบบ";
	document.getElementById("alert").innerHTML = null;
	document.getElementById("changeinput").innerHTML =
"<table width=400 >"
+"<tr><td class='text-right col-xs-2'><font2>Username</th><td class='text-center'><div class='col-xs-10'><input id='Username' class='form-control' type=text ></div></td></tr>"
+"<tr height=15></tr>"
+"<tr><td class='text-right col-xs-2'><font2>Password</th><td class='text-center'><div class='col-xs-10'><input id='Password' class='form-control' type=password></div></td></tr>"
+"<tr height=15><td></td><td><div class='checkbox col-xs-10'><label><input type='checkbox' ><font2>จำฉันไว้ในระบบ</label></div></td></tr>"
+"<tr height=15><td></td><td class='col-xs-10'><a href='#'><font2>ลืมรหัสผ่าน?</a></td></tr></table><center><table>"
+"<tr height=100><td height=100 class='text-center'><button onclick='login()' class='btn btn-success'><font>เข้าสู่ระบบ</font></button></td></tr>"
+"<tr><td class='text-center'><font2>-------------------------------หรือ-------------------------------</td></tr>"
+"<tr><td height=100 class='text-center'>"
+"<button class='btn  btn-danger' onclick=changeregister() ><font>สมัครสมาขิก</font></button></td></tr>";
+"</table>";
}

function changewrite(){
	document.getElementById("head").innerHTML = "แต่งนิยาย";
	document.getElementById("changeinput").innerHTML = 
"<center><table width=700 >"
+"<tr><td><font2>ชื่อเรื่อง<br></td></tr>"
+"<tr class='text-center'><div class='col-lg-5'><td><input id='title' class='form-control placeholder=.col-lg-5' type=text width=100 ><br></div></td></tr>"
+"<tr><td><font2>เรื่องย่อ<br></td></tr>"
+"<tr><td><div class='form-group'><textarea class='form-control' rows='5' id='story'></textarea></div></td></tr>"
+"<tr><td><font2>หมวดหมู่<br></td></tr>"
+"<tr><td><br><div class='col-lg-3'><select class='form-control' id='category'><option>รักโรแมนติก</option><option>สยองขวัญ</option>"
+" </select></div></li></ul></div></td></tr>"
+"<tr><td><font2><br>จำนวนตอน<br></td></tr>"
+"<tr><td><div class='form-group  col-lg-2'><input type='text' class='form-control' id='numep'></div></td></tr>"
+"<tr><td><font2>อัพโหลดรูปปกนิยาย</td></tr></table><tr><td><table class='table table-borderless'><tr><td width=100><div id='img'><img src='Img/profile.jpg' height='100'></div></td>"
+"<td><font2><input onchange='upload()' type='file' id='file' name='pix' size=45></td></tr></table>"
+"<table><tr><td><center><table><tr><td width='100'><button  class='btn fall_close'><font>ยกเลิก</font></button></td>"
+"<td><button onclick='beginwrite()' class='btn'><font>เริ่มแต่งนิยาย</font></button></center></td></tr></table><td></td></tr></td></tr>"
+"</table>";
}

function changeupload(){
	document.getElementById("head").innerHTML = "แก้ไขรูปภาพ";
	document.getElementById("changeinput").innerHTML = 
	"<form method=post action='upload.php' enctype='multipart/form-data'>"
	+"<center><table width=600 ><tr><td width='50'></td><td>"
	+"<div class='panel panel-default'><div class='panel-body'>"
	+"<label><input type='radio' id='sex1' name='optradio'>เลือกรูปจากเครื่อง</label>"
	+"เลือกไฟล์รุปภาพที่ต้องการอัพโหลด <br>"
	+"<input type='file' name='pix' size=45>"
	+"ความละเอียดไม่เกิน 450 x 450 px หรือ ขนาดไม่เกิน 100 kb"
	+"</div></div></td><td width='50'></td></tr>"
	+"<tr><td width='50'></td><td>"
	+"<div class='panel panel-default'><div class='panel-body'>"
	+"<label><input type='radio' id='sex1' name='optradio'>ถ่ายจาก Webcam</label>"
	+"</div></div>"
	+"</td><td width='50'></td></tr></table>"
	+"<button class='btn'>ยกเลิก</button>"
	+"<button class='btn'  type='submit'>บันทึก</button></form>";
}

$(document).ready(function () {
    $('#fall').popup({
        beforeopen: function () {    },
        onopen: function () {    },
        onclose: function () {    },
        opentransitionend: function () {    },
        closetransitionend: function () { changelogin();   }
    });
});


function upload() {
	var filepath = document.getElementById("file").value;
	var filename = filepath.split('\\');
	imgurl = filename[filename.length-1];
	
	
    var file_data = $('#file').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    var result="";                          
    $.ajax({
                url: 'uploadnovel.php', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
				async: false, 
                success: function(output){
                    result = output;
                }
			});
	while(result=="");
	document.getElementById("img").innerHTML = "<img src='Img/"+imgurl+"' height='100'>";
    
}

</script>