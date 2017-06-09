<?php
	session_start();
	$cid=$_SESSION['teacher_cid'];
	$did=$_SESSION['teacher_did'];
	include '../../public/common/config.php';
	$course_id=$_GET['course_id'];
	//echo $course_id;
	$sql="delete from weight where course_id='{$course_id}' and college_id='{$cid}' and dept_id='{$did}'";
	//echo $sql;
	$rst=mysqli_query($con,$sql);
	echo "<script>alert('删除成功')</script>";
	echo "<script>location='chakan.php'</script>"
?>