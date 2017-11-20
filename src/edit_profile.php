<?php require_once('import/head.php'); require_once('import/login.php');?>
<?php session_start(); ?>
<style>
.table-borderless > tbody > tr > td,
.table-borderless > tbody > tr > th,
.table-borderless > tfoot > tr > td,
.table-borderless > tfoot > tr > th,
.table-borderless > thead > tr > td,
.table-borderless > thead > tr > th {
    border: none;
}
</style>

<a href='index.php'>หน้าหลัก</a> > แก้ไขโปรไฟล์

<center><table class="table table-borderless">
	<tr>
		<td  width=300>
				<center><table>
				<tr><td>
					<?php echo "<img class='img-circle' src='".$_SESSION['imgurl']."' height='250px' width='250px'>"; ?>
				</td></tr>
				<tr><td>
				<br><button class='btn  initialism fall_open nav navbar-nav' onclick='changeupload()' >
					<span class="glyphicon glyphicon-edit">แก้ไขรูปโปรไฟล์</span>
				</button>
				</td></tr>
				</table>
		</td>
		<td  width=600 > 
			<table  style="background-color:#c8c8c8;" class="table table-borderless">
				<tr><td width=100><label>1.แก้ไขประวัติส่วนตัว</label></td></tr>
				<tr>
					<td class="text-right"><label for="usr">Username:</label></td>
					<td>
					<div class="form-group col-xs-5">
					<input type="text" class="form-control text-center" id="usr">
					</div>
				</td></tr>
				<tr>
					<td class="text-right"><label for="usr">ชื่อนามสกุล:</label></td></td>
					<td>					
					<div class="form-group col-xs-5">
					<input type="text" class="form-control" id="pwd">
					</div>
				</td></tr>
				<tr>
					<td class="text-right"><label for="usr">วันเกิด</label></td></td>
					<td>					
					<div class="form-group col-xs-5">
					<input type='date' id='date' name='bday'>
					</div>
				</td></tr>
				<tr><td></td>
					<td>					
					<div class='radio col-xs-10'>
						<label><input type='radio' id='sex1' name='optradio'>เพศชาย&nbsp;&nbsp;</label>
						<label><input type='radio' id='sex2' name='optradio'>เพศหญิง</label>
					</div>
				</td></tr>
				<tr><td></td>
					<td>					
					<div class='col-xs-10'>
						<button class="btn">บันทึกการเปลี่ยนแปลง</button>
					</div>
				</td></tr>
				<tr><td width=100><label>2.แก้ไข Email และ Password </label></td></tr>
				<tr>
					<td class="text-right"><label for="usr">Email</label></td>
					<td>
					<div class="form-group col-xs-5">
					<input type="text" class="form-control text-center" id="usr">
					</div>
				</td></tr>
				<tr>
					<td class="text-right"><label for="usr">รหัสผ่านเดิม</label></td></td>
					<td>					
					<div class="form-group col-xs-5">
					<input type="password" class="form-control" id="pwd">
					</div>
				</td></tr>
				<tr>
					<td class="text-right"><label for="usr">รหัสผ่านใหม่</label></td></td>
					<td>					
					<div class="form-group col-xs-5">
					<input type="password" class="form-control" id="pwd">
					</div>
				</td></tr>
				<tr>
					<td class="text-right"><label for="usr">รหัสผ่านใหม่</label></td></td>
					<td>					
					<div class="form-group col-xs-5">
					<input type="password" class="form-control" id="pwd">
					</div>
				</td></tr>
				<tr><td></td>
					<td>					
					<div class='col-xs-10'>
						<button class="btn">บันทึกการเปลี่ยนแปลง</button>
					</div>
				</td></tr>
			</table>
		</td>
	</tr>
<table>
