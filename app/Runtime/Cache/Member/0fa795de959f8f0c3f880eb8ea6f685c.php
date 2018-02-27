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
	<blockquote class="layui-elem-quote cl">
	    <a class="layui-btn" href="<?php echo U('ablum/index');?>">相册列表</a><a class="layui-btn btn-move layui-btn-normal">移动到</a><a class="layui-btn btn-del layui-btn-danger">删除</a>
	</blockquote>
	<div class="photos">
		<ul>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($vo["id"]); ?>">
					<div class="photo-box">
						<img src="http://localhost/mso/data/imgs/xiaoyu/<?php echo ($vo['ab_id']); ?>/<?php echo ($vo['tmp_name']); ?>" alt="<?php echo ($vo["name"]); ?>">
					</div>
					<div class="photo-name"><?php echo ($vo['name']?$vo['name']:$vo['tmp_name']); ?></div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
	<script src="http://localhost/mso/libs/layui/layui.js"></script>
	<script src="http://localhost/mso/zui/js/mm/common.js"></script>
	<script>
	layui.use(['jquery','form','layer'], function(){
		var $ = layui.jquery;
		$('.photos').on('click','li',function(){$(this).toggleClass('cur');});
		$('.btn-move').on('click',function(){
			var ids = getIds('.photos .cur','data-id');
			zayer('移动图片',"<?php echo U('member/ablum/move',['aid'=>$_GET['aid']]);?>",['30%','40%'],{'#ids':ids});
		});
	});
	</script>
</body>
</html>