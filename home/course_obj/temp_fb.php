<?php
	session_start();
	include '../../public/common/config.php';	
	$course_id=$_POST['course_id'];
	$college_id=$_SESSION['teacher_cid'];
	$dept_id=$_SESSION['teacher_did'];
	$sqlCDC="select * from course where course_id='{$course_id}' and cid='{$college_id}' and did='{$dept_id}'";
	$rstCDC=mysqli_query($con,$sqlCDC);
	if(mysqli_num_rows($rstCDC)<1)
	{
		echo "<script>alert('您未选择课程')</script>";
		echo "<script>location='add2.php'</script>";		
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta chrset="UTF-8">
	<title>index</title>
	<style>
		.main{
			position:absolute;
			left:350px;
			margin:0 auto;
			font-size:18px;
		}
		.main span{
			margin-top:20px;
			display: block;
			font-size:19px;
			margin-left:-10px;
			margin-bottom: 30px;
		}
		.main .p{
			color:red;
			display: none;
		}
		.main form{
			width:800px;
		}
		.btn{
		width:80px;
		border:none;
		top:20px;
		left:30px;
		position:relative;
		height:30px;
		background-color:#2C60AD;;
		color:#fff;
		cursor:pointer;
		border-radius: 4px;
	}

	</style>
	<link rel="stylesheet" href="../../public/style/public.css">
	<script src="../../public/js/jquery.min.js"></script>
	<script>
		$(function(){
		
			$(".main .cBox").click(function(){


			
				var index = $(this).index()/3; 
				if($(".main .p").eq(index).css('display')=='block')
				{
					$(".main .p").eq(index).css("display","none");
					
				}
				
				else{
					var index = $(this).index()/3; 
					$(".main .p").eq(index).css("display","block");
					 
				}  
		
			});

		});
	</script>
	<script type="text/javascript">
		function ck(){

			  var a = document.getElementsByName("checkBox[]"); 

			   var n = a.length;

			   var k = 0;

			   for (var i=0; i<n; i++){

			        if(a[i].checked){

			            k = 1;
			        
			        }

			    }
			    if(k==0){

			    alert("您没有选择指标点");
			    
			    return false;
			    
			    }

			   else{

			   	return true;
			   
			   }
		}
	</script>
	</head>
	<body>
		<div class="main">
			<span>选择毕业项目要求：</span>
			<form action="insert.php" method="post" onSubmit="return ck();">
				
					<?php
						/*for($i=0;$i<count($text1);$i++)
						{
							$sqla="select demand_pro_id from demand where demand_pro_name='$text1[$i]'";
							$rsta=mysqli_query($con,$sqla);
							$rowa=mysqli_fetch_assoc($rsta);
							$sql="select * from point where point.demand_pro_id='{$rowa['demand_pro_id']}'";
							
							$rst=mysqli_query($con,$sql);
							while($row=mysqli_fetch_assoc($rst)){
								echo "<input type='checkBox' name='checkBox[]' value='{$row['point_id']}'>{$row['point_name']}<br>";
							}
						}*/
						$sqlDemand="select * from demand where college_id='{$college_id}' and dept_id='{$dept_id}' order by demand_pro_id+0";
						$rstDemand=mysqli_query($con,$sqlDemand);
						$i=0;
		
						while($rowDemand=mysqli_fetch_assoc($rstDemand))
						{	
					
							echo "<input type='checkBox' class='cBox' name='checkBox1[]' value='{$rowDemand['demand_pro_name']}'>{$rowDemand['demand_pro_name']}<br>";
							echo "<div class='p'>";
										$dname=$rowDemand['demand_pro_name'];
										$sqla="select demand_pro_id from demand where demand_pro_name='{$dname}' and college_id='{$college_id}' and dept_id='{$dept_id}'";
							$rsta=mysqli_query($con,$sqla);
							$rowa=mysqli_fetch_assoc($rsta);
							$sql="select * from point where point.demand_pro_id='{$rowa['demand_pro_id']}'";

							$rst=mysqli_query($con,$sql);
							
							while($row=mysqli_fetch_assoc($rst)){
					
								echo "&nbsp&nbsp&nbsp";
								echo "<input type='checkBox' name='checkBox[]' value='{$row['point_id']}'> {$row['point_name']}<br>";
							}
							echo "		
							</div>";
						}
					?>

					<input type="hidden"  value="<?php echo $course_id?>" name="course_id">				
					<input type="hidden"  value="<?php echo $dept_id?>" name="dept_id">		
					<input type="hidden"  value="<?php echo $college_id?>" name="college_id">					
					<input type="submit" class="btn" value="选择" >	
			</form>

		</div>
		
	</body>
	</html>















