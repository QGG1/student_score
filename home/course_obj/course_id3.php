<?php
	session_start();
	$cid=$_SESSION['teacher_cid'];
	$did=$_SESSION['teacher_did'];
	include '../../public/common/config.php';
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
		border-radius: 4px;
		left:455px;
		position:absolute;
		height:25px;
		background-color:#2C60AD;;
		color:#fff;
		cursor:pointer;
	}

	</style>
	<link rel="stylesheet" href="../../public/style/public.css">
	</head>
	<body>
		<div class="main">

		<form action="point.php" method="post" class="bd">
			
			<p><input type="hidden" name="cid" value="<?php echo $cid?>"></p>
			
			<p><input type="hidden" name="did" value="<?php echo $did?>"></p>
			<p>选择课程：</p>
			<p>
				<select name="course_id">
					<option value="-1" selected>----请选择----</option>
					<?php
						$sql="select * from course where cid='{$cid}' and did='{$did}'";
						
						$rst=mysqli_query($con,$sql);
						while($row=mysqli_fetch_assoc($rst))
						{
							echo "<option value='{$row['course_id']}'>{$row["course_name"]}</option>";
						}
					?>
				</select>
			</p>
			
					
				
			<p><input type="submit" name="添加" value="查看课程指标点" class="btn"></p>
		</form>
		

		</div>
		
	</body>
	</html>