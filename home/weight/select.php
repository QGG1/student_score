<?php
	session_start();
	$cid=$_SESSION['teacher_cid'];
	$did=$_SESSION['teacher_did'];
	$class_id=$_POST['class_id'];
	include '../../public/common/config.php';
	$point_sum=0;
	$sqlweight="select * from weight where college_id='{$cid}' and dept_id='{$did}' order by course_id,point_id+0";
	//echo $sqlweight;
	echo "<br>";
	$rstweight=mysqli_query($con,$sqlweight);
	while($rowweight=mysqli_fetch_assoc($rstweight)){
		$sqlpoint_sum="select * from point_sum where class_id='{$class_id}' and course_id='{$rowweight['course_id']}' and point_id='{$rowweight['point_id']}'";
		//echo $sqlpoint_sum;
		echo "<br>";
		$rstpoint_sum=mysqli_query($con,$sqlpoint_sum);
		while($rowpoint_sum=mysqli_fetch_assoc($rstpoint_sum)){
			//echo $rowpoint_sum['point_ach'];
			echo "<br>";
			//echo $rowweight['weight'];
			echo "<br>";
			$point_sum=$point_sum+$rowpoint_sum['point_ach']*$rowweight['weight'];
			

		}
	}


?>
<!doctype html>
<html lang="en">
<head>
	<meta chrset="UTF-8">
	<title>index</title>
<style>
	.main{
		position:absolute;
		left:100px;
		top:50px;
		padding:80px;
		
	}
	*{
		font-family：微软雅黑;
		color:#2C60AD;
	}
	</style>
	<link rel="stylesheet" href="../../public/style/public.css">
	</head>
	<body>
		<div class="main">
			<?php
				$sql1="select college_name  as name from college where college_id='{$cid}'";
				$rst1=mysqli_query($con,$sql1);
				while($row1=mysqli_fetch_assoc($rst1))
				{
					echo $row1['name'];
					echo "&nbsp;&nbsp;";
				
				}
				$sql2="select dept_name  as dname from  department where dept_id='{$did}' and college_id='{$cid}'";
				//echo $sql2;
				$rst2=mysqli_query($con,$sql2);
				while($row1=mysqli_fetch_assoc($rst2))
				{
					echo $row1['dname'];
					echo "系";
						echo "&nbsp;&nbsp;";

				}
				echo "总达成度：";
				$p_sum=number_format($point_sum,3);
				echo $p_sum;
			?>
		</div>
	</body>
	</html>