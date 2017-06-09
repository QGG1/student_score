<?php
	session_start();
	$cid=$_SESSION['teacher_cid'];
	$did=$_SESSION['teacher_did'];
	include '../../public/common/config.php';
	$sql="delete from weight where college_id='{$cid}' and dept_id='{$did}'";
	// echo $sql;
	// exit;
	$rst=mysqli_query($con,$sql);
	echo "<script>alert('删除成功')</script>";
	echo "<script>location='chakan.php'</script>"
?>