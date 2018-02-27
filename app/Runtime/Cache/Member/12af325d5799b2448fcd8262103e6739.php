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
	    <legend>文章编辑</legend>
	</fieldset>
	<form class="layui-form" method="post">
		<input type="hidden" name="id" value="<?php echo ($id); ?>">
	    <div class="layui-form-item">
	        <label class="layui-form-label"><span class="note">*</span>标题</label>
	        <div class="layui-input-block">
	            <input type="text" name="title" autocomplete="off" value="<?php echo ($title); ?>" placeholder="填写文章标题" required lay-verify="title" class="layui-input">
	        </div>
	    </div>
	    <div class="layui-form-item">
	        <label class="layui-form-label">关键字</label>
	        <div class="layui-input-block">
	            <input type="text" name="keywords" value="<?php echo ($keywords); ?>" placeholder="关键词在5个以内，用空格隔开" class="layui-input">
	        </div>
	    </div>
	    <div class="layui-form-item layui-form-text">
	        <label class="layui-form-label"><span class="note">*</span>内容</label>
	        <div class="layui-input-block">
	            <textarea id="content" name="content" placeholder="请在这里输入文章内容" required lay-verify="content"><?php echo ($content); ?></textarea>
	        </div>
	    </div>
	    <div class="layui-form-item">
	    	<div class="layui-input-block">
	        	<button class="layui-btn" lay-submit lay-filter="formAdd"><i class="layui-icon">&#xe642;</i>编辑</button>
	        	<a href="<?php echo U('news/index');?>" class="layui-btn layui-btn-primary"><i class="layui-icon">&#xe65c;</i>返回</a>
	        </div>
	    </div>
	</form>
	<script src="http://localhost/mso/libs/layui/layui.js"></script>
	<script src="http://localhost/mso/zui/js/admin/formAdd.js"></script>
</body>
</html>