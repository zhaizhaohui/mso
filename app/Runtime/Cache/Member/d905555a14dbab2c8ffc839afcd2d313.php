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
<div class="layui-form">
	<div class="layui-form-item">
        <label class="layui-form-label">移动到</label>
        <input type="hidden" name="ids" id="ids">
        <div class="layui-input-block">
            <select name="ab_id">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["ab_id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
        </div>
    </div>
    <div class="layui-form-item">
    	<div class="layui-input-block">
        	<button class="layui-btn btn-add" data="55" lay-submit>确定</button>
        </div>
    </div>
</div>
<script src="http://localhost/mso/libs/layui/layui.js"></script>
<script src="http://localhost/mso/zui/js/mm/common.js"></script>
<script>
	layui.use(['jquery','form','layer'], function(){
		var $ =  layui.jquery;
		
	});
</script>
</body>
</html>