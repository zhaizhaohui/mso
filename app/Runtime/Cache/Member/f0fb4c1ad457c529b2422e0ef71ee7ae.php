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
<link rel="stylesheet" href="http://localhost/mso/libs/zu/zu.css">
</head>
<body class="body">
	<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
	  <ul class="layui-tab-title">
	    <li><a href="<?php echo U('upimg/index');?>">普通上传</a></li>
	    <li class="layui-this">批量上传</li>
	  </ul>
  	</div>
  	<form class="layui-form" method="post" action="<?php echo U('member/upimg/batch');?>">
  		<input type="hidden" name="token" value="<?php echo session('token');?>">
  		<div class="layui-form-item">
	        <label class="layui-form-label">所属相册</label>
	        <div class="layui-input-block">
	            <select name="ab_id" id="ablumId">
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["ab_id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
	        </div>
	    </div>
		<div class="layui-form-item">
	        <label class="layui-form-label">选择图片</label>
	        <div class="layui-input-block">
	            <div class="form-control" id="photos"></div>
	        </div>
	    </div>
	    <div class="layui-form-item">
	    	<div class="layui-input-block">
	        	<button class="layui-btn" lay-submit=""><i class="layui-icon">&#xe62f;</i>提交</button>
	        </div>
	    </div>
	</form>
	<script type="text/javascript" src="http://localhost/mso/libs/layui/layui.js"></script>
	<script>
		layui.use(['jquery','form'], function(){
			var $= layui.jquery;
			$("#photos").zyUpload({
				dragDrop: false,
				width: '100%',
				height: 'auto',
				url: "<?php echo U('upimg/multi');?>"
			});
		});
	</script>
	<script src="http://localhost/mso/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="http://localhost/mso/libs/zu/file.js"></script>
	<script src="http://localhost/mso/libs/zu/zu.js"></script>
</body>
</html>