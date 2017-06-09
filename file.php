<?php
	session_start();
	$cid=$_SESSION['teacher_cid'];
	$did=$_SESSION['teacher_did'];
	header("Content-Type: text/html;charset=utf-8");   
	$con=mysqli_connect("localhost","root","qggqgg");
	mysqli_select_db($con,"student_score");
	mysqli_query($con,"set names 'utf8'");
	mysqli_query($con,"set names 'utf8'");
	mysqli_query($con,"set character_set_client=utf8");
	mysqli_query($con,"set character_set_results=utf8");
	mysqli_select_db($con,"student_score");

?>
<!doctype>
<html>
	<head>
		  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		  <script>
		  function dd(){
		  	document.form2.submit();
		  }
		  </script>
		  <style>	
		  	.main{
		  		position: absolute;
		  		left:400px;
		  		top:100px;
		  	}
		  	form{
		  		width:500px;
		  		margin:0 0;
		  	}
		  	.btn{
				width:100px;
				border:none;
				border-radius:4px;
				margin-left:50px;
				height:25px;
				background-color:#2C60AD;;
				color:#fff;
				cursor:pointer;
				border-radius: 4px;
		  	}
		  	.notice{
		  		width:200px;
		  		height:200px;
		  		color:red;
		  		margin-top:20px;

		  	}
		  </style>
	</head>
	<body>
	<div class="main">
 	<form name="form2" method="post" enctype="multipart/form-data" action="upload_excel.php" enctype="multipart/form-data">
		<input type="hidden" name="leadExcel" value="true">
		<p>上传文件：
    	<input type="file" name="inputExcel"> </p>
    	<p>选择模板：
    	<select name="template_name">
			<?php
				$cid=$_SESSION['teacher_cid'];
				$did=$_SESSION['teacher_did'];
			
				$sql="select distinct template_name from template where course_id in (select course_id from course where cid='04' and did='01')";
				
				$rst=mysqli_query($con,$sql);
					echo "<option value='0'>---请选择---</option>";
				while($row=mysqli_fetch_assoc($rst)){
					echo "<option value='{$row['template_name']}'>{$row['template_name']}</option>";
				}
			?>
    	</select>
    	</p>
   		<!-- <input type="text" name="template_name"> -->
    	<input type="button" name="import" value="提交" class="btn" onclick="dd();">
	 </form> 
	  <div class="notice">
		<span>*注意：<p>1.请确保您的Excel表格中学生信息及成绩是从第<strong>7</strong>行开始的，并且A，B，C三列分别对应序号，学号，学生姓名</p>
					 <p>2.请确保您的Excel表格没有多余的空白格</p>
		</span>
	 </div>
	 </div>

</body>
</html>