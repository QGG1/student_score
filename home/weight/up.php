<?php
	session_start();
	$cid=$_SESSION['teacher_cid'];
	$did=$_SESSION['teacher_did'];
	include '../../public/common/config.php';
	$course_id=$_POST['course_id'];
	$point_id=$_POST['point_id'];
	$college_id=$_POST['college_id'];
	$dept_id=$_POST['dept_id'];
	$weight=$_POST['weight'];
	$sql="update weight set weight='{$weight}' where college_id='{$college_id}' and course_id='{$course_id}' and dept_id='{$dept_id}' and point_id='{$point_id}'";
	$rst=mysqli_query($con,$sql);
	echo "<script>alert('修改成功')</script>";
	echo "<script>location='chakan.php'</script>";
		//exit;	
?>

