<?php
	include '../../public/common/config.php';
	$template_name=$_POST['template_name'];
	$course_id=$_POST['course_id'];
	$course_name=$_POST['course_name'];
	$point_id=$_POST['point_id'];
	$work_name=$_POST['work_name'];
	$course_obj_id=$_POST['course_obj_id'];
	$work_value=$_POST['work_value'];
	$work_id=$_POST['work_id'];
	$class_id=$_POST['class_id'];

	/*$point_id=$_POST['point_id'];*/
	//$course_id=$_POST['course_id'];
	for($i=0;$i<count($template_name);$i++)
		{
			$sql="insert into template(template_name,course_id,point_id,work,course_obj,work_value,work_id,class_id) values('{$template_name[$i]}','{$course_id[$i]}','{$point_id[$i]}','{$work_name[$i]}','{$course_obj_id[$i]}','{$work_value[$i]}','{$work_id[$i]}','{$class_id[$i]}')";
			$rst=mysqli_query($con,$sql);
		}
		

			echo "<script>alert('生成成功')</script>";
			echo "<script>location='add.php'</script>";
?>