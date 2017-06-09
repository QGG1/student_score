<?php
	session_start();
	include '../../public/common/config.php';
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

		<form action="to_template.php" method="post" enctype="multipart/form-data" class="bd">
		
			<p>模板名称：</p>
			<p><input type="text" name="template_name"></p>
			<p>班级编号：</p>
			<p><input type="text" name="class_id"></p>
			<p>选择课程：</p>
			<p>
				<select name="course_id">
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
			<p><input type="submit" value="添加模板" class="btn"></p>
		</form>
		

		</div>
		
	</body>
	</html>