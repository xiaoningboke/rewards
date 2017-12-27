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
  <h1><?php echo ($masData["title"]); ?></h1>
  <h3>姓名：<?php echo ($masData["name"]); ?></h3>
  <h3>时间：<?php echo ($masData["time"]); ?></h3>
  内容：<br>
  <?php echo ($masData["encouragemess"]); ?>
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