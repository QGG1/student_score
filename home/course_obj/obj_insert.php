<?php
	include '../../public/common/config.php';
	$course_id=$_POST['course_id'];
	$college_id=$_POST['college_id'];
	$dept_id=$_POST['dept_id'];
	$point_id=$_POST['point_id'];
	$course_obj_name=$_POST['course_obj_name'];
	$course_obj_value=$_POST['course_obj_value'];
	$sql="insert into course_obj(course_obj_name,course_id,course_obj_value,point_id,dept_id,college_id)values('{$course_obj_name}','{$course_id}','{$course_obj_value}','{$point_id}','{$dept_id}','{$college_id}')";

	if($rst=mysqli_query($con,$sql)){
		echo "<script>alert('添加成功，返回查看页面')</script>";
		echo "<script>location='cp2.php'</script>";
	}

?>