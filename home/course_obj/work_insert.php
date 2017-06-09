<?php
	include '../../public/common/config.php';
	$course_id=$_POST['course_id'];
	$point_id=$_POST['point_id'];
	$course_obj_id=$_POST['course_obj_id'];
	$work_id=$_POST['work_id'];
	$work_name=$_POST['work_name'];
	$work_value=$_POST['work_value'];

	$sql="insert into work values('{$course_id}','{$point_id}','{$course_obj_id}','{$work_id}','{$work_name}',{$work_value})";
	$rst=mysqli_query($con,$sql);
	echo "<script>location='course_obj.php?course_id={$course_id}&point_id={$point_id}&course_obj_id={$course_obj_id}'</script>";
?>