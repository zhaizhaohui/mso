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
	<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
	    <legend>基本资料</legend>
	</fieldset>
	<form class="layui-form" action="">
	    <div class="layui-form-item">
	        <label class="layui-form-label">企业名称</label>
	        <div class="layui-input-block">
	            <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="填写文章标题" class="layui-input">
	        </div>
	    </div>
	    <div class="layui-form-item">
	        <label class="layui-form-label">企业LOGO</label>
	        <div class="layui-input-block">
	            <div id="photo"></div>
	        </div>
	    </div>
	    <div class="layui-form-item">
	        <label class="layui-form-label">关键字</label>
	        <div class="layui-input-block">
	            <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="关键词在5个以内，用空格隔开" class="layui-input">
	        </div>
	    </div>
	    <div class="layui-form-item layui-form-text">
	        <label class="layui-form-label">站点描述</label>
	        <div class="layui-input-block">
	            <textarea placeholder="请输入内容" class="layui-textarea"></textarea>
	        </div>
	    </div>
	    <div class="layui-form-item">
	    	<div class="layui-input-block">
	        	<button class="layui-btn" lay-submit=""><i class="layui-icon">&#xe642;</i>提交</button>
	        </div>
	    </div>
	</form>
	<script src="http://localhost/mso/libs/layui/layui.js"></script>
	<script src="http://localhost/mso/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="http://localhost/mso/libs/wu/wu.js"></script>
	<script>
		layui.use('form', function(){});
		$('#photo').webu({});
	</script>
</body>
</html>