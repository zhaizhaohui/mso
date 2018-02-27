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
	<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
	  <ul class="layui-tab-title">
	    <li class="layui-this">普通上传</li>
	    <li><a href="<?php echo U('upimg/multi');?>">批量上传</a></li>
	  </ul>
  	</div>
	<form class="layui-form" method="post">
		<input type="hidden" name="isCover" value="0" id="isCover">
		<div class="layui-form-item">
	        <label class="layui-form-label">选择图片</label>
	        <div class="layui-input-block">
	           <div id="photo"></div>
	        </div>
	    </div>
	    <div class="layui-form-item">
	        <label class="layui-form-label">设为封面</label>
	        <div class="layui-input-block">
	            <input type="checkbox" lay-skin="switch" lay-text="是|否" lay-filter="isCover">
	        </div>
	    </div>
		<div class="layui-form-item">
	        <label class="layui-form-label">图片名称</label>
	        <div class="layui-input-block">
	            <input type="text" name="name" lay-verify="title" autocomplete="off" placeholder="请填写图片名称" class="layui-input">
	        </div>
	    </div>
	    <div class="layui-form-item">
	        <label class="layui-form-label">所属相册</label>
	        <div class="layui-input-block">
	            <select name="ab_id">
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["ab_id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
	        </div>
	    </div>
		<div class="layui-form-item">
	    	<div class="layui-input-block">
	        	<button class="layui-btn" lay-submit=""><i class="layui-icon">&#xe62f;</i>上传</button>
	        </div>
	    </div>
	</form>
	<script type="text/javascript" src="http://localhost/mso/libs/layui/layui.js"></script>
	<script>
		layui.use(['jquery','form'], function(){
			var $= layui.jquery,form = layui.form;
			$('#photo').webu({add:"<?php echo U('member/upimg/ajaxUpload');?>"});
			form.on('switch(isCover)', function(data){
				var top = (data.elem.checked == true) ? 1 : 0;
				$('#isCover').val(top);
			});
		});
	</script>
	<script src="http://localhost/mso/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="http://localhost/mso/libs/wu/wu.js"></script>
</body>
</html>