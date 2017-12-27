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
  <form class="layui-form" method="post" action="<?php echo U('Home/Teacher/addStudents');?>">
  <div class="layui-form-item">
    <label class="layui-form-label">学号：</label>
    <div class="layui-input-inline">
      <input name="number" lay-verify="required" placeholder="请输入学号" autocomplete="off" class="layui-input" type="text">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">姓名：</label>
    <div class="layui-input-inline">
        <input name="name" lay-verify="required" placeholder="请输入姓名" autocomplete="off" class="layui-input" type="text">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">性别：</label>
    <div class="layui-input-inline">
    
      <input name="sex" value="0" title="男" type="radio" checked="">&nbsp;&nbsp;&nbsp;
      <input name="sex" value="1" title="女" type="radio"  checked="">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">邮箱：</label>
    <div class="layui-input-inline">
         <input name="email" lay-verify="email" autocomplete="off" class="layui-input" type="text">
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