<?php
	include '../../public/common/config.php';
	$college_id=$_GET['college_id'];

	$dept_id=$_GET['dept_id'];
	$course_id=$_GET['course_id'];
	$point_id=$_GET['point_id'];
?>


<!doctype html>
<html lang="en">
<head>
	<meta chrset="UTF-8">
	<title>index</title>
		<style>
	body{
		background-color:rgba(0,0,0,0.6);
	}
	.main{
		height:100%;
		width:100%;

	}
		*{
			font-family：微软雅黑;
			
		}
		.bd{
			color:#fff;
			margin-left:400px;
			margin-top:50px;
		}
		.bd .name{
			color:red;	
			
			
		}
		.btn{
			width:80px;
			border:none;
			left:440px;
			position:absolute;
			height:30px;
			background-color: #FF6700;
			color:#fff;
		}
		}
	</style>
	</head>
	<body>
		<div class="main">

		<form action="obj_insert.php" method="post" class="bd">
			<p>输入课程目标名称:</p>
			<p>
				<input type="text" name="course_obj_name">
			</p>
			<p>输入课程目标值:</p>
			<p>
				<input type="text" name="course_obj_value">
			</p>
			<input type="hidden" name="college_id" value="<?php echo $college_id?>">
			<input type="hidden" name="dept_id" value="<?php echo $dept_id?>">
			<input type="hidden" name="course_id" value="<?php echo $course_id?>">
			<input type="hidden" name="point_id" value="<?php echo $point_id?>">
			<p><input type="submit" name="添加" class="btn"></p>
		</form>
		

		</div>
		
	</body>
	</html>