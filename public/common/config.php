<?php
	header("Content-Type: text/html;charset=utf-8");   
	$con=mysqli_connect('localhost','root','qggqgg');
	/*if(!$con){
		echo '连接失败<br>';
		echo mysqli_error();

	}*/
	
	mysqli_query($con,"set names 'utf8'");
	mysqli_query($con,"set character_set_client=utf8");
	mysqli_query($con,"set character_set_results=utf8");
	mysqli_select_db($con,"student_score");
	
/*mysqli_query("SET CHARACTER SET UTF8"); 
 mysqli_query("SET CHARACTER_SET_RESULTS=UTF8'");*/
	
?>