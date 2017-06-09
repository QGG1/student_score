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
		height:90%;
		width:100%;
		
	}
	*{
		font-family：微软雅黑;
		color:#2C60AD;
	}
	.bd{
		margin-left:235px;
		margin-top:50px;
	}

	.course{
		position:absolute;
		height:800px;
		width:800px;
		left:150px;
		font-size: 14px;
		padding:10px 80px;
	}
	.course .cBox{
		display: inline-block;
		float: left;
		height:50px;
		width:180px;
	}
	.submit{
		position: relative;
		margin-top:50px;
		left:200px;
		height:50px;
		width:100px;
	}
	.btn{
		background-color:#2C60AD;;
		color:#fff;
		cursor:pointer;
		border:none;
		border-radius: 4px;
		height: 30px;
		width:100px;

	}
	</style>
	<link rel="stylesheet" href="../../public/style/public.css">
	</head>
	<body>
		<div class="main">

		<form action="temp.php" method="post" class="bd">
			
			<p><input type="hidden" name="cid" value="<?php echo $cid?>"></p>
			
			<p><input type="hidden" name="did" value="<?php echo $did?>"></p>
			<p>
			课程门数：				
				<input type="text" name="course_count">
				<input type="submit" value="提交" class="btn">
			</p>		
			<div class="course">
				<?php
					$sql="select * from course where cid='{$cid}' and did='{$did}' ";
					$rst=mysqli_query($con,$sql);
					while($row=mysqli_fetch_assoc($rst))
					{	
						echo "<li class='cBox' ><input type='checkBox' name='checkBox[]' value='{$row['course_id']}'> {$row['course_name']}</li>";
					}
				?>
		
			</div>
		<!-- 	<div class="submit">
				<input type="submit" value="提交" class="btn">
			</div>	 -->	
		</form>
	</div>
		
	</body>
	</html>