<?php
	include 'lock.php';
	$tname=$_SESSION['teacher_name'];
?>
<style>
body{
	padding:0;
	margin:0;
}
a{
	text-decoration: none;
	font-size: 20px;
	color:#fff;
}
	.header{
		height:118px;
		width:100%;
		margin:0 auto;
		font-family:微软雅黑;
		background:url('../public/images/header-bg.png');
	}
	.header .logo{
		position:relative;
		top:22px;
		left:70px;
		float:left;
	}
	.header .right{
		float:right;
		height:118px;
	}
	.header .right .box{
		height:60px;
		width:380px;
		margin-top:40px;
		position: relative;
	}
	.header .right .box p{
		font-size: 22px;
		color:#fff;
		display: block;
		padding-top: 24px;
		width:200px;
	}
	.header .right .box span{
		height:40px;
		width:80px;
		display: block;
		position: absolute;
		left:300px;
		top:26px;
		color:#fff;
	}
</style>

<body>
<div class="header">
		<div class="logo">
			<a href="index.php"><img src="../public/images/logo.png"></a>
		</div>
		<div class="right">
			<div class="box">
				<p>欢迎您：<?php echo $tname?></p>
				<span><a href="/student_score/home/logout.php">退出</a></span>
			</div>
		</div>
</div>
</body>