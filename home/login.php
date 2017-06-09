<?php
	
?>
<!DOCTYPE>
<html>
	<head>
	<meta chrset="UTF-8">
	<title>教师登录</title>
	</head>
	<body>
	
		<style>
			body{
				padding:0;
				margin:0;
				font-family:Arial;
				background-color: #2C60AD;	
				color:#fff;
			}
			a{
				text-decoration: none;
			}
			.form{
				height:400px;
				width:500px;
				background-color: #2C60f1;
				position:absolute;
				left:35%;
				top:20%;
			}
			.form span{
				font-size:24px;
				margin-left:200px;
				margin-top:70px;
				display:block;
			} 
			.form input{
				width:306px;
				height:50px;
			
				padding:13px 16px 13px 6px;
				border:1px solid #e0e0e0;
				margin-left:95px;
				margin-top:20px;
			}
			.form input[type="submit"]{
				font-size:22px;
				color:#333;
				cursor:pointer;
				text-align:center;
			}
			.form .reg{
				position: relative;
				float: right;
				margin:0;
				height:30px;
				width:70px;
				display: block;
			}
			.form .reg a{
				color:#fff;
			}
		</style>
	</head>
	<body>
		<div class="form">
			<span>教师登录</span>
			<form action="check.php" method="post">
				<p><input type="text" placeholder="教师编号" name="teacherid"></p>	
				<p><input type="password" placeholder="密码" name="password"></p>
				<p><input type="submit" value="登录"></p>
			</form>
	
		</div>

	</body>
</html>