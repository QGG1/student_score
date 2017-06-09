<?php
	include '../../public/common/config.php';
	$demand_pro_id=$_GET['demand_pro_id'];

	$sqldemand="select * from demand where demand_pro_id='{$demand_pro_id}'";
	$rstdemand=mysqli_query($con,$sqldemand);	
	echo $sqldemand;
	
	$rowdemand=mysqli_fetch_assoc($rstdemand);
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
	<form action="update.php" method="post" enctype="multipart/form-data" class="bd">
			<!-- <p>要求编号：</p>
			<p><input type="text" name="demand_id"></p> -->
			<p>要求名称：</p>
			<p><input type="text" name="demand_name"></p>
			<p>指标点编号：</p>
			<p><input type="text" name="point_id"></p>
			<p>指标点名称：</p>
			<p><input type="text" name="point_name"></p>
			<p>指标点内容：</p>
			<p><input type="text" name="point_content"></p>
			<p>学院编号：</p>
			<p><input type="text" name="cid"></p>
			<p>系编号：</p>
			<p><input type="text" name="did"></p>
			<p><input type="hidden" name="demand_pro_id" ></p>
			<p><input type="submit" value="添加" class="btn"></p>
		</form>
		
		

		</div>
		
	</body>
	</html>