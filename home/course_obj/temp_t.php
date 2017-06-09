<?php
	include '../../public/common/config.php';	
		$course_id=$_POST['course_id'];
		$text1=$_POST['checkBox1'];	
		$college_id=$_POST['college_id'];
		$dept_id=$_POST['dept_id'];
		
	/*	echo $sqlCDC;
		exit;*/
		
	/*	$i=0;
	
		$sqla="select demand_pro_id from demand where demand_pro_name='$text1[$i]' ";
		echo $sqla;
		exit;
		*/
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

			<form action="insert.php" method="post">
				
					<?php
						for($i=0;$i<count($text1);$i++)
						{
							$sqla="select demand_pro_id from demand where demand_pro_name='$text1[$i]'";
							$rsta=mysqli_query($con,$sqla);
							$rowa=mysqli_fetch_assoc($rsta);
							$sql="select * from point where point.demand_pro_id='{$rowa['demand_pro_id']}'";
							
							$rst=mysqli_query($con,$sql);
							while($row=mysqli_fetch_assoc($rst)){
								echo "<input type='checkBox' name='checkBox[]' value='{$row['point_id']}'>{$row['point_name']}<br>";
							}
						}
						
						
									?>

					<input type="hidden"  value="<?php echo $course_id?>" name="course_id">				
					
			
				
						<!-- $sql="insert into course(demand_pro_name,course_id) values ('$text1[$i]','{$course_id}') where course_id='{$course_id}'";
						$rst=mysqli_query($con,$sql); -->				
					<input type="submit" value="选择">	
			</form>

		</div>
		
	</body>
	</html>















