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
	form{
		position: relative;
		margin:100px 450px;
	}
	*{
		font-family：微软雅黑;
		color:#2C60AD;
	}
/*	.bd{
		margin-left:235px;
		margin-top:50px;
	}*/

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

			<form action="select.php" method="post" class="bd">
				
				<p><input type="hidden" name="cid" value="<?php echo $cid?>"></p>
				
				<p><input type="hidden" name="did" value="<?php echo $did?>"></p>
				<p>选择班级：</p>
				<p>
					<select name="class_id">
				<?php
					$sqlClass="select * from class where college_id='{$cid}' and dept_id='{$did}'";
					$rstClass=mysqli_query($con,$sqlClass);
					while($rowClass=mysqli_fetch_assoc($rstClass)){
						   echo "<option value='{$rowClass['class_id']}'>{$rowClass['class_id']}";
					}
				?>
			</select>
				</p>
				<div class="submit">
					<input type="submit" value="提交" class="btn">
				</div>		
			</form>
		</div>
		
	</body>
	</html>