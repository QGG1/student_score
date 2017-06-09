<?php
	include '../../public/common/config.php';
	$college_id=$_GET['college_id'];
	$dept_id=$_GET['dept_id'];
	$demand_pro_id=$_GET['demand_pro_id'];
	// echo $demand_pro_id;
	// $sql="delete from demand where demand_pro_id='{$demand_pro_id}' and college_id='{$college_id}' and dept_id='{$dept_id}'";
	// $sql2="delete from point where demand_pro_id='{$demand_pro_id}'";
	// $sql3="delete from work where course_id='{$course_id}' and point_id='{$point_id}' and course_obj_name='{$cours_obj_name}'";
	// $rst2=mysqli_query($con,$sql2);
	// $rst3=mysqli_query($con,$sql3);
	// if($rst2)
	// {
	// 	echo "<script>alert('删除成功')</script>";
	// 	echo "<script>location='cp2.php'</script>";
	// }
	
?>
<link rel="stylesheet" href="../../public/style/public.css">
<style>
	.main{
	/*	height:90%;
		width:100%;*/
		position:relative;
		margin-left:400px;
		margin-top:80px;
	}
	*{
		font-family：微软雅黑;
		color:#2C60AD;
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
<div class="main" class="bd">
	<form action="updat.php" method="post">
	<p>毕业要求名称:</p>
	<p>
		<input type="text" name="name">
	</p>
	<p>毕业要求内容</p>
	<p>
		<input type="text" class="con" name="content">
	</p>
	<p>
		<input type="submit" name="提交" class="btn">
	</p>
	<input type="hidden" name="demand_pro_id" value='<?php echo $demand_pro_id?>'>
	<input type="hidden" name="college_id" value="{$college_id}">
	<input type="hidden" name="dept_id" value="{$dept_id}">
	</form>
</div>