<?php
	include '../../public/common/config.php';
	$course_id=$_POST['course_id'];
	$dept_id=$_POST['did'];
	$college_id=$_POST['cid'];
	/*$sql="select course_point.*,point.* ,course.* from course_point,point ,course where course_point.point_id=point.point_id and course.course_id=course_point.course_id and course.cid='{$college_id}' and course.did='{$dept_id}' and course.course_id='{$course_id}'";*/
	$sql="select point.*,course_point.* ,course.* from course,course_point ,point where course_point.course_id='{$course_id}' and course_point.point_id=point.point_id and course.course_id=course_point.course_id";
	$rst=mysqli_query($con,$sql);
	if(mysqli_num_rows($rst)<1)
				{
					echo "<script>alert('无查询结果')</script>";
					echo "<script>location='course_id3.php'</script>";
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
				<th width="120">课程编号</th>
				<th>课程名称</th>
				<th>指标点编号</th>
				<th>指标点名称</th>
				<th>指标点内容</th>
				
				<th>删除</th> 
			</tr>


			<?php
				if(mysqli_num_rows($rst)<1)
				{
					echo "<script>alert('无查询结果，请确认课程是否存在')</script>";
					echo "<script>location='course_id3.php'</script>";
					exit;
				}
				else{
				while($row=mysqli_fetch_assoc($rst)){
					
					echo "<tr>";			
					echo "<td>{$row['course_id']}</td>";
					echo "<td>{$row['course_name']}</td>";
					echo "<td>{$row['point_id']}</td>";
					echo "<td>{$row['point_name']}</td>";
					echo "<td>{$row['point_content']}</td>";	
				?>

					<td><a href='delete.php?course_id=<?php echo $row['course_id']?>&point_id=<?php echo $row['point_id'] ?>' onclick="if(confirm('删除指标点会同时删除其对应的课程目标，您确定删除么?')==false)return false;">删除</a></td>
					<?php
					echo "</tr>";	
					}
				
				
				}
				
			?>

			</table>

		</div>
</body>
</html>
		