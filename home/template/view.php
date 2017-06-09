
<?php
	session_start();
	include '../../public/common/config.php';
	$cid=$_SESSION['teacher_cid'];
	$did=$_SESSION['teacher_did'];
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
	.notice{
		position: absolute;
		margin-top:50px;
		color:red;
		width:200px;
		height:200px;
		left:460px;
	}
	.notice span,.notice span p{
		color:red;
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
		<form action="select.php" method="post" class="bd" name="form1">
			<select name="course_id" onChange="changeselect1(this.value)">
			<option>--请选择--</option>
			  <?php
			            $sqlCollege="select distinct course.course_name,course.course_id from template,course where template.course_id=course.course_id ";
			            $rstCollege=mysqli_query($con,$sqlCollege);
			            while($rowCollege=mysqli_fetch_assoc($rstCollege)){
			              echo "<option value='{$rowCollege['course_id']}'>{$rowCollege['course_name']}";
			        	}		      
			  ?>
			</select>
			<select name="template_name">
			 <option>--请选择--</option>
			</select>
			<p><input type="submit" name="添加" class="btn"></p>
			</form>
			<div class="notice">
				<span>
					*注意：<p>请务必按照下载的模板里面指标点的排列顺序填写数据</p>

				</span>
			</div>
		</div>
		
	</body>
	</html>