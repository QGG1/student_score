<?php
	session_start();
	include '../../public/common/config.php';
	$sql="select * from point,demand";
	$rst=mysqli_query($con,$sql);	
	$cid=$_SESSION['teacher_cid'];
	$did=$_SESSION['teacher_did'];
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
		color:#fff;
		margin-left:450px;
		margin-top:50px;
	}
	.bd .name{
		color:red;		
	}
	.btn{
		width:120px;
		border:none;
		left:465px;
		position:absolute;
		height:30px;
		background-color:#2C60AD;;
		color:#fff;
		cursor:pointer;
		border-radius: 4px;
	}

	</style>
	<link rel="stylesheet" href="../../public/style/public.css">
	<body>
		<div class="main">

		<form action="insert_demand.php" method="post" enctype="multipart/form-data" class="bd">
		
			<p>要求编号：</p>
			<p><input type="text" name="demand_id"></p>
			<p>要求名称：</p>
			<p><input type="text" name="demand_name"></p>
			
			<p><input type="hidden" name="cid" value="<?php echo $cid?>"></p>
			
			<p><input type="hidden" name="did" value="<?php echo $did?>"></p>
			<p>要求内容:</p>
			<p>
				<input type="text" class="cont" name="demand_content" >
			</p>
			<p><input type="submit" value="添加毕业要求项目" class="btn"></p>
		</form>
		

		</div>
		
	</body>
	</html>