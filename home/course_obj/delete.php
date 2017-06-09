<?php
	include '../../public/common/config.php';
	$course_id=$_GET['course_id'];
	$point_id=$_GET['point_id'];
	$sql="delete from course_point where course_id='{$course_id}' and point_id='{$point_id}'";
	$sql2="delete from course_obj where course_obj.course_id='{$course_id}' and point_id='{$point_id}'";
	$sql3="delete from work where course_id='{$course_id}' and point_id='{$point_id}'";

	$rst=mysqli_query($con,$sql);
	$rst2=mysqli_query($con,$sql2);
	$rst3=mysqli_query($con,$sql3);
	if($rst)
	{
		echo "<script>location='course_id3.php'</script>";
	}
?>