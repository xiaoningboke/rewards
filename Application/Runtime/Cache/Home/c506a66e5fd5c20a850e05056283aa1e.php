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
    <div class="layui-layout layui-layout-admin kit-layout-admin">
        <div class="layui-header">
            <div class="layui-logo">管理员栏目</div>
            <div class="layui-logo kit-logo-mobile">K</div>
            <ul class="layui-nav layui-layout-left kit-nav">
                <!-- <li class="layui-nav-item"><a href="javascript:;" id="pay"><i class="fa fa-gratipay" aria-hidden="true"></i> 捐赠我</a></li> -->
                <li class="layui-nav-item">
                    <a href="javascript:;">其它系统</a>
                    <dl class="layui-nav-child">
                        <dd><a href="http://101.132.78.78" target="_blank">量化管理系统</a></dd>
                        <dd><a href="http://172.14.0.144/qjia/dl/dl.html" target="_blank">请假系统</a></dd>
                        <dd><a href="http://172.16.0.143/JudgeOnline/" target="_blank">码到程工交互学习平台</a></dd>
                    </dl>
                </li>
            </ul>
            <ul class="layui-nav layui-layout-right kit-nav">
                <li class="layui-nav-item">
                    <a href="javascript:;">
                        <img src="http://m.zhengjinfan.cn/images/0.jpg" class="layui-nav-img"> 管理员
                    </a>
                    <!-- <dl class="layui-nav-child">
                        <dd><a href="javascript:;">基本资料</a></dd>
                        <dd><a href="javascript:;">安全设置</a></dd>
                    </dl> -->
                </li>
                <li class="layui-nav-item"><a href="<?php echo U('Home/Index/exits');?>"><i class="fa fa-sign-out" aria-hidden="true"></i> 注销</a></li>
            </ul>
        </div>

        <div class="layui-side layui-bg-black kit-side">
            <div class="layui-side-scroll">
                <div class="kit-side-fold"><i class="fa fa-navicon" aria-hidden="true"></i></div>
                <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
                <ul class="layui-nav layui-nav-tree" lay-filter="kitNavbar" kit-navbar>
                    <li class="layui-nav-item">
                        <a class="" href="javascript:;"><i class="fa fa-plug" aria-hidden="true"></i><span> 个人信息</span></a>
                        <dl class="layui-nav-child">
                            <dd>
                                <a href="javascript:;" kit-target data-options="{url:'personal.html',icon:'&#xe6c6;',title:'信息修改',id:'1'}">
                                    <i class="layui-icon">&#xe6c6;</i><span> 信息修改</span></a>
                            </dd>
                            <dd>
                                <a href="javascript:;" data-url="password.html" data-icon="fa-user" data-title="密码修改" kit-target data-id='2'><i class="fa fa-user" aria-hidden="true"></i><span> 密码修改</span></a>
                            </dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item">
                        <a href="javascript:;"><i class="fa fa-plug" aria-hidden="true"></i><span> 奖惩信息</span></a>
                        <dl class="layui-nav-child">
                            <dd><a href="javascript:;" kit-target data-options="{url:'reward.html',icon:'&#xe658;',title:'奖惩信息',id:'3'}"><i class="layui-icon">&#xe658;</i><span> 奖惩信息</span></a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>
        <div class="layui-body" id="container">
            <!-- 内容主体区域 -->
            <div style="padding: 15px;">主体内容加载中,请稍等...</div>
        </div>

        <div class="layui-footer">
            <!-- 底部固定区域 -->
            2017 &copy;
            <a href="http://www.sunxiaoning.com/">孙肖宁  牛亚蒙制作</a>

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