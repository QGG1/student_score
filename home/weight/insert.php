<?php
	session_start();
	$cid=$_SESSION['teacher_cid'];
	$did=$_SESSION['teacher_did'];
	include '../../public/common/config.php';
	$text1=$_POST['tt'];	
	$text2=$_POST['course'];
	$text3=$_POST['point'];
	// for($i=0;$i<count($text1);$i++)
	// 	{
	// 		echo $i;
	// 	}
	// 	exit;
	$i=0;
	/*$point_id=$_POST['point_id'];*/
		for($j=0;$j<count($text2);$j++)
		{
				// $sqlcourse="select count(course_id) from course where course_id='{$text2[$j]}'";
				// echo $sqlcourse;
				//echo $text2[$j];
				//echo "<br>";
				$sqlpoint="select count(point_id) as count from course_point where course_id='{$text2[$j]}'";
				$rstpoint=mysqli_query($con,$sqlpoint);
				while($rowpoint=mysqli_fetch_assoc($rstpoint)){
					$count_point=$rowpoint['count'];
				}
				for($k=$j*$count_point,$x=0;$x<$count_point;$x++)
				{
					
					echo "<br>";
					// echo $text3[$k];
					
					// for($i=($k-1)*$count_point,$y=0;$y<$count_point;$y++)
					// 	{
							//echo $text2[$j];

							echo "<br>";
							//echo $text3[$k];
							$k++;
							//echo "<br>";
							//echo $text1[$k-1];
							$sql="insert into weight(course_id,point_id,weight,college_id,dept_id) values('{$text2[$j]}','{$text3[$k-1]}','{$text1[$k-1]}','{$cid}','{$did}')";
							//echo $sql;
							$rst=mysqli_query($con,$sql);
							$i++;
					//		echo "I:";
							
						// }
						
				}
		}
		

	

		
		echo "<script>alert('添加成功!')</script>";
		echo "<script>top.location='../index.php'</script>";
	/*if(mysqli_query($con,$sql)){
		echo '<script>location="index.php"</script>';
		
	}
	else{
		echo mysqli_error($con); 
	}*/
?>