<?php
	session_start();

	include '../../public/common/config.php';
	
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

		<form action="demand.php" method="post" class="bd">
			<p>输入选择学院编号:</p>
			<p>
				<input type="text" name="college_id">
			</p>
			<p>输入系编号:</p>
			<p>
				<input type="text" name="dept_id">
			</p>		
			<p>
				<input type="submit" name="查看" class="btn">
			</p>
		</form>
		</div>
		
	</body>
	</html>