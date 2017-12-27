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
    <a href="<?php echo U('Home/teacher/addstudent');?>" class="layui-btn layui-btn-warm">添加</a href="">
<div class="layui-form">
  <table class="layui-table">
    <colgroup>
      <col width="200">
      <col width="200">
      <col width="200">
      <col width="200">
      <col>
    </colgroup>
    <thead>
      <tr>
        <th>学号</th>
        <th>姓名</th>
        <th>性别</th>
        <th>邮箱</th>
        <th>操作</th>
      </tr> 
    </thead>
    <tbody>
      <?php if(is_array($studentData)): foreach($studentData as $key=>$vo): ?><tr>
        <td><?php echo ($vo["number"]); ?></td>
        <td><?php echo ($vo["name"]); ?></td>
        <td>
          <!-- 
          <input type="hidden" name="" id="sexs" value="<?php echo ($vo["sex"]); ?>">
          <script type="text/javascript">
            
          </script> -->
        </td>
        <td><?php echo ($vo["email"]); ?></td>
        <td><a href="<?php echo U('Home/teacher/editStudent',array('id'=>$vo['id']));?>">修改</a> | <a href="<?php echo U('Home/teacher/delStudent',array('id'=>$vo['id']));?>">删除</a></td>
      </tr><?php endforeach; endif; ?>
    </tbody>
  </table>
</div>
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