<?php
	session_start();
	include '../../public/common/config.php';	
	$course_id=$_POST['course_id'];
	$template_name=$_POST['template_name'];
	$sql3="select * from template where course_id='{$course_id}' and template_name='{$template_name}'";
	$rst3=mysqli_query($con,$sql3);
	if(mysqli_num_rows($rst3)<1)
	{
		echo "<script>alert('您未选择课程')</script>";
		echo "<script>location='view.php'</script>";		
	}

 
$con=mysqli_connect("localhost","root","qggqgg");
mysqli_select_db($con,"student_score");
mysqli_query($con,"set names 'utf8'");
	mysqli_query($con,"set names 'utf8'");
	mysqli_query($con,"set character_set_client=utf8");
	mysqli_query($con,"set character_set_results=utf8");
	mysqli_select_db($con,"student_score");

$file_type = "vnd.ms-excel"; 
$file_ending = "xls"; 
header("Content-Type: application/$file_type"); 
header("Content-Disposition: attachment; filename=mydowns.$file_ending"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 
/*$title = "数据库名:$DB_DBName,数据表:$DB_TBLName,备份日期:$now_date"; 
*/$sql = "Select point_id from template where course_id='{$course_id}' and template_name='{$template_name}'"; 
$sql2="select point_name,work from template,point where course_id='{$course_id}' and template_name='{$template_name}' and template.point_id=point.point_id";
$result = mysqli_query($con,$sql);
$result2= mysqli_query($con,$sql2);

$sep = "\n"; 	
$sep2 ="\n";
/*for ($i = 0; $i < mysqli_num_fields($result); $i++) { 
echo mysqli_field_name($result,$i) . "\t"; 
} 
print("\n"); 
$i = 0; */
while($row = mysqli_fetch_row($result)) 
{ 
$schema_insert1 = ""; 
$schema_insert = ""; 
for($j=0; $j<mysqli_num_fields($result);$j++) 
{ 
	$schema_insert1.="row[$j]".$sep2;
	while($row2=mysqli_fetch_row($result2)){
		for($i=0;$i<mysqli_num_fields($result2);$i++){
				if(!isset($row2[$i])) 
		$schema_insert .= "NULL".$sep; 
	elseif ($row2[$i] != "") 
		$schema_insert .= "$row2[$i]".$sep; 
	else 
		$schema_insert .= "".$sep;
		}
		/*$schema_insert1 = str_replace($sep."$", "", $schema_insert); 
		$schema_insert1 .= ""; 
		print(trim($schema_insert)); 
		print "\t"; */
} 


}
$schema_insert = str_replace($sep."$", "", $schema_insert); 
$schema_insert .= ""; 
print(trim($schema_insert)); 
print "\n"; 
} 
return (true); 
?>