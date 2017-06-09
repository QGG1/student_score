<?php
	include '../../public/common/config.php';
	$course_id=$_GET['course_id'];
	$point_id=$_GET['point_id'];
	$course_obj_id=$_GET['course_obj_id'];
	$sql="select * from work where course_id='{$course_id}' and point_id='{$point_id}' and course_obj_id='{$course_obj_id}'";
	$rst=mysqli_query($con,$sql);

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
				<th width="120">毕业要求指标点编号</th>
				<th>项目编号</th>
				<th>小分名称</th>
				
				<th>小分值</th>
				<!-- <th>修改</th>
				<th>删除</th> -->
			</tr>


			<?php
				if(mysqli_num_rows($rst)<1)
				{
					echo "<script>alert('无查询结果')</script>";
					echo "<script>location='cp2.php'</script>";
					
				}
				else{
					while($row=mysqli_fetch_assoc($rst)){
				
					echo "<tr>";
					echo "<td>{$row['course_id']}</td>";
					echo "<td>{$row['point_id']}</td>";
					echo "<td>{$row['work_id']}</td>";
					echo "<td>{$row['work_name']}</td>";
					echo "<td>{$row['work_value']}</td>";
					/*echo "<td><a href='edit.php?id={$row['id']}'>修改</a></td>";
					echo "<td><a href='delete.php?id={$row['id']}'>删除</a></td>";*/
					echo "</tr>";				
				}	
				}

				
			?>

			</table>
		</div>
</body>
</html>
		