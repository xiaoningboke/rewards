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
<style type="text/css">
	#info{
		position:relative;z-index:0;
	}
</style>
<body>
  <div style="margin-top: 20px">
  <form class="layui-form" method="post" action="<?php echo U('Home/Admin/editRewards');?>">
    <input type="hidden" name="id" value="<?php echo ($masData["id"]); ?>">
  <div class="layui-form-item">
    <label class="layui-form-label">标题：</label>
     <div class="layui-input-block">
      <input name="" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input" type="text" value="<?php echo ($masData["title"]); ?>"  disabled="">
      <input type="hidden" name="title" value="<?php echo ($masData["title"]); ?>">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">姓名：</label>
    <div class="layui-input-inline">
        <input name="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input" type="text" value="<?php echo ($masData["name"]); ?>" disabled="">
      <input type="hidden" name="name" value="<?php echo ($masData["name"]); ?>">

    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">日期：</label>
      <div class="layui-input-inline">
        <input name="time" id="date" lay-verify="date" placeholder="年-月-日" autocomplete="off" class="layui-input" type="text" value="<?php echo ($masData["time"]); ?>"  disabled="">
      <input type="hidden" name="time" value="<?php echo ($masData["time"]); ?>">

      </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">状态：</label>
    <div class="layui-input-inline">
         <select name="type" lay-filter="aihao">
	        <option value=""></option>
	        <option value="管理员通过">管理员通过</option>
	        <option value="管理员不通过">管理员不通过</option>
	      </select>
    </div>
  </div>
<div class="layui-form-item">
    <label class="layui-form-label">内容：</label>
    <div class="layui-input-inline">
  <textarea name="info" id="info" style="width:1024px;height:500px;"  ><?php echo ($masData["encouragemess"]); ?></textarea>  
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