<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
	<link rel="stylesheet" href="http://localhost/mso/zui/css/common.css">
	<link rel="stylesheet" href="http://localhost/mso/zui/css/www/index.css">
	<link rel="stylesheet" href="http://localhost/mso/libs/animate/animate.css">
</head>
<body>
	<div id="dowebok">
		<div class="section box1">
			<div class="business">
				<img src="http://localhost/mso/zui/img/index/business.png" id="business">
				<div class="section-btns msbox">
					<div class="section-btn-box">
						<a href="<?php echo U('member/login/index');?>" class="btn">登录</a><a href="<?php echo U('member/reg/index');?>" class="btn">注册</a>
					</div>
				</div>
			</div>
		</div>
		<div class="section">
			<div class="container">
				<div class="web msbox">
					<img src="http://localhost/mso/zui/img/index/pcb.png" id="pcb">
					<img src="http://localhost/mso/zui/img/index/pcc.png" id="pcc">
				</div>
				<p class="section-title">展示企业形象 推广企业业务</p>
			</div>
		</div>
		<div class="section">
			<div class="container">
				<div class="mb msbox">
					<img src="http://localhost/mso/zui/img/index/mb1.png" id="mb1">
					<img src="http://localhost/mso/zui/img/index/mb2.png" id="mb2">
				</div>
				<p class="section-title">使用手机网站 把握移动商机</p>
			</div>
		</div>
		<div class="section">
			<div class="container">
				<div class="gzh">
					<img src="http://localhost/mso/zui/img/index/gzh1.png" id="gzh1"><img src="http://localhost/mso/zui/img/index/gzh2.png" id="gzh2">
				</div>
			</div>
		</div>
		<div class="section">
			<div class="container">
				<div class="wx msbox">
					<img src="http://localhost/mso/zui/img/index/wx1.png" id="wx1"><img src="http://localhost/mso/zui/img/index/wx2.png" id="wx2"><img src="http://localhost/mso/zui/img/index/wx3.png" id="wx3"><img src="http://localhost/mso/zui/img/index/wx4.png" id="wx4"><img src="http://localhost/mso/zui/img/index/wx5.png" id="wx5"><img src="http://localhost/mso/zui/img/index/wx6.png" id="wx6"><img src="http://localhost/mso/zui/img/index/wx7.png" id="wx7"><img src="http://localhost/mso/zui/img/index/wx8.png" id="wx8">
				</div>
				<p class="section-title">微信小程序 快人一步抢占先机</p>
			</div>
		</div>
	</div>
	<script src="http://localhost/mso/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="http://localhost/mso/libs/fullpage/fullpage.min.js"></script>
	<script>
		$("#dowebok").fullpage({sectionsColor:["#FF7A01","#FFF","#FFF","#FFF","#FFF"],afterLoad:function(anchorLink,index){if(index=="1"){animate_show(".section-business","fadeIn");animate_show(".btn","fadeIn")}if(index=="2"){animate_show("#pcb","slideInLeft");animate_delay("#pcb","#pcc","zoomIn");animate_delay("#pcc",".section-title","fadeInUp")}if(index=="3"){animate_show("#mb1","fadeInUp");animate_show("#mb2","slideInDown");animate_delay("#mb2",".section-title","fadeInUp")}if(index=="4"){animate_show("#gzh1","fadeInUp");animate_show("#gzh2","fadeInDown");animate_delay("#gzh2",".section-title","fadeInUp")}if(index=="5"){animate_show("#wx1","fadeInUp");animate_show("#wx2","slideInDown");animate_delay("#wx2","#wx3","zoomIn");animate_delay("#wx3","#wx4,#wx5,#wx6,#wx7,#wx8","fadeInUp");animate_delay("#wx8",".section-title","fadeInUp")}},onLeave:function(index,direction){$(".container img").attr("class","").hide();section_title_hide()}});function section_title_hide(){$(".section-title").removeClass("fadeInUp").hide()}function animate_show(el,cs){$(el).show().addClass("animated "+cs)}function animate_delay(el1,el2,cs){$(el1).one("webkitAnimationEnd mozAnimationEnd oAnimationEnd animationEnd",function(){animate_show(el2,cs)})};
	</script>
</body>
</html>