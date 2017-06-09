<?php
//导入Excel文件
function uploadFile($file,$filetempname)
{header("Content-Type: text/html;charset=utf-8");   
	$con=mysqli_connect("localhost","root","qggqgg");
	mysqli_query($con,"set names 'utf8'");
	mysqli_query($con,"set character_set_client=utf8");
	mysqli_query($con,"set character_set_results=utf8");
	mysqli_select_db($con,"student_score");
	mysqli_select_db($con,"student_score");
	mysqli_query($con,"set names 'utf8'");

	//自己设置的上传文件存放路径
	$filePath = 'upFile/';
	$str = "";
	//下面的路径按照你PHPExcel的路径来修改
	set_include_path('.'. PATH_SEPARATOR .'D:\Xampp\htdocs\student_score\PHPExcel' . PATH_SEPARATOR .get_include_path()); 

	require_once 'PHPExcel.php';
	require_once 'PHPExcel\IOFactory.php';
	//require_once 'PHPExcel\Reader\Excel5.php';//excel 2003
	require_once 'PHPExcel\Reader\Excel2007.php';//excel 2007

	$filename=explode(".",$file);//把上传的文件名以“.”好为准做一个数组。 
	$time=date("y-m-d-H-i-s");//去当前上传的时间 
	$filename[0]=$time;//取文件名t替换 
	$name=implode(".",$filename); //上传后的文件名 
	$uploadfile=$filePath.$name;//上传后的文件名地址 

  
	//move_uploaded_file() 函数将上传的文件移动到新位置。若成功，则返回 true，否则返回 false。
    $result=move_uploaded_file($filetempname,$uploadfile);//假如上传到当前目录下
    if($result) //如果上传文件成功，就执行导入excel操作
    {
	   //$objReader = PHPExcel_IOFactory::createReader('Excel5');//use excel2003
	   $objReader = PHPExcel_IOFactory::createReader('Excel2007');//use excel2003 和 2007 format
	   //$objPHPExcel = $objReader->load($uploadfile); //这个容易造成httpd崩溃
	   $objPHPExcel = PHPExcel_IOFactory::load($uploadfile);//改成这个写法就好了

	   $sheet = $objPHPExcel->getSheet(0); 
	   $highestRow = $sheet->getHighestRow(); // 取得总行数 
	   echo $highestRow;
	   echo "<br>";
	   $highestColumn = $sheet->getHighestColumn(); // 取得总列数
	   echo $highestColumn;
	   echo "<br>";
    
		//循环读取excel文件,读取一条,插入一条
		for($j=7;$j<=$highestRow;$j++)
		{ 
			for($k='A';$k<=$highestColumn;$k++)
			{ 
				$str .= iconv('utf-8','utf-8',$objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue()).'\\';//读取单元格
			} 
			//explode:函数把字符串分割为数组。
			$strs = explode("\\",$str);
			
			/*var_dump($strs);	
			echo "<br><br><br><br>";*/

			$template_name=$_POST['template_name'];
			$sqlTemp_id="select count(temp_id) from template where template_name='{$template_name}'";
			$rstTemp_id=mysqli_query($con,$sqlTemp_id);
			while($rowTem_id=mysqli_fetch_row($rstTemp_id)){
				$count_temp_id=$rowTem_id[0];
			}
			for($m=3;$m<$count_temp_id+3;$m++)
			{	$n=$m-2;
				$sqlT_id="select * from template where seq=$n";
				$rstT_id=mysqli_query($con,$sqlT_id);
				while($rowT_id=mysqli_fetch_assoc($rstT_id))
				{
					$sql = "INSERT INTO achivement(template_name,seq,student_id,student_name,score,work_id) VALUES('{$template_name}','".$strs[0]."','".$strs[1]."','".$strs[2]."','".$strs[$m]."','{$rowT_id['work_id']}')";     
					echo $sql;
				$rst=mysqli_query($con,$sql);	
				}
				
			}
			
			//mysqli_query("set names utf8");//这就是指定数据库字符集，一般放在连接数据库后面就系了 
		/*	if(!mysqli_query($con,$sql)){
				return false;
			}*/
		
			$str = "";
			
	   } 
   	   unlink($uploadfile); //删除上传的excel文件
       $msg = "导入成功！";
    }else{
       $msg = "导入失败！";
    }
    return $msg;
}
?>