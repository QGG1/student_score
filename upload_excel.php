<?php
	$con=mysqli_connect("localhost","root","qggqgg");
	mysqli_query($con,"set names 'utf8'");
	mysqli_query($con,"set character_set_client=utf8");
	mysqli_query($con,"set character_set_results=utf8");
	mysqli_select_db($con,"student_score");
	mysqli_select_db($con,"student_score");
	mysqli_query($con,"set names 'utf8'");include("function.php");
	$template_name=$_POST['template_name'];

if($template_name=='0'){
	echo "<script>alert('请选择模板名称')</script>";
	echo "<script>location='file.php'</script>";

}
else{
	echo "<form action='function.php' methood='post'>";
	echo "<input type='hidden' value='{$template_name}'>";
	echo "</form>";
	$leadExcel=$_POST['leadExcel'];
	
	if($leadExcel == "true")
	{
		/*echo "OK";
		die();*/
		//获取上传的文件名
		$filename =-$_FILES["inputExcel"]["name"];
		//上传到服务器上的临时文件名
		$tmp_name = $_FILES['inputExcel']['tmp_name'];
		$msg = uploadFile($filename,$tmp_name);
		echo $msg;
	}
}
	

?>