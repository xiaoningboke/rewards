<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>学生栏目</title>
    <link rel="stylesheet" href="/rewards/Public/static/plugins/layui/css/layui.css" media="all">
    <link rel="stylesheet" type="text/css" href="http://cdn.bootcss.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/rewards/Public/static/build/css/app.css" media="all">
</head>
<body>
	<div class="layui-form">
  <table class="layui-table">
    <colgroup>
      <col width="400">
      <col width="150">
      <col width="200">
      <col>
    </colgroup>
    <thead>
      <tr>
        <th>标题</th>
        <th>时间</th>
        <th>状态</th>
      </tr> 
    </thead>
    <tbody>
      <tr>
        <td>贤心</td>
        <td>汉族</td>
        <td>1989-10-14</td>
      </tr>
      <tr>
        <td>张爱玲</td>
        <td>汉族</td>
        <td>1920-09-30</td>
      </tr>
      <tr>
        <td>Helen Keller</td>
        <td>拉丁美裔</td>
        <td>1880-06-27</td>
      </tr>
      <tr>
        <td>岳飞</td>
        <td>汉族</td>
        <td>1103-北宋崇宁二年</td>
      </tr>
      <tr>
        <td>孟子</td>
        <td>华夏族（汉族）</td>
        <td>公元前-372年</td>
      </tr>
    </tbody>
  </table>
</div>
	<script type="text/javascript">
        var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
        document.write(unescape("%3Cspan id='cnzz_stat_icon_1264021086'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s22.cnzz.com/z_stat.php%3Fid%3D1264021086%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));
    </script>
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