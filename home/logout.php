<?php
	session_start();
	include '../public/common/config.php';
	
	
	/*unset($_SESSION['admin_username']);
	session_destroy(); */

	$_SESSION=array();
	session_destroy();
	setcookie('PHPSESSID','',time()-3600,'/');
	echo "<script>top.location='login.php'</script>";
?>	