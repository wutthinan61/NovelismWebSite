function call(url,f,data) {
    var result;
	var val = "lib/"+url+"?f="+f+"&data="+data;
    $.ajax({
      url:val,
      async: false,  
      success:function(output) {
         result = output; 
      }
   });
   return result;
}
function call2(url,f,data,data2) { 
    var result;
	var val = "lib/"+url+"?f="+f+"&data="+data+"&data2="+data2;
    $.ajax({
      url:val,
      async: false,  
      success:function(output) {
         result = output; 
      }
   });
   return result;
}
function call3(url,f,data,data2,data3) { 
    var result;
	var val = "lib/"+url+"?f="+f+"&data="+data+"&data2="+data2+"&data3="+data3;
    $.ajax({
      url:val,
      async: false,  
      success:function(output) {
         result = output; 
      }
   });
   return result;
}
function call5(url,f,data,data2,data3,data4,data5) { 
    var result;
	var val = "lib/"+url+"?f="+f+"&data="+data+"&data2="+data2+"&data3="+data3+"&data4="+data4+"&data5="+data5;
    $.ajax({
      url:val,
      async: false,  
      success:function(output) {
         result = output; 
      }
   });
   return result;
}
function call6(url,f,data,data2,data3,data4,data5,data6) { 
    var result;
	var val = "lib/"+url+"?f="+f+"&data="+data+"&data2="+data2+"&data3="+data3+"&data4="+data4+"&data5="+data5+"&data6="+data6;
    $.ajax({
      url:val,
      async: false,  
      success:function(output) {
         result = output; 
      }
   });
   return result;
}

$('#upload').on('click', function() {
    var file_data = $('#sortpicture').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    alert(form_data);                             
    $.ajax({
                url: 'novelupload.php', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(php_script_response){
                    alert(php_script_response); // display response from the PHP script, if any
                }
     });
});