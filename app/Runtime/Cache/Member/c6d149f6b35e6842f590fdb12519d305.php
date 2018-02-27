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
	    <a class="layui-btn btn-add ablum-ae" href="<?php echo U('member/ablum/add');?>" title="创建相册">创建相册</a>
	</blockquote>
	<div class="ablum-list cl">
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
				<dt>
					<a class="ablum-img" title="进入相册" href="<?php echo U('member/ablum/manage',['aid'=>$vo['ab_id']]);?>">
						<img src="<?php echo ($vo['cover']); ?>" alt="">
					</a>
					<p>
						<a class="ablum-edit ablum-ae" href="<?php echo U('member/ablum/edit',['id'=>$vo['ab_id']]);?>" title="修改相册"><i class="layui-icon">&#xe642;</i></a><a class="ablum-delete btn-del" data-url="<?php echo U('member/ablum/delete',['id'=>$vo['ab_id']]);?>" title="删除相册"><i class="layui-icon">&#xe640;</i></a>
					</p>
				</dt>
				<dd>
					<strong><?php echo ($vo["name"]); ?>(<?php echo ($vo["photos"]); ?>)</strong>
					<p><?php echo (date('Y-m-d H:i:s',$vo["create_time"])); ?></p>
				</dd>
			</dl><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<div class="z-page"><?php echo ($page); ?></div>
	<script src="http://localhost/mso/libs/layui/layui.js"></script>
	<script src="http://localhost/mso/zui/js/mm/common.js"></script>
	<script>
		layui.use(['jquery','layer'], function(){
			var $ = layui.jquery;
			$('html').on('mouseenter','.ablum-list dt',function(){
	            $(this).find('p').stop().show();
	        }).on('mouseleave','dt',function(){
	            $(this).find('p').stop().hide();
	        });
			$('html').on('click','.ablum-ae',function(e){
	            e.preventDefault();zayer($(this).attr('title'),$(this).attr('href'),['400px','200px']);
	        });
		});
	</script>
</body>
</html>