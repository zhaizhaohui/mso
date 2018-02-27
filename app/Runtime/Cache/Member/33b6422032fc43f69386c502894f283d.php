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
<style>#txmap{width: 100%;height: 400px;}</style>
</head>
<body class="body">
	<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
	    <legend>联系方式</legend>
	</fieldset>
	<form class="layui-form" method="post">
	    <div class="layui-form-item">
	        <label class="layui-form-label">温馨提示</label>
	        <div class="layui-input-block">
	            <p class="layui-txt note">请在这里填写企业的相关联系方式，让客户更方便地联系到您！</p>
	        </div>
	    </div>
	    <div class="layui-form-item layui-form-text">
	        <label class="layui-form-label">联 系 人</label>
	        <div class="layui-input-block">
	             <input type="text" name="contacts" lay-verify="contacts" autocomplete="off" placeholder="请填写联系人姓名" class="layui-input" value="<?php echo ((isset($contacts) && ($contacts !== ""))?($contacts):''); ?>">
	        </div>
	    </div>
	    <div class="layui-form-item layui-form-text">
	        <label class="layui-form-label">联系电话</label>
	        <div class="layui-input-block">
	             <input type="text" name="tel" lay-verify="tel" autocomplete="off" placeholder="请填写公司电话号，格式：0311-88888888" class="layui-input"  value="<?php echo ((isset($tel) && ($tel !== ""))?($tel):''); ?>">
	        </div>
	    </div>
	    <div class="layui-form-item layui-form-text">
	        <label class="layui-form-label">联系手机</label>
	        <div class="layui-input-block">
	             <input type="text" name="phone" lay-verify="phone" autocomplete="off" placeholder="请填写联系人手机号" class="layui-input" value="<?php echo ((isset($phone) && ($phone !== ""))?($phone):''); ?>">
	        </div>
	    </div>
	    <div class="layui-form-item layui-form-text">
	        <label class="layui-form-label">详细地址</label>
	        <div class="layui-input-block">
	           <input type="text" name="address" id="address" lay-verify="address" autocomplete="off" placeholder="请填写公司具体地址以方便定位" class="layui-input" value="<?php echo ((isset($address) && ($address !== ""))?($address):''); ?>"><input type="hidden" name="coord" id="coord" value="<?php echo ((isset($coord) && ($coord !== ""))?($coord):''); ?>"></div>
	    </div>
	    <div class="layui-form-item layui-form-text">
	        <label class="layui-form-label">E-mail</label>
	        <div class="layui-input-block">
	            <input type="text" name="email" lay-verify="email" autocomplete="off" placeholder="请填写公司联系的电子邮箱" class="layui-input" value="<?php echo ((isset($email) && ($email !== ""))?($email):''); ?>">
	        </div>
	    </div>
	    <div class="layui-form-item layui-form-text">
	        <label class="layui-form-label">传真号码</label>
	        <div class="layui-input-block">
	            <input type="text" name="fax" lay-verify="fax" autocomplete="off" placeholder="请填写公司联系的传真" class="layui-input" value="<?php echo ((isset($fax) && ($fax !== ""))?($fax):''); ?>">
	        </div>
	    </div>
	    <div class="layui-form-item layui-form-text">
	        <label class="layui-form-label">地图标注</label>
	        <div class="layui-input-block">
	            <div id="txmap"></div>
	        </div>
	    </div>
	    <div class="layui-form-item">
	    	<div class="layui-input-block">
	        	<button class="layui-btn" lay-submit=""><i class="layui-icon">&#xe642;</i>编辑</button>
	        </div>
	    </div>
	</form>
	<script type="text/javascript" src="http://localhost/mso/libs/layui/layui.js"></script>
	<script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp"></script>
	<script src="http://localhost/mso/zui/js/z/txmap.js"></script>
	<script>layui.use(['form'], function(){});</script>
</body>
</html>