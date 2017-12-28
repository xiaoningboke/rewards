<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>奖惩系统</title>
    <link rel="stylesheet" href="/rewards/Public/static/plugins/layui/css/layui.css" media="all">
    <link rel="stylesheet" type="text/css" href="http://cdn.bootcss.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/rewards/Public/static/build/css/app.css" media="all">


    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="/rewards/Public/Ueditor/ueditor.config.js"></script>  
	<script type="text/javascript" src="/rewards/Public/Ueditor/ueditor.all.min.js"></script>  
	<script type="text/javascript" src="/rewards/Public/Ueditor/lang/zh-cn/zh-cn.js"></script>  
	
</head>
<body>
  <div style="margin-top: 20px">
    
<div class="layui-form">
  <table class="layui-table">
    <colgroup>
      <col width="300">
      <col width="300">
      <col width="300">
      <col width="300">
      <col>
    </colgroup>
    <thead>
      <tr>
        <th>姓名</th>
        <th>时间</th>
        <th>状态</th>
        <th>操作</th>
      </tr> 
    </thead>
    <tbody>
      <?php if(is_array($masData)): foreach($masData as $key=>$vo): ?><tr>
        <td><?php echo ($vo["name"]); ?></td>
        <td><?php echo ($vo["time"]); ?></td>
        <td><?php echo ($vo["type"]); ?></td>
        <td> <a href="<?php echo U('Home/admin/xsStudent',array('id'=>$vo['id']));?>">查看</a> | <a href="<?php echo U('Home/admin/editReward',array('id'=>$vo['id']));?>">修改</a> | <a href="<?php echo U('Home/admin/delReward',array('id'=>$vo['id']));?>">删除</a></td>
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

        layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layer = layui.layer
  ,layedit = layui.layedit
  ,laydate = layui.laydate;
  
  //日期
  laydate.render({
    elem: '#date'
  });
  laydate.render({
    elem: '#date1'
  });
  
  //创建一个编辑器
  var editIndex = layedit.build('LAY_demo_editor');
 
  //自定义验证规则
  form.verify({
    title: function(value){
      if(value.length < 5){
        return '标题至少得5个字符啊';
      }
    }
    ,pass: [/(.+){6,12}$/, '密码必须6到12位']
    ,content: function(value){
      layedit.sync(editIndex);
    }
  });
  
  //监听指定开关
  form.on('switch(switchTest)', function(data){
    layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
      offset: '6px'
    });
    layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
  });
  
  //监听提交
  form.on('submit(demo1)', function(data){
    layer.alert(JSON.stringify(data.field), {
      title: '最终的提交信息'
    })
    return false;
  });
  
  
});
    </script>
  
</body>
</html>