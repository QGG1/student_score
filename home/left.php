<?php
	session_start();
	$teacher_cid=$_SESSION['teacher_cid'];	
	$teacher_did=$_SESSION['teacher_did'];	
?>
<style>
body{
	padding:0;
	margin:0;
	height:5000px;
	color:#4A4B4C;
}
ul{
	padding:0;
}
li{
	list-style: none;
}
a{
	text-decoration: none;
}
	.left{
		/*position:absolute;*/
		height:1200px;
		width:250px;
		background-color:#4A4B4C;

	}
	.mokuai{
		height:800px;
		width:100%;
		background:url("../public/images/nav-bg.png");
		margin-top: 0;
		overflow:hidden;
		}
	.mokuai .show{
		top:12px;
		background:url("../public/images/xian.png")no-repeat 0 25px;
		width:200px;
		position:relative;
		left:20px;
	}
	.mokuai .show span{
		font-size:16px;
		line-height:28px;
		display:block;
		margin-left: 6px;
		padding-left:0px;
		width:165px;
		cursor:pointer;		
		color:#fff;
		margin-top:10px;
	}

	.mokuai .hide{
		height:100px;
		margin-top: 5px;
		display: block;
		margin-left:10px;
		display:none;
		width:200px;
	}
	
	.mokuai .hide  li{
		float:left;
		margin-top:12px;
		width:100px;
		margin-left:20px;
	}
	.mokuai .hide  li a{
		text-decoration: none;	
		color:#330;
		display:block;
		
		width:200px;
	}
	.mokuai .hide  li a:hover{
		color:#FFe;
	}
</style>
<script src="/myshop15/public/js/jquery.min.js"></script>
<script>
var x=0;
$(function(){
	/*$(".mokuai .show span").mouseover(function(){
		$(this).css("background-color","<div id="2C60AD"></div>");
	});
	$(".mokuai .show span").mouseleave(function(){
		$(this).css("background-color","#2C60AD");
	});*/
	$(".mokuai .show").click(function(){

		if($(this).find('ul').css('display')=='block')
		{
			
			$(this).find('ul').slideDown();
			$(".mokuai .show").not($(this)).find('ul').slideUp();
			
		}
		else{
			$(this).find('ul').slideDown();
			$(".mokuai .show").not($(this)).find('ul').slideUp();
		}
		
	});
});
	
</script>
<body>
	<div class="left">
		<ul class="mokuai">
			<li class="show">
				<span>毕业项目要求管理</span>
				<ul class="hide">
					<li><a href="demand/demand.php?college_id=<?php echo $teacher_cid?>&dept_id=<?php echo $teacher_did?>" target='right'>|-查看毕业要求项目</a></li>
					<li><a href="demand/add.php?college_id=<?php echo $teacher_cid?>&dept_id=<?php echo $teacher_did?>" target='right'>|-添加毕业要求项目</a></li>
				</ul>
			</li>
			<li class="show">
				<span>课程毕业要求管理</span>
				<ul class="hide">
					<li><a href="course_obj/course_id3.php" target='right'>|-查看课程指标点</a></li>
					<li><a href="course_obj/add2.php" target='right'>|-添加课程指标点</a></li>
					<li><a href="course_obj/cp2.php" target='right'>|-查看课程目标</a></li>
				</ul>
			</li>
			<li class="show">
				<span>达成度模板</span>
				<ul class="hide">
					<li><a href="template/add.php" target='right'>|-生成模板</a></li>
					<li><a href="template/view.php" target='right'>|-下载模板</a></li>
					<li><a href="/student_score/file.php" target='right'>|-上传文件</a></li>
					
				</ul>
			</li>
			<li class="show">
				<span>达成度查询</span>
				<ul class="hide">
					<li><a href="search/demand.php" target='right'>|-指标点达成度查询</a></li>
				</ul>
			</li>
				<li class="show">
				<span>总达成度</span>
				<ul class="hide">
					<li><a href="weight/chakan.php" target='right'>|-查看权值表</a></li>
					<li><a href="weight/addcourse.php" target='right'>|-设置权值表</a></li>
					<li><a href="weight/view.php" target='right'>|-查看总达成度</a></li>
				</ul>
			</li>
			<!-- <li class="show">
				<span>品牌管理</span>
				<ul class="hide">
					<li><a href="brand/index.php" target='right'>|-查看品牌</a></li>
					<li><a href="brand/add.php" target='right'>|-添加品牌</a></li>
				</ul>
			</li>
			<li class="show">
				<span>商品管理</span>
				<ul class="hide">
					<li><a href="shop/index.php" target='right'>|-查看商品</a></li>
					<li><a href="shop/add.php" target='right'>|-添加商品</a></li>
				</ul>
			</li>
			<li class="show">
				<span>评论管理</span>
				<ul class="hide">
					<li><a href="comment/index.php" target='right'>|-查看评论</a></li>
					
				</ul>
			</li>
			<li class="show">
				<span>订单状态</span>
				<ul class="hide">
					<li><a href="status/index.php" target='right'>|-查看状态</a></li>
					<li><a href="status/add.php" target='right'>|-添加状态</a></li>
				</ul>
			</li>
			<li class="show">
				<span>订单管理</span>
				<ul class="hide">
					<li><a href="indent/index.php" target='right'>|-查看订单</a></li>
				
				</ul>
			</li>
			<li class="show">
				<span>系统管理</span>
				<ul class="hide">
					<li><a href="adminpass.php" target='right'>|-修改口令</a></li>
					<li><a href="logout.php" target='right' onclick="return confirm('您确认退出系统么？')">|-退出登录</a></li>
				
				</ul>
			</li> -->
		</ul>
	</div>
</body>