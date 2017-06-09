<?php
	session_start();
	$cid=$_SESSION['teacher_cid'];
	$did=$_SESSION['teacher_did'];
	include '../../public/common/config.php';
	$course_id=$_GET['course_id'];
	$point_id=$_GET['point_id'];
	$college_id=$_GET['college_id'];
	$dept_id=$_GET['dept_id']
	


?>


<!doctype html>
<html lang="en">
<head>
	<meta chrset="UTF-8">
	<title>index</title>
<style>
	.main{
		height:100%;
		width:100%;
		
	}
	*{
		font-family：微软雅黑;
		color:#2C60AD;
	}
	.bd{
		margin-left:450px;
		margin-top:50px;
	}

	.btn{
		width:100px;
		border:none;
		border-radius:4px;
		left:455px;
		position:absolute;
		height:25px;
		background-color:#2C60AD;;
		color:#fff;
		cursor:pointer;
		border-radius: 4px;
	}

	</style>
	<link rel="stylesheet" href="../../public/style/public.css">
	</head>
	<body>
		<div class="main">
				<form action="up.php" method="post" class="bd">

			<p>
				输入权值：<p><input type="text" name="weight"></p>
			</p>
		
			<p><input type="submit" name="添加" value="提交" class="btn"></p>
			<input type="hidden" name="course_id" value="<?php echo $course_id?>">
			<input type="hidden" name="point_id" value="<?php echo $point_id?>">
			<input type="hidden" name="college_id" value="<?php echo $college_id?>">
			<input type="hidden" name="dept_id" value="<?php echo $dept_id?>">
		</form>
		
	
		

		</div>
		
	</body>
	</html>