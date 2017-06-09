<?php
	include '../../public/common/config.php';
	$text1=$_POST['checkBox'];	
	/*$point_id=$_POST['point_id'];*/
	$course_id=$_POST['course_id'];
	for($i=0;$i<count($text1);$i++)
		{
			$sql="insert into course_point values('{$course_id}','{$text1[$i]}')";
			$rst=mysqli_query($con,$sql);
		}
		echo "<script>alert('添加成功,返回查看页面')</script>";
		echo "<script>location='course_id3.php'</script>";
	/*if(mysqli_query($con,$sql)){
		echo '<script>location="index.php"</script>';
		
	}
	else{
		echo mysqli_error($con); 
	}*/
?>