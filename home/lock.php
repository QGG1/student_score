<?php
	session_start();
	$path=$_SERVER['PHP_SELF'];
	$arr=explode('/',$path);
	$root='/'.$arr[1];
	if(!isset($_SESSION['teacher_id'])){
		//exit;
		echo "<script>location='{$root}/home/login.php'</script>";
		exit;
	}
?>