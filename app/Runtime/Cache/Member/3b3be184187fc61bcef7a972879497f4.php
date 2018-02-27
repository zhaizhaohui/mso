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
<style>.layui-table .layui-icon{font-size: 18px;margin-right: 5px;}.layui-table a{display: block;}</style>
</head>
<body class="body">
	<div class="main-wel">
				<strong></strong>
				<p>欢迎登录e企秀后台管理系统</p>
			</div>
	<div class="main-date">
		<div class="main-year"><p></p><p><span></span></p></div><div class="main-hour"></div>
	</div>
	<div class="layui-row">
		<div class="layui-col-lg3 main-count">
			<div class="count-box layui-bg-lightgreen">
				<p class="count-num"><?php echo ($count["cates"]); ?></p>
				<p class="count-title">类别统计</p>
			</div>
		</div>
		<div class="layui-col-lg3 main-count">
			<div class="count-box layui-bg-lightred">
				<p class="count-num"><?php echo ($count["news"]); ?></p>
				<p class="count-title">文章数量</p>
			</div>
		</div>
		<div class="layui-col-lg3 main-count">
			<div class="count-box layui-bg-blue">
				<p class="count-num"><?php echo ($count["disk"]); ?></p>
				<p class="count-title">剩余空间</p>
			</div>
		</div>
		<div class="layui-col-lg3 main-count">
			<div class="count-box layui-bg-orange">
				<p class="count-num"><?php echo ($count["days"]); ?></p>
				<p class="count-title">剩余天数</p>
			</div>
		</div>
	</div>
	<div class="layui-row">
		<div class="layui-col-lg3 main-count">
			<div class="info-title">系统信息</div>
			<table class="layui-table">
				  <colgroup>
				    <col width="120">
				    <col>
				  </colgroup>
				<tbody>
					<tr>
						<td>产品名称</td>
						<td>e企宝后台管理系统</td>
					</tr>
					<tr>
						<td>系统版本</td>
						<td>V1.0</td>
					</tr>
					<tr>
						<td>研发团队</td>
						<td>黑牛技术网络</td>
					</tr>
					<tr>
						<td>公司官网</td>
						<td><a href="javascript:;">https://www.heiniuit.com/</a></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="layui-col-lg3 main-count">
			<div class="info-title">用户信息</div>
			<table class="layui-table">
				  <colgroup>
				    <col width="120">
				    <col>
				  </colgroup>
				<tbody>
					<tr>
						<td>用户名</td>
						<td><?php echo ($info["usname"]); ?></td>
					</tr>
					<tr>
						<td>上次登录时间</td>
						<td><?php echo (date('Y/m/d H:i:s',$info["last_login_time"])); ?></td>
					</tr>
					<tr>
						<td>上次登录IP</td>
						<td><?php echo ($info["last_login_ip"]); ?></td>
					</tr>
					<tr>
						<td>注册时间</td>
						<td><?php echo (date('Y/m/d H:i:s',$info["create_time"])); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="layui-col-lg3 main-count">
			<div class="info-title">系统消息</div>
			<table class="layui-table">
				<?php if(is_array($msgs)): $i = 0; $__LIST__ = $msgs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td><a href="?#<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				<tr>
					<td style="text-align:right"><a href="#">More&gt;&gt;</a></td>
				</tr>
			</table>
		</div>
		<div class="layui-col-lg3 main-count">
			<div class="info-title">用户手册</div>
			<table class="layui-table" lay-skin="row">
				<tr>
					<td><a href="#"><i class="layui-icon">&#xe6ed;</i>使用视频教程</a></td>
				</tr>
				<tr>
					<td><a href="#"><i class="layui-icon">&#xe60b;</i>注意事项</a></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
			</table>
		</div>
	</div>
	<script src="http://localhost/mso/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="http://localhost/mso/zui/js/z/time.js"></script>
</body>
</html>