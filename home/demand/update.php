<?php
	include '../../public/common/config.php';
	
	$id=$_POST['demand_pro_id'];
	
	
	$demand_name=$_POST['demand_name'];
	$point_id=$_POST['point_id'];
	$point_name=$_POST['point_name'];
	$point_content=$_POST['point_content'];
	$cid=$_POST['cid'];
	$did=$_POST['did'];
	$sql="update point ,demand set demand_pro_name='{$demand_name}', point_id='{$demand_id}',point_name='{$point_name}',point_content='{$point_content}',cid='{$cid}',did='{$did}' where demand_pro_id='{$id}'";

	echo $sql;
	exit;
	if(mysqli_query($con,$sql)){
		echo '<script>location="index.php"</script>';
	}
	else {
		echo mysqli_error($con);
	}
?>