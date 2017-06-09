<?php
	
	/*$gg=$_SESSION['teacher_name'];
	echo $gg;
	exit;*/
	include 'lock.php';
	include '../public/common/config.php';
?>
<!DOCTYPE>
<html>
	<head>
	<meta chrset="UTF-8">
	<style>
		body{
			height:5000px;
			background-color: red;
		}
	</style>
	<title>网站后台管理中心</title>
	
	</head>
	<frameset rows="120,*" frameborder="0">
		<frame src="top.php" name="top" scrolling="no">
			<frameset cols="230,*">
				<frame src="left.php" scrolling="no" name="left">
				<frame src="right.php" name="right">
			</frameset>
	</frameset>
	</html>