<?php
	include '../../public/common/config.php';
	$college_id=$_POST['college_id'];
	$dept_id=$_POST['dept_id'];
	$demand_pro_id=$_POST['demand_pro_id'];
	$name=$_POST['name'];
	$content=$_POST['content'];
	echo $demand_pro_id;
	// echo $name;
	// echo $content;
	$update="update demand set demand_pro_name='{$name}',demand_content='{$content}',demand_pro_id='{$demand_pro_id}'";
	echo $update;
?>