
<style>
	*{
		margin:0;
		padding: 0;
	}
	ul{
		margin:0;
		padding: 0;
		list-style: none;
	}
	li{
		font-size: 18px;
		float: left;
		width:220px;
		height:180px;
	}
	p{
		display: block;
		position: relative;
	}
	.point{
		width:150px;
		display: block;
		position:relative;
	}
	.pp{
		width:80px;
		

	}
	.weight{
		width:80px;
		position:absolute;
		right:2px;
	}
	.submit{
		position:relative;
		display: block;
		left:400px;
		width:100px;
	}
	.form{
		height:80%;
	}
</style>
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
			// else if(va[i].value==null||isNaN(va[i].value)){
			// 	alert("您输入的权值为空，请重新检查");
			// 	return false;
			// }
			
		}
		return true;
	} 
</script>
<?php
	session_start();
	$cid=$_SESSION['teacher_cid'];
	$did=$_SESSION['teacher_did'];
	$course_count=$_POST['course_count'];
	// echo $course_count;
	// exit;
	
	if(!isset($_POST['checkBox']))
	{
		echo "<script>alert('您选得课程数不够，请重新选择')</script>";
		echo "<script>location='addcourse.php'</script>";
	}
	else {
		$text2=$_POST['checkBox'];
		if($course_count!=count($text2)){
			echo "<script>alert('您选得课程数不够，请重新选择')</script>";
		echo "<script>location='addcourse.php'</script>";
		}	

	}
	
	include '../../public/common/config.php';
	$text1=$_POST['checkBox'];	
	/*$point_id=$_POST['point_id'];*/

	echo "<form action='insert.php' method='post'>";
		echo "<div class='form'>";	
	echo "<ul class='Box'>";
	
	for($i=0;$i<count($text1);$i++)
		{
			echo "<li>";
			$sqlCourse="select * from course where course_id='{$text1[$i]}' order by course_id";
			$rstCourse=mysqli_query($con,$sqlCourse);
			while($rowCourse=mysqli_fetch_assoc($rstCourse))
			{
				echo $rowCourse['course_name'];
				echo "<input type='hidden' name='course[]' value='{$text1[$i]}'>";
			}
			echo "<br>";
			$sql="select * from course_point where course_id='{$text1[$i]}' order by point_id+0";
			$rst=mysqli_query($con,$sql);
			while($row=mysqli_fetch_assoc($rst)){
				echo "<input type='hidden' name=point[] value='{$row['point_id']}'>";
				echo "<p class='point'><span class='pp'>{$row['point_id']}</span> 
					<input type='text' name='tt[]' class='weight' placeholder='输入权值'>
				</p>";
			}
			echo "</li>";
		}
		echo "</ul>";
		
		
		echo "</div>";
	
		echo "<p class='submit'><input type='submit' onclick='return check();' value='提交'></p>";
	echo "</form>";
	
	/*if(mysqli_query($con,$sql)){
		echo '<script>location="index.php"</script>';
		
	}
	else{
		echo mysqli_error($con); 
	}*/
?>