<?php
	session_start();
	include '../../public/common/config.php';
	$cid=$_SESSION['teacher_cid'];
	$did=$_SESSION['teacher_did'];
	  $sqlCollege="select * from course where cid='{$cid}' and did='{$did}' and course_id not in(select distinct course_id from weight where dept_id='{$did}' and college_id='{$cid}')";
	//	echo $sqlCollege;
	
	 $rstCollege=mysqli_query($con,$sqlCollege);
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

	</head>
	<body>
		<div class="main">

		<form action="inserttemp.php" method="post" class="bd" name="form1">
			<p>选择课程</p>
			<select name="course_id" onChange="changeselect1(this.value)">
			<option value==='0'>--请选择--</option>
			  <?php
	            while($rowCollege=mysqli_fetch_assoc($rstCollege)){
	              echo "<option value='{$rowCollege['course_id']}'>{$rowCollege['course_name']}";
	        	}		      
			  ?>
			</select>
			<p><input type="submit" name="submit" class="btn" value="提交" ></p>
			</form>
		</div>
	</body>
	</html>