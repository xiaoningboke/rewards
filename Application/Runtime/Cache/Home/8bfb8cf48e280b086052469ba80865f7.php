<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>table模块快速使用</title>
    <link rel="stylesheet" href="./plugins/layui/css/layui.css" media="all">
</head>

<body>

    <table class="layui-table" lay-data="{height:315, url:'table.json', page:true, id:'test',height: 'full-25'}" lay-filter="test" id="test">
        <thead>
            <tr>
                <th lay-data="{field:'id', width:80, sort: true}">ID</th>
                <th lay-data="{field:'username', width:80}">用户名</th>
                <th lay-data="{field:'sex', width:80, sort: true}">性别</th>
                <th lay-data="{field:'city', width:80}">城市</th>
                <th lay-data="{field:'sign', width:177}">签名</th>
                <th lay-data="{field:'experience', width:80, sort: true}">积分</th>
                <th lay-data="{field:'score', width:80, sort: true}">评分</th>
                <th lay-data="{field:'classify', width:80}">职业</th>
                <th lay-data="{field:'wealth', width:135, sort: true}">财富</th>
            </tr>
        </thead>
    </table>

    <script src="./plugins/layui/layui.js"></script>
    <script>
        layui.use('table', function() {
            var table = layui.table;
        });
    </script>
</body>

</html>