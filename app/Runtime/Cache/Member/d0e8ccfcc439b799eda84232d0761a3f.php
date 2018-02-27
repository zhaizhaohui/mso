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
    <span class="fl">
        <a class="layui-btn layui-btn-danger batchDel" id="btn-delete-all">批量删除</a><a class="layui-btn btn-add btn-default" href="<?php echo U('news/add');?>" id="btn-add-article">添加</a>
    </span>
    <span class="fr">
        <span class="layui-form-label">搜索条件</span>
        <div class="layui-input-inline">
            <input type="text" autocomplete="off" placeholder="请输入搜索条件" class="layui-input">
        </div>
        <button class="layui-btn mgl-20"><i class="layui-icon">&#xe615;</i>查询</button>
    </span>
</blockquote>
<table class="layui-table layui-form">
    <colgroup>
        <col width="50">
        <col>
        <col width="170">
        <col width="100">
        <col width="180">
    </colgroup>
    <thead>
    <tr>
        <th><input type="checkbox" lay-skin="primary" lay-filter="allChoose" id="allChoose"></th>
        <th>文章标题</th>
        <th>发布时间</th>
        <th>推荐</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr role="row">
            <td><input type="checkbox" name="ids" lay-skin="primary" value="<?php echo ($vo["id"]); ?>" lay-filter="choose"></td>
            <td><?php echo ($vo["title"]); ?></td>
            <td><?php echo (date("Y/m/d H:i:s",$vo["create_time"])); ?></td>
            <td><input type="checkbox" name="switch" lay-skin="switch" value="<?php echo ($vo["id"]); ?>" <?php echo ($vo['is_top'] == '1'?'checked':''); ?> lay-text="是|否" lay-filter="isShow"></td>
            <td>
                <a data-id="<?php echo ($vo["id"]); ?>" class="layui-btn layui-btn-mini layui-btn-normal btn-edit"><i class="layui-icon">&#xe642;</i>编辑</a>
                <a data-id="<?php echo U('member/news/delete',['id'=>$vo['id']]);?>" class="layui-btn layui-btn-mini layui-btn-danger" lay-filter="ajax-del"><i class="layui-icon">&#xe640;</i>删除</a>
            </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?> 
    </tbody>
</table>
<div class="z-page"><?php echo ($page); ?></div>
<script src="http://localhost/mso/libs/layui/layui.js"></script>
<script src="http://localhost/mso/zui/js/mm/common.js"></script>
</body>
</html>