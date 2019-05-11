<?php
	// id = StuID,
	// name = StuName,
	// email = StuMail,
	// school = SchoolID,
	// arr: statelist,
	$StuID = $_POST['id']; //获取索引
	$StuName = $_POST['name'];
	$StuMail = $_POST['email'];
	$SchoolID = $_POST['school'];
	$statelist = $_POST["arr"];
 
	// $json= json_encode($json_array);  //将数组转换成json对象
	echo  $statelist[1];
	
?>