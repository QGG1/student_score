<?php
	session_start();
	/*include 'index.php';*/
	include '../public/common/config.php';
	$tid=$_POST['teacherid'];
	$password=$_POST['password'];
	$sql="select * from teacher where tid='{$tid}' and password='{$password}' ";
	$rst=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($rst);

	
	if($row){
		$_SESSION['teacher_name']=$row['tname'];
		$_SESSION['teacher_cid']=$row['cid'];
		$_SESSION['teacher_did']=$row['did'];
		$_SESSION['teacher_id']=$tid;
		echo "<script>location='index.php'</script>";
	}
	else{
		echo "<script>alert('您的用户名或密码有误！')</script>";
		echo "<script>location='login.php'</script>";
	}
?>