<?php
	include '../../public/common/config.php';
	$demand_id=$_POST['demand_id'];
	$demand_name=$_POST['demand_name'];
	$cid=$_POST['cid'];
	$did=$_POST['did'];
	$demand_content=$_POST['demand_content'];
	$sql1="insert into demand values ('{$demand_id}','{$demand_name}','{$cid}','{$did}','{$demand_content}')";


	if(!($demand_id&&$demand_name&&$demand_content))
		{
			echo "<script>alert('每一项都必须填写')</script>";
			echo '<script>location="add.php"</script>';
		}
		else{
				/*echo $sql1;
				exit;*/
				$rst1=mysqli_query($con,$sql1);
				echo "<script>alert('添加成功！')</script>";
				echo "<script>location='demand.php?college_id=$cid&dept_id=$did'</script>";
				
				
				
		}
?>