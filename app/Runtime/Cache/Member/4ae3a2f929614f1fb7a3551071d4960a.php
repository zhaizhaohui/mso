<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Test</title>
    <link rel="stylesheet" href="http://localhost/178/libs/layui/css/layui.css">
    <link rel="stylesheet" href="http://localhost/178/zui/css/admin.css">
</head>
<body>
<!-- layout admin -->
<div class="layui-layout layui-layout-admin">
    <!-- header -->
    <div class="layui-header my-header">
        <a href="index.html">
            <div class="my-header-logo">e企宝管理系统</div>
        </a>
        <div class="my-header-btn">
            <button class="layui-btn layui-btn-small btn-nav"><i class="layui-icon">&#xe632;</i></button>
        </div>
        <!-- 顶部右侧添加选项卡监听 -->
        <ul class="layui-nav my-header-user-nav" lay-filter="side-top-right">
            <li class="layui-nav-item">
                <a class="name" href="javascript:;"><?php echo ($member_name); ?></a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;" id="logout" data-url="<?php echo U('mso/login/out');?>">退出</a></dd>
                </dl>
            </li>
        </ul>
    </div>
    <!-- side -->
    <div class="layui-side my-side">
        <div class="layui-side-scroll">
            <!-- 左侧主菜单添加选项卡监听 -->
            <ul class="layui-nav layui-nav-tree" lay-filter="side-main">
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon">&#xe620;</i>账号管理</a>
                    <dl class="layui-nav-child">
                       <dd><a href="javascript:;" href-url="<?php echo U('center/index');?>"><i class="layui-icon">&#xe621;</i>基本资料</a></dd> 
                    </dl>
                    <dl class="layui-nav-child">
                       <dd><a href="javascript:;" href-url="<?php echo U('safe/index');?>"><i class="layui-icon">&#xe621;</i>账号安全</a></dd> 
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;" href-url="<?php echo U('news/index');?>"><i class="layui-icon">&#xe60a;</i>文章管理</a>
                </li>
                <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="layui-nav-item">
                    <a href="javascript:;" href-url="<?php echo U($vo['url']);?>"><i class="layui-icon">&#xe698;</i><?php echo ($vo["name"]); ?></a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <li class="layui-nav-item">
                    <a href="javascript:;" href-url="<?php echo U('cate/index');?>"><i class="layui-icon">&#xe857;</i>分类管理</a>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon">&#xe60d;</i>图片管家</a>
                    <dl class="layui-nav-child">
                       <dd><a href="javascript:;" href-url="<?php echo U('upimg/index');?>"><i class="layui-icon">&#xe621;</i>图片上传</a></dd> 
                    </dl>
                    <dl class="layui-nav-child">
                       <dd><a href="javascript:;" href-url="<?php echo U('ablum/index');?>"><i class="layui-icon">&#xe621;</i>相册管理</a></dd> 
                    </dl>
                    <dl class="layui-nav-child">
                       <dd><a href="javascript:;" href-url="<?php echo U('water/index');?>"><i class="layui-icon">&#xe621;</i>设置水印</a></dd> 
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon">&#xe631;</i>扩展设置</a>
                    <dl class="layui-nav-child">
                       <dd><a href="javascript:;" href-url="<?php echo U('center/about');?>"><i class="layui-icon">&#xe621;</i>企业简介</a></dd> 
                    </dl>
                    <dl class="layui-nav-child">
                       <dd><a href="javascript:;" href-url="<?php echo U('center/contact');?>"><i class="layui-icon">&#xe621;</i>联系方式</a></dd> 
                    </dl>
                    <dl class="layui-nav-child">
                       <dd><a href="javascript:;" href-url="<?php echo U('banner/index');?>"><i class="layui-icon">&#xe621;</i>图片轮播</a></dd> 
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon">&#xe61b;</i>模板管理</a>
                    <dl class="layui-nav-child">
                       <dd><a href="javascript:;" href-url=""><i class="layui-icon">&#xe621;</i>PC端模板</a></dd> 
                    </dl>
                    <dl class="layui-nav-child">
                       <dd><a href="javascript:;" href-url=""><i class="layui-icon">&#xe621;</i>移动端模板</a></dd> 
                    </dl>
                    <dl class="layui-nav-child">
                       <dd><a href="javascript:;" href-url=""><i class="layui-icon">&#xe621;</i>小程序模板</a></dd> 
                    </dl>
                </li>
            </ul>

        </div>
    </div>
    <!-- body -->
    <div class="layui-body my-body">
        <div class="layui-tab layui-tab-card my-tab" lay-filter="card" lay-allowClose="true">
            <ul class="layui-tab-title">
                <li class="layui-this" lay-id="1"><span><i class="layui-icon">&#xe638;</i>首页</span></li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <iframe id="iframe" src="/178/Member/Index/main" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <div class="layui-footer my-footer">
        <p>2017 © copyright 蜀ICP备17005881号</p>
    </div>
</div>
<!-- 右键菜单 -->
<div class="my-dblclick-box none">
    <table class="layui-tab dblclick-tab">
        <tr class="card-refresh">
            <td><i class="layui-icon">&#x1002;</i>刷新当前页面</td>
        </tr>
        <tr class="card-close">
            <td><i class="layui-icon">&#x1006;</i>关闭当前页面</td>
        </tr>
    </table>
</div>
<script type="text/javascript" src="http://localhost/178/libs/layui/layui.js"></script>
<script type="text/javascript" src="http://localhost/178/zui/js/mm/index.js"></script>
</body>
</html>