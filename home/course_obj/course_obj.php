<?php
	include '../../public/common/config.php';
/*	$course_id=$_GET['course_id'];
	$college_id=$_GET['college_id'];
	$dept_id=$_GET['dept_id'];*/
	$point_id=$_GET['point_id'];
	/*$sql="select course_obj.* ,point.point_name course_point.* from course_point,course_obj ,point where course_obj.college_id='{$college_id}' and course_obj.dept_id='{$dept_id}' and course_obj.course_id='{$course_id}' and point.point_id=course_obj.point_id";*/
	$sql="select course_obj.* from course_obj where point_id='{$point_id}'";

	
	$rst=mysqli_query($con,$sql);
	if(mysqli_num_rows($rst)<1)
				{
					echo "<script>alert('无查询结果')</script>";
						
					echo "<script>location='cp2.php'</script>";
					exit;	
				
				}
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>idnex</title>
		<link rel="stylesheet" href="../../public/style/public.css">
	</head>
	<body>

		<div class="main">
			<table>
			<tr>
				<th>课程编号</th>
				<th>课程目标编号</th>
				<th>课程目标名称</th>
				<th width="120">毕业要求指标点编号</th>
				<th>课程目标值</th>
				
				<th>删除</th> 
			</tr>


			<?php
				if(mysqli_num_rows($rst)<1)
				{
					echo "<script>alert('无查询结果')</script>";
					echo "<script>location='.php'</script>";
					exit;
				}
				else{
					while($row=mysqli_fetch_assoc($rst)){
				
					echo "<tr>";
					echo "<td>{$row['course_id']}</td>";
					echo "<td>{$row['course_obj_id']}</td>";
					echo "<td>{$row['course_obj_name']}<a href='work_view.php?course_id={$row['course_id']}&point_id={$row['point_id']}&course_obj_id={$row['course_obj_id']}'>【点击查看小分】</a><a href='work_add.php?course_id={$row['course_id']}&point_id={$row['point_id']}&course_obj_id={$row['course_obj_id']}'>【点击添加小分】</a></td>";
					echo "<td>{$row['point_id']}</td>";
					echo "<td>{$row['course_obj_value']}</td>";
					echo "<td><a href='de.php?point_id={$row['point_id']}&course_id={$row['course_id']}&course_obj_name={$row['course_obj_name']}'>删除</a></td>";
					echo "</tr>";		
						
					
				}	
				}

				
			?>

			</table>
		</div>
</body>
</html>
		