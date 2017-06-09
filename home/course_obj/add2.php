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
		left:455px;
		position:absolute;
		height:25px;
		border-radius: 4px;
		background-color:#2C60AD;;
		color:#fff;
		cursor:pointer;
	}

	</style>
	<link rel="stylesheet" href="../../public/style/public.css">
	</head>
	<body>
		<div class="main">
<!-- 
		<form action="temp.php" method="post" class="bd">
			<p>输入选择学院编号:</p>
			<p>
				<input type="text" name="college_id">
			</p>
			<p>输入系编号:</p>
			<p>
				<input type="text" name="dept_id">
			</p>
			<p>输入课程编号:</p>
			<p>
				<input type="text" name="course_id">
			</p>
			<p>选择毕业要求项目：</p>
			<p>
				<input type="checkBox" name="checkBox[]" value="工程知识">工程知识<br>
				<input type="checkBox" name="checkBox[]" value="问题分析">问题分析<br>
				<input type="checkBox" name="checkBox[]" value="设计/开发解决方案">设计/开发解决方案<br>
				<input type="checkBox" name="checkBox[]" value="研究">研究<br>
				<input type="checkBox" name="checkBox[]" value="使用现代化工具">使用现代化工具<br>
				<input type="checkBox" name="checkBox[]" value="工程与社会">工程与社会<br>
				<input type="checkBox" name="checkBox[]" value="环境和可持续发展">环境和可持续发展<br>
				<input type="checkBox" name="checkBox[]" value="职业规范">职业规范<br>
				<input type="checkBox" name="checkBox[]" value="个人和团队">个人和团队<br>
				<input type="checkBox" name="checkBox[]" value="沟通">沟通<br>
				<input type="checkBox" name="checkBox[]" value="项目管理">项目管理<br>
				<input type="checkBox" name="checkBox[]" value="终身学习">终身学习<br>
			</p>
				
			<p><input type="submit" name="添加" class="btn"></p>
		</form>
		 -->
		</form> 
		<form action="temp_fb.php" method="post" class="bd">
			
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
			<p><input type="submit" name="添加" value="添加课程指标点" class="btn"></p>
		</form>
		</div>
		
	</body>
	</html> 	