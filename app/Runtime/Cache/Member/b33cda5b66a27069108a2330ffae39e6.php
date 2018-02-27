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
	    <legend>企业简介</legend>
	</fieldset>
	<form class="layui-form" method="post">
		<div class="layui-form-item">
	        <label class="layui-form-label">温馨提示</label>
	        <div class="layui-input-block">
	            <p class="layui-txt note">请在这里填写企业的相关介绍，让客户更好地了解您的企业！</p>
	        </div>
	    </div>
	    <div class="layui-form-item">
	        <label class="layui-form-label">企业名称</label>
	        <div class="layui-input-block">
	            <p class="layui-txt"><?php echo ($company); ?></p>
	        </div>
	    </div>
	    <div class="layui-form-item layui-form-text">
	        <label class="layui-form-label">企业介绍</label>
	        <div class="layui-input-block">
	            <textarea placeholder="请输入内容" id="content" name="content"><?php echo ((isset($content) && ($content !== ""))?($content):''); ?></textarea>
	        </div>
	    </div>
	    <div class="layui-form-item">
	    	<div class="layui-input-block">
	        	<button class="layui-btn" lay-submit=""><i class="layui-icon">&#xe642;</i>编辑</button>
	        </div>
	    </div>
	</form>
	<script src="http://localhost/mso/libs/layui/layui.js"></script>
	<script src="http://localhost/mso/zui/js/mm/common.js"></script>
</body>
</html>