<?php
session_start();
	include '../../public/common/config.php';
	$college_id=$_GET['college_id'];
	$dept_id=$_GET['dept_id'];
	$sql="select demand.* from demand where demand.college_id='{$college_id}' and demand.dept_id='{$dept_id}' order by demand_pro_id+0";

	$rst=mysqli_query($con,$sql);
	if(mysqli_num_rows($rst)<1)
				{
					echo "<script>alert('无查询结果')</script>";
						
					echo "<script>location='index.php'</script>";
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

		</div>
		<div class="main">
			<table>
			<tr>
				<th width="120">毕业要求编号</th>
				<th>毕业要求名称</th>
				<th>毕业要求内容</th>
				<th>修改</th>
			</tr>


			<?php
				while($row=mysqli_fetch_assoc($rst)){
					echo "<tr>";
					echo "<td>{$row['demand_pro_id']}</td>";
					echo "<td>{$row['demand_pro_name']}</td>";				
					echo "<td>{$row['demand_content']}</td>";
					 echo "<td><a href='delete.php?demand_pro_id={$row['demand_pro_id']}&college_id={$college_id}&dept_id={$dept_id}'>修改</a></td>";
					echo "</tr>";
				}
			?>

			</table>
		</div>
</body>
</html>
