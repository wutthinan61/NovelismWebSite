<?php  require_once('import/head.php'); ?>

<center>
<B>----------------------------------------------------------------------------------------------ค้นหา---------------------------------------------------------------------------------------------------------------------------</B>

<table>
	<tr>
		<td class='text-center' height=75 width=150>ชื่อเรื่อง</th>
		<td><input id="novelname" class="form-control" type=text ></td>
		<td class='text-center' width=150>หมวดหมู่</th>
		<td>
			<div>
			<select  class='form-control' id='category' onchange="change()">
			<option>เลือกหมวดหมู่นิยาย</option>
			<option>รักโรแมนติก</option>
			</select>
			</div>
		</td>
	</tr>
	<tr>
		<td class='text-center' width=150>ผู้แต่ง</th>
		<td><input id="novelauthor" class="form-control" type=text ></td>
		<td class='text-center' width=150>สถานะ</th>
		<td>
		<div>
			<select  class='form-control' id='category' onchange="change()">
			<option>จบแล้ว</option>
			<option>ยังไม่จบ</option>
			</select>
			</div>
		</td>
	</tr>
</table>
<br>
<button onclick="search()" class="btn btn-default">ค้นหา</button>


<br><br>
<B>----------------------------------------------------------------------------------------------ผลการค้นหา---------------------------------------------------------------------------------------------------------------------------</B>
<br><br>
<div id="result"></div></center>

  
  
<script>
function search(){
	var title = document.getElementById("novelname").value;
	var author = document.getElementById("novelauthor").value;
	var category = "";
	var status = "";
	
	var result = call3("Sql.php","search",title,author,category);
	document.getElementById("result").innerHTML = result;
	
}

</script>
  