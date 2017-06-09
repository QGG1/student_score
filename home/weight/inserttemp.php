<script type="text/javascript">
	function check(){
		var va=document.getElementsByClassName("weight");
		for(var i=0;i<va.length;i++)
		{
			if(va[i].value==''||isNaN(va[i].value)||va[i].value>=1||va[i].value<=0)
			{	
				alert("您输入的权值不在0-1之间或者为空");
				return false;
			}
		}
		return true;
	} 
</script>
<?php
	session_start();
	$cid=$_SESSION['teacher_cid'];
	$did=$_SESSION['teacher_did'];
	include '../../public/common/config.php';
	$course_id=$_POST['course_id'];
	
	$sql="select * from course_point where course_id='{$course_id}'  order by point_id+0";
		$rst=mysqli_query($con,$sql);
		echo "<form action='insertok.php' method='post'>";
		echo "<input type='hidden' name='course_id' value='{$course_id}'>";
		while($row=mysqli_fetch_assoc($rst)){
			echo "<input type='hidden' name=point[] value='{$row['point_id']}'>";
			echo "<p class='point'><span class='pp'>{$row['point_id']}</span> 
				<input type='text' name='tt[]' class='weight' placeholder='输入权值'>
			</p>";
		}
		echo "<input type='submit' name='提交' onclick='return check();'>";
		echo "</form>";
	/*if(mysqli_query($con,$sql)){
		echo '<script>location="index.php"</script>';
		
	}
	else{
		echo mysqli_error($con); 
	}*/
?>