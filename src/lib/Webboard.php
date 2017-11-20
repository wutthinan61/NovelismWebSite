<?php
switch ($_GET['f']) {
    case view:
        view($_GET['data']);
        break;
	case addtopic:
        addtopic();
        break;
    default:
        echo "Cannot found function";
}
function view($val){
	 $id = $val;
     require_once("../import/view_topic.php"); 
}
function addtopic(){
	 require_once("../import/new_topic.php"); 
}
?>