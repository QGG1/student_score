<?php
	session_start();
	include '../../public/common/config.php';
	$cid=$_SESSION['teacher_cid'];
	$did=$_SESSION['teacher_did'];
	$course_id=$_POST['course_id'];
	$template_name=$_POST['template_name'];
	$class_id=$_POST['class_id'];
	$sqlcourse="select course_name from course where course_id='{$course_id}'";
	$rstcourse=mysqli_query($con,$sqlcourse);
	$rowcourse=mysqli_fetch_assoc($rstcourse);
	$sql="select * from work where course_id='{$course_id}' order by work_id+0";
	$rst=mysqli_query($con,$sql);
	if(mysqli_num_rows($rst)<1)
				{
					echo "<script>alert('还未对该课程添加指标点或者课程目标等信息，请添加完整后继续生成模板')</script>";
					echo "<script>location='add.php'</script>";
					
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
			<form action='insert.php' method='post'>
			<table>
			<tr>
				<th width="120">模板名称</th>
				<th>课程编号</th>
				<th>课程名称</th>
				<th>指标点编号</th>
				<th>课程目标编号</th>
				<th>项目编号</th> 
				<th>小分名称</th>	
				<th>小分值</th>
				
			</tr>
		
			<?php

				while($row=mysqli_fetch_assoc($rst)){
					echo "<tr>";		
					echo "<td>$template_name</td>";
					echo "<td>{$row['course_id']}</td>";

					echo "<td>{$rowcourse['course_name']}";
					echo "<td>{$row['point_id']}</td>";
					echo "<td>{$row['course_obj_id']}</td>";	
					echo "<td>{$row['work_id']}</td>";	
					echo "<td>{$row['work_name']}</td>";
					echo "<td>{$row['work_value']}</td>";	
					echo "</tr>";
					
					echo "<input type='hidden' name='template_name[]' value='{$template_name}'>
					<input type='hidden' name='course_id[]' value='{$row['course_id']}'>
					<input type='hidden' name='course_name[]' value='{$rowcourse['course_name']}'>
					<input type='hidden' name='point_id[]' value='{$row['point_id']}'>
					<input type='hidden' name='work_name[]' value='{$row['work_name']}'>
					<input type='hidden' name='course_obj_id[]' value='{$row['course_obj_id']}'>
					<input type='hidden' name='work_value[]' value='{$row['work_value']}'>
					<input type='hidden' name='class_id' value='{$class_id}'>
					<input type='hidden' name='work_id[]' value='{$row['work_id']}'>";

					
					}
				
			?>
			</table>		
	<input type='submit' value='提交'>
				</form>
					
			
		</div>
</body>
</html>