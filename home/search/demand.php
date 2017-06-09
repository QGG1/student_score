
<?php
	session_start();
	include '../../public/common/config.php';
	$cid=$_SESSION['teacher_cid'];
	$did=$_SESSION['teacher_did'];
	$sqlClass="select * from class where college_id='{$cid}' and dept_id='{$did}'";

?>


<!doctype html>
<html lang="en">
<head>
	<meta chrset="UTF-8">
	<title>index</title>
	<style>
	.main{
		height:100%;
		width:100%;
		
	}
	*{
		font-family：微软雅黑;
		color:#2C60AD;
	}
	.bd{
		color:#fff;
		margin-left:450px;
		margin-top:50px;
	}
	.bd .name{
		color:red;		
	}
	.btn{
		width:120px;
		border:none;
		left:465px;
		position:absolute;
		height:30px;
		background-color:#2C60AD;;
		color:#fff;
		cursor:pointer;
		border-radius: 4px;
	}
</style>
<script language="JavaScript">
 
//二级菜单数组
var subcat = new Array();
<?php
$i=0;
$sql="select distinct template.template_name ,template.course_id from template,course where template.course_id=course.course_id";
$query=mysqli_query($con,$sql);
while($arr=mysqli_fetch_array($query))
{
 echo "subcat[".$i++."] = new Array('".$arr["course_id"]."','".$arr["template_name"]."','".$arr["template_name"]."');\n";
}
?>

function changeselect1(locationid)
{
 document.form1.template_name.length = 0;
 document.form1.template_name.options[0] = new Option('---请选择---','');
 for (i=0; i<subcat.length; i++)
 {
  if (subcat[i][0] == locationid)
  {
   document.form1.template_name.options[document.form1.template_name.length] = new Option(subcat[i][1], subcat[i][2]);
  }
 }
}

</script>
	</head>
	<body>
		<div class="main">

		<form action="point.php" method="post" class="bd" name="form1">
			<p>选择课程</p>
			<select name="course_id" onChange="changeselect1(this.value)">
			<option value==='0'>--请选择--</option>
			  <?php
			            $sqlCollege="select distinct course.course_name,course.course_id from template,course where template.course_id=course.course_id ";
			            $rstCollege=mysqli_query($con,$sqlCollege);
			            while($rowCollege=mysqli_fetch_assoc($rstCollege)){
			              echo "<option value='{$rowCollege['course_id']}'>{$rowCollege['course_name']}";
			        	}		      
			  ?>
			</select>
			<p>选择模板</p>
			<select name="template_name">
			 <option value='0'>--请选择--</option>
			</select>
			<p>选择班级：</p>
			<select name="class_id">
				<?php
					$sqlClass="select * from class where college_id='{$cid}' and dept_id='{$did}'";
					$rstClass=mysqli_query($con,$sqlClass);
					while($rowClass=mysqli_fetch_assoc($rstClass)){
						   echo "<option value='{$rowClass['class_id']}'>{$rowClass['class_id']}";
					}
				?>
			</select>
			<p><input type="submit" name="submit" class="btn" value="提交"></p>
			</form>
		</div>
	</body>
	</html>