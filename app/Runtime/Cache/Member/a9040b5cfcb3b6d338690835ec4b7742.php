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
<style>form{margin-top: 15px;}</style>
</head>
<body class="body">
	<form class="layui-form" method="post" >
		<div class="layui-form-item">
	        <label class="layui-form-label">相册名称</label>
	        <div class="layui-input-block">
	            <input type="text" name="name" autocomplete="off" placeholder="请填写相册名称" lay-verify="name" class="layui-input" value="<?php echo ($name); ?>">
	        </div>
	    </div>
	    <div class="layui-form-item">
	    	<div class="layui-input-block">
	        	<button class="layui-btn btn-add" lay-submit lay-filter="ajax-add"><i class="layui-icon">&#xe654;</i>保存</button>
	        </div>
	    </div>
	</form>
	<script src="http://localhost/mso/libs/layui/layui.js"></script>
	<script src="http://localhost/mso/zui/js/mm/common.js"></script>
</body>
</html>