<?php
	session_start();
	$cid=$_SESSION['teacher_cid'];
	$did=$_SESSION['teacher_did'];
	include '../../public/common/config.php';
	$text1=$_POST['tt'];	
	$course_id=$_POST['course_id'];
	$text3=$_POST['point'];
	//echo $course_id;
	$sqlpoint="select count(point_id) as count from course_point where course_id='{$course_id}'";
	//echo $sqlpoint;
	$rstpoint=mysqli_query($con,$sqlpoint);
	while($rowpoint=mysqli_fetch_assoc($rstpoint)){
		$count_point=$rowpoint['count'];
		echo $count_point;
	}
	for($x=0;$x<$count_point;$x++)
	{
		
		$sql="insert into weight(course_id,point_id,weight,college_id,dept_id) values('{$course_id}','{$text3[$x]}','{$text1[$x]}','{$cid}','{$did}')";
	

		$rst=mysqli_query($con,$sql);

			
	}
	
		

	

		
		echo "<script>alert('添加成功!')</script>";
		echo "<script>location='chakan.php'</script>";
	/*if(mysqli_query($con,$sql)){
		echo '<script>location="index.php"</script>';
		
	}
	else{
		echo mysqli_error($con); 
	}*/
?>