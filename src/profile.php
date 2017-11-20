<?php require_once('import/head.php'); require_once('import/login.php');?>
<script src="js/CallPHP.js"></script>
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


div.scroll {
    background-color: #C9E5E4;
    width: 550px;
    height: 1000px;
    overflow: scroll;
}

div.hidden {
    background-color: #00FF00;
    width: 100px;
    height: 100px;
    overflow: hidden;
}

div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: #ccc;
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
    background-color: #C9E5E4;
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
</style>

<a href='index.php'>หน้าหลัก</a> > โปรไฟล์

<center><table class="table table-borderless">
	<tr>
		<td  width=500>
				<center><table>
				<tr><td>
					<?php echo "<img class='img-circle' src='".$_SESSION['imgurl']."' height='250px' width='250px'>"; ?>
				</td></tr>
				<tr>
				<td><center>
					<br><button class='btn  initialism fall_open' onclick='changeupload()' >
					แก้ไขรูปโปรไฟล์
					</button>
				</td>
				</tr>
				</table>
		</td>
		<td width=1000> 
		<?php 
			echo "<input id=tabval type=hidden value='".$_GET["tab"]."'>";				
		?>
		<center>
			<table>
			<tr>
			<td>
			<center>
			<div  class="tab col-lg-15">
				<button id="tab1" class="tablinks col-lg-6" onclick="openCity(event, 'London') ">กำลังติดตาม</button>
				<button  id="tab2" class="tablinks col-lg-6" onclick="openCity(event, 'Paris')">งานเขียนของฉัน</button>
			</div>
			</td>
			</tr>
			<tr>
			<td>
			<div id="London" class="tabcontent">
				<div class="scroll">
				<img src='Img/1.png' width='70%'>
				<img src='Img/2.png' width='70%'>
				<img src='Img/3.png' width='70%'>
				<img src='Img/4.png' width='70%'>				
				<img src='Img/5.png' width='70%'>
				<img src='Img/6.png' width='70%'>
				<img src='Img/7.png' width='70%'>				
				<img src='Img/8.png' width='70%'>				
				<img src='Img/9.png' width='70%'>				
				<img src='Img/10.png' width='70%'>
				<img src='Img/11.png' width='70%'>
				<img src='Img/12.png' width='70%'>
				<img src='Img/13.png' width='70%'>
				<img src='Img/14.png' width='70%'>				
				</div>
			</div>

			<div id="Paris" class="tabcontent">
				<div class="scroll">
				<?php require_once('import/Novel.php'); ?>	
				</div> 
			</div>
			</td>
			</tr>
			</table>
		</td>
	</tr>
<table>

<script>
changetab();
function changetab(){
	var tabval = document.getElementById("tabval").value;
	if(tabval==1)
		document.getElementById("tab1").click();
	else
		document.getElementById("tab2").click();
}


function openCity(evt, cityName) {
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
	call3("Sql.php","change","imgurl", imgname , perid );
    
}
</script>

