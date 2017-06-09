
<?php
	session_start();
	$cid=$_SESSION['teacher_cid'];
	$did=$_SESSION['teacher_did'];

	include '../../public/common/config.php';
	$sqlweight="select * from weight where college_id='{$cid}' and dept_id='{$did}'";
	//echo $sqlweight;
	//exit;
	$rstweight=mysqli_query($con,$sqlweight);
	if(mysqli_num_rows($rstweight)<1)
				{
					echo "<script>alert('无查询结果')</script>";
					echo "<script>top.location='../index.php'</script>";
					exit;
				}
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>idnex</title>
		<link rel="stylesheet" href="../../public/style/public.css">

<style>
	*{
		margin:0;
		padding: 0;
	}
	ul{
		margin:0;
		padding: 0;
		list-style: none;
	}
	li{
		font-size: 18px;
		float: left;
		width:220px;
		height:180px;
	}
	p{
		display: block;
		position: relative;
	}
	.point{
		width:150px;
		display: block;
		position:relative;
	}
	.pp{
		width:80px;
		

	}
	.weight{
		width:80px;
		position:absolute;
		right:2px;
	}
	.submit{
		position:relative;
		display: block;
		left:400px;
		width:100px;
	}
	.form{
		height:80%;
	}
	.edit{
		position: absolute;
		right:50px;
		margin-top:50px;
	}
	.edit a{
		display:inline-block;
		border:1px solid  #666;
		background-color: #eee;
		color:red;
	}
	.edit a:hover{
		background-color:#f00;
		color:#fff;
	}
</style>
	</head>
	<body>

		<div class="main">
			<table>
			<tr>
				<th width="120">课程编号</th>
				<th>指标点编号</th>
				<th>学院编号</th>
				<th>系编号</th>
				<th>权值</th>
				<th>修改</th> 
			</tr>


			<?php
				while($row=mysqli_fetch_assoc($rstweight)){	
					echo "<tr>";			
					echo "<td>{$row['course_id']} &nbsp<a href ='delete.php?course_id={$row['course_id']}'>【删除课程】</a></td>";
					echo "<td>{$row['point_id']}</td>";
					echo "<td>{$row['college_id']}</td>";
					echo "<td>{$row['dept_id']}</td>";	
					echo "<td>{$row['weight']}</td>";	
				?>
					<td><a href='update.php?course_id=<?php echo $row['course_id']?>&point_id=<?php echo $row['point_id']?>&college_id=<?php echo $row['college_id']?>&dept_id=<?php echo $row['dept_id']?>'>【修改权值】</a>
					</td>
				<?php
					echo "</tr>";
				}
				?>
			</table>
			<div class="edit">
				<a href='insertone.php'>添加课程</a>
				<a href='com.php'>删除全部课程</a>
			</div>
		</div>
</body>
</html>
