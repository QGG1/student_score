<?php
	include '../../public/common/config.php';
	$course_id=$_POST['course_id'];
	$college_id=$_POST['cid'];
	$dept_id=$_POST['did'];
	$sql="select course_point.* ,point.point_name from course,course_point ,point where course_point.point_id=point.point_id and course_point.course_id='{$course_id}' and course.cid='{$college_id}' and course.did='{$dept_id}' and course.course_id=course_point.course_id";

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
		<style>
		body{
			background-color: #D4E3E5;
		}
			.main{
				position:relative;
				
				width:1000px;
				

			}
		</style>
	</head> 
	<body>

		<div class="main">
			<table>
			<tr>
				<th>课程编号</th>
				<th width="120">毕业要求指标点编号</th>
				<th>毕业要求指标点名称</th>
				<th>查看该指标点的课程目标</th>
				<th>添加该指标点的课程目标</th>
			<!-- 	<th>删除</th>  -->
			</tr>


			<?php
				if(mysqli_num_rows($rst)<1)
				{
					echo "<script>alert('无查询结果')</script>";

					echo "<script>location='cp2.php'</script>";
					exit;
				}
				else{
					while($row=mysqli_fetch_assoc($rst)){
					$pid=$row['point_id'];
				
					echo "<tr>";
					echo "<td>{$row['course_id']}</td>";
					echo "<td>{$row['point_id']}</td>";
					echo "<td>{$row['point_name']}</td>";
					echo "<td><a href='course_obj.php?point_id={$pid}'>查看</a></td>";
					echo "<td><a href='course_obj_add.php?point_id={$pid}&college_id={$college_id}&dept_id={$dept_id}&course_id={$course_id}'>添加</a></td>";					
					// echo "<td><a href='delete.php?point_id={$row['point_id']}&course_id={$row['course_id']}'>删除</a></td>";
					echo "</tr>";		
						
					
				}	
				}				
			?>

			</table>
		</div>
</body>
</html>
		