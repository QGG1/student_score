<?php
	include '../../public/common/config.php';
	$course_id=$_GET['course_id'];
	$point_id=$_GET['point_id'];
	$course_obj_id=$_GET['course_obj_id'];
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>idnex</title>
		<link rel="stylesheet" href="../../public/style/public.css">
		<style>
			.main{
				width:100%;
				margin:0 auto ;
			}
			form{
				width:300px;
				height:300px;
				position: relative;
				margin:0 auto;
			}
		</style>
	</head>
	<body>

		<div class="main">
			<form action="work_insert.php" method="post" enctype="multipart/form-data" class="bd">
		
			<p>小分编号：</p>
			<p><input type="text" name="work_id"></p>
			<p>小分名称：</p>
			<p>
				<p><input type="text" name="work_name"></p>
			</p>
			<p>小分值：</p>
			<p>
				<p><input type="text" name="work_value"></p>
			</p>
			
			<input type="hidden" name="course_id" value="<?php echo $course_id?>">
			<input type="hidden" name="point_id" value="<?php echo $point_id?>">
			<input type="hidden" name="course_obj_id" value="<?php echo $course_obj_id?>">
			
		
			<p><input type="submit" value="添加小分" class="btn"></p>
		</form>
				

			</table>
		</div>
</body>
</html>
		