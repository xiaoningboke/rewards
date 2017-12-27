<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>奖惩系统</title>
    <link rel="stylesheet" href="/rewards/Public/static/plugins/layui/css/layui.css" media="all">
    <link rel="stylesheet" type="text/css" href="http://cdn.bootcss.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/rewards/Public/static/build/css/app.css" media="all">
</head>
<body>
  <div style="margin-top: 20px">
  <form class="layui-form" method="post" action="<?php echo U('Home/Teacher/exitpassword');?>">
    <input type="hidden" name="id" value="<?php echo ($personalData["id"]); ?>">
	<div class="layui-form-item">
    <label class="layui-form-label">原密码：</label>
    <div class="layui-input-inline">
      <input name="oldpassword" lay-verify="required" placeholder="请输入原密码" autocomplete="off" class="layui-input" type="password">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">新密码：</label>
    <div class="layui-input-inline">
        <input name="password" lay-verify="required" placeholder="请输入新密码" autocomplete="off" class="layui-input" type="password">
    </div>
  </div>
  <input type="submit" name="" value="提交" class="layui-btn layui-btn-warm" style="margin-left: 50px">
</form>
</div>
	    <script src="/rewards/Public/static/plugins/layui/layui.js"></script>
    <script>
        var message;
        layui.config({
            base: '/rewards/Public/static/build/js/'
        }).use(['app', 'message'], function() {
            var app = layui.app,
                $ = layui.jquery,
                layer = layui.layer;
            //将message设置为全局以便子页面调用
            message = layui.message;
            //主入口
            app.set({
                type: 'iframe'
            }).init();
            $('#pay').on('click', function() {
                layer.open({
                    title: false,
                    type: 1,
                    content: '<img src="/build/images/pay.png" />',
                    area: ['500px', '250px'],
                    shadeClose: true
                });
            });
        });
    </script>
</body>
</html>