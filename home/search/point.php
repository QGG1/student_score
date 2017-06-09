<?php
	include '../../public/common/config.php';
	$course_id=$_POST['course_id'];
	$template_name=$_POST['template_name'];
	$class_id=$_POST['class_id'];
	/*$sql="select course_point.*,point.* ,course.* from course_point,point ,course where course_point.point_id=point.point_id and course.course_id=course_point.course_id and course.cid='{$college_id}' and course.did='{$dept_id}' and course.course_id='{$course_id}'";*/
	$sql="select point.*,course_point.* ,course.* from course,course_point ,point where course_point.course_id='{$course_id}' and course_point.point_id=point.point_id and course.course_id=course_point.course_id";
	$rst=mysqli_query($con,$sql);
	$sqlC="select class_id as class_id from template where class_id='{$class_id}'";
	// echo $sqlC;
	// exit;
	$rstC=mysqli_query($con,$sqlC);
	if($template_name=='0'){
	echo "<script>alert('请选择模板名称')</script>";
	echo "<script>location='demand.php'</script>";
	}
	else if(mysqli_num_rows($rstC)<1)

	{
		echo "<script>alert('无查询结果')</script>";
		echo "<script>location='demand.php'</script>";
		exit;
	}
	else if(mysqli_num_rows(mysqli_query($con,"select score from achivement where template_name='{$template_name}'"))<1)
				{
					echo "<script>alert('无查询结果')</script>";
					echo "<script>location='demand.php'</script>";
					exit;
				}
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>idnex</title>
		<link rel="stylesheet" href="../../public/style/public.css">
		<style>	
			.main{
				width:100%;

			}
			table{
				margin-top: 10px;
			}
		</style>
	</head>
	<body>
		<div class="main">
			<!--指标点达成度查询-->
			<table>
				<thead>
					<tr>
						<td style='font-size:18px;background-color: #2C60AD'>课程指标点达成度</td>
					</tr>
				</thead>
				<tr>
					<th width="120">课程编号</th>
					<th>课程名称</th>
					<th>指标点编号</th>
					<th>指标点名称</th>
					<th>指标点达成度</th> 
				</tr>
				<?php

					if(mysqli_num_rows($rst)<1)
					{
						echo "<script>alert('无查询结果')</script>";
						echo "<script>location='course_id3.php'</script>";
						exit;
					}
					else{
					while($row=mysqli_fetch_assoc($rst)){
						//查找该指标点的分数之和
						$sqlsum="select sum(score) as sum from achivement where work_id in (select work_id from template where template.point_id='{$row['point_id']}' and template_name='{$template_name}' )";
						//echo $sqlsum;
						$rstsum=mysqli_query($con,$sqlsum);
						$rowsum=mysqli_fetch_assoc($rstsum);
						$point_sum= $rowsum['sum'];
						//echo $point_sum;
						//查找学生数
						$sqlseq="select count(distinct seq) as seq from achivement where template_name='{$template_name}'";
						$rstseq=mysqli_query($con,$sqlseq);
						$rowseq=mysqli_fetch_assoc($rstseq);
						$point_seq=$rowseq['seq'];
						//echo $point_seq;
						//查找该指标点的分值
						$sqlvalue="select sum(work_value) as value from template where point_id='{$row['point_id']}' and template_name='{$template_name}' ";
						$rstvalue=mysqli_query($con,$sqlvalue);
						$rowvalue=mysqli_fetch_assoc($rstvalue);
						$point_value=$rowvalue['value'];
						//echo $point_value;
						echo "<br>";
						$point_ach=number_format($point_sum/$point_seq/$point_value,3);
						$sqlCheck="select * from point_sum where course_id='{$course_id}' and point_id='{$row['point_id']}' and template_name='{$template_name}' and class_id='{$class_id}' ";
						$rstCheck=mysqli_query($con,$sqlCheck);
						// while($rowCheck=mysqli_affected_rows($rstCheck))
						// {
						// 	echo $sqlCheck;
						// }
						
						$sqlp_sum="insert into point_sum(course_id,point_id,template_name,class_id,point_ach) values('{$course_id}','{$row['point_id']}','{$template_name}','{$class_id}','{$point_ach}')";
						$rstp_sum=mysqli_query($con,$sqlp_sum);
						//echo $sqlp_sum;
						echo "<tr>";			
						echo "<td>{$row['course_id']}</td>";
						echo "<td>{$row['course_name']}</td>";
						echo "<td>{$row['point_id']}</td>";
						echo "<td>{$row['point_name']}</td>";
						echo "<td>$point_ach</td>";	
						echo "</tr>";	
						}	
					}
					
				?>
			</table>
			<!--课程目标达成度查询-->
			<table>
				<thead>
					<tr>
						<td style='font-size:18px;background-color: #2C60AD'>课程目标达成度</td>
					</tr>
				</thead>
				<tr>
				<th width="120">课程编号</th>
				<th>课程名称</th>
				<th>课程目标编号</th>
				<th>课程目标名称</th>
				<th>课程目标达成度</th> 
				</tr>
				<?php
				$sql="select course_obj.* ,course.* from course_obj ,course where course_obj.course_id='{$course_id}' and course.course_id='{$course_id}'";
					$rst=mysqli_query($con,$sql);
					while($row=mysqli_fetch_assoc($rst)){
						//查找该指标点的分数之和
						$sqlsum2="select sum(score) as sum2 from achivement where work_id in (select work_id from template where template.course_obj='{$row['course_obj_name']}' and template_name='{$template_name}')";
						//echo $sqlsum2;
						$rstsum2=mysqli_query($con,$sqlsum2);
						$rowsum2=mysqli_fetch_assoc($rstsum2);
						$obj_sum=$rowsum2['sum2'];
	
						//查找学生数
						$sqlseq="select count(distinct seq) as seq from achivement where template_name='{$template_name}'";
						$rstseq=mysqli_query($con,$sqlseq);
						$rowseq=mysqli_fetch_assoc($rstseq);
						$point_seq=$rowseq['seq'];
					
						//查找该课程目标的分值
						$sqlvalue="select course_obj_value from course_obj where course_obj_name='{$row['course_obj_name']}'";
						$rstvalue=mysqli_query($con,$sqlvalue);
						$rowvalue=mysqli_fetch_assoc($rstvalue);
						$obj_value=$rowvalue['course_obj_value'];
						//echo $point_value;
						echo "<br>";
						$obj_ach=number_format($obj_sum/$point_seq/$obj_value,3);
						
						echo "<tr>";			
						echo "<td>{$row['course_id']}</td>";
						echo "<td>{$row['course_name']}</td>";
						echo "<td>{$row['course_obj_id']}</td>";
						echo "<td>{$row['course_obj_name']}</td>";
						echo "<td>$obj_ach</td>";	
						echo "</tr>";	
						}	
				?>
			</table>

				<table>
				<thead>
					<tr>
						<td style='font-size:18px;background-color: #2C60AD'>课程达成度</td>
					</tr>
				</thead>
					<tr>
						<th width="120">课程编号</th>
						<th>课程名称</th>
						<th>课程达成度</th> 
					</tr>
					<?php
					$sql="select * from course where course_id='{$course_id}'";
						$rst=mysqli_query($con,$sql);
						while($row=mysqli_fetch_assoc($rst)){
							//查找所有分数之和
							$sqlsum3="select sum(score) as sum3 from achivement where template_name in (select distinct template_name from template where course_id='{$course_id}' and template_name='{$template_name}')";
			                                                                                                                                                                      
							$rstsum3=mysqli_query($con,$sqlsum3);
							$rowsum3=mysqli_fetch_assoc($rstsum3);
							$course_sum=$rowsum3['sum3'];
							//查找学生数
							
							$sqlseq="select count(distinct seq) as seq from achivement where template_name='{$template_name}'";
							$rstseq=mysqli_query($con,$sqlseq);
							$rowseq=mysqli_fetch_assoc($rstseq);
							$point_seq=$rowseq['seq'];
							$course_ach=number_format($course_sum/$point_seq/100,3);
							echo "<tr>";			
							echo "<td>{$row['course_id']}</td>";
							echo "<td>{$row['course_name']}</td>";
							echo "<td>$course_ach</td>";	
							echo "</tr>";	
							}	
					?>
			</table>
		</div>
		<br><br><br>
	</body>
</html>