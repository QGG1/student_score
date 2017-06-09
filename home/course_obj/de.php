<?php
	include '../../public/common/config.php';
	$course_id=$_GET['course_id'];
	$point_id=$_GET['point_id'];
	$course_obj_name=$_GET['course_obj_name'];
	$sql2="delete from course_obj where course_obj.course_id='{$course_id}' and point_id='{$point_id}' and course_obj_name='{$course_obj_name}'";
	$sql3="delete from work where course_id='{$course_id}' and point_id='{$point_id}' and course_obj_name='{$cours_obj_name}'";
	$rst2=mysqli_query($con,$sql2);
	$rst3=mysqli_query($con,$sql3);
	if($rst2)
	{
		echo "<script>alert('删除成功')</script>";
		echo "<script>location='cp2.php'</script>";
	}
?>