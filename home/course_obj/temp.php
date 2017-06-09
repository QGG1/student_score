<?php
		include '../../public/common/config.php';	
		$course_id=$_POST['course_id'];
		//$text1=$_POST['checkBox'];	
		$college_id=$_POST['cid'];
		$dept_id=$_POST['did'];
		$sqlCDC="select * from course where course_id='{$course_id}' and cid='{$college_id}' and did='{$dept_id}'";
	/*	echo $sqlCDC;
		exit;*/
		$rstCDC=mysqli_query($con,$sqlCDC);
		if(mysqli_num_rows($rstCDC)<1)
				{
					echo "<script>alert('您输入的课程编号有误，请重新填写')</script>";				
					echo "<script>location='add2.php'</script>";
				}
		/*$i=0;
		$sqla="select demand_pro_id from demand where demand_pro_name='$text1[$i]'";
		echo $sqla;
		exit;*/
		echo '选择毕业项目要求：<br>';
	/*	$sqlDemand="select * from demand where college_id='{$college_id}' and dept_id='{$dept_id}'";
		$rstDemand=mysqli_query($con,$sqlDemand);

		while($rowDemand=mysqli_fetch_assoc($rstDemand))
		{
			echo "<input type='checkBox' name='checkBox1[]' value='{$rowDemand['demand_pro_id']}'>{$rowDemand['demand_pro_name']}<br>";
		}*/

?>
<!doctype html>
<html lang="en">
<head>
	<meta chrset="UTF-8">
	<title>index</title>

	</head>
	<body>
		<div class="main">

			<form action="temp_t.php" method="post">
				
					<?php
						/*for($i=0;$i<count($text1);$i++)
						{
							$sqla="select demand_pro_id from demand where demand_pro_name='$text1[$i]'";
							$rsta=mysqli_query($con,$sqla);
							$rowa=mysqli_fetch_assoc($rsta);
							$sql="select * from point where point.demand_pro_id='{$rowa['demand_pro_id']}'";
							
							$rst=mysqli_query($con,$sql);
							while($row=mysqli_fetch_assoc($rst)){
								echo "<input type='checkBox' name='checkBox[]' value='{$row['point_id']}'>{$row['point_name']}<br>";
							}
						}*/
						$sqlDemand="select * from demand where college_id='{$college_id}' and dept_id='{$dept_id}'";
						$rstDemand=mysqli_query($con,$sqlDemand);

						while($rowDemand=mysqli_fetch_assoc($rstDemand))
						{
							echo "<input type='checkBox' name='checkBox1[]' value='{$rowDemand['demand_pro_name']}'>{$rowDemand['demand_pro_name']}<br>";
						}
					?>

					<input type="hidden"  value="<?php echo $course_id?>" name="course_id">				
					<input type="hidden"  value="<?php echo $dept_id?>" name="dept_id">		
					<input type="hidden"  value="<?php echo $college_id?>" name="college_id">		
			
				
						<!-- $sql="insert into course(demand_pro_name,course_id) values ('$text1[$i]','{$course_id}') where course_id='{$course_id}'";
						$rst=mysqli_query($con,$sql); -->				
					<input type="submit" value="选择">	
			</form>

		</div>
		
	</body>
	</html>















