<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Test</title>
    <link rel="stylesheet" href="http://localhost/mso/libs/layui/css/layui.css">
    <link rel="stylesheet" href="http://localhost/mso/zui/css/admin.css">
</head>
<body class="body">
	<blockquote class="layui-elem-quote layui-text">
	   您现在可以编辑每张图片信息，为每张图片单独添加名称，也可以为所有图片统一命名，单击图片设置封面。您也可以点击<a href="<?php echo U('ablum/index');?>">返回相册</a>，使用系统默认命名。
	</blockquote>
	<form method="post" action="<?php echo U('upimg/batchName');?>">
	<input type="hidden" name="cover" value="0" id="cover">
	<input type="hidden" name="ab_id" value="<?php echo ($ab_id); ?>">
	<div class="layui-tab">
		<ul class="layui-tab-title">
			<li class="layui-this">单独命名</li>
			<li>统一命名</li>
		</ul>
		<div class="layui-tab-content">
			<div class="layui-tab-item layui-show photos">
				<ul class="cl">
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<div class="photo-box">
								<div class="z-seat"></div>
								<img src="<?php echo ($vo["photo"]); ?>" alt="<?php echo ($vo["tmp_name"]); ?>">
							</div>
							<div class="photo-name">
								<input type="text" name="name[]" placeholder="为图片添加名称">
								<input type="hidden" name="ids[]" value="<?php echo ($vo["id"]); ?>">
							</div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="layui-tab-item"><input type="text" class="layui-input" name="uname" placeholder="请在此为图片统一命名"></div>
		</div>
	</div>
	<div class="layui-form-item">
        <button class="layui-btn" lay-submit=""><i class="layui-icon">&#xe62f;</i>提交</button>
    </div>
	</form>
	<script src="http://localhost/mso/libs/layui/layui.js"></script>
	<script>
		layui.use(['form','jquery','element'], function(){
			var $ = layui.jquery;
			$('html').on('click','.photo-box',function(){
				var seat = $(this).find('.z-seat');
				if(seat.hasClass('z-cover')){
					seat.removeClass('z-cover');
					$('#cover').val('0');
				}else{
					seat.addClass('z-cover').parents('li').siblings('li').find('.z-seat').removeClass('z-cover');
					$('#cover').val(seat.next('img').attr('alt'));
				}
			})
		});
	</script>
</body>
</html>