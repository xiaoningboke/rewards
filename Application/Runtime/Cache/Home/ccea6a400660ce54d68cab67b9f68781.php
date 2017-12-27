<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>学生奖罚信息管理</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="/rewards/Public/login/css/style.css" tppabs="css/style.css" />
<style>
body{height:100%;background:#16a085;overflow:hidden;}
canvas{z-index:-1;position:absolute;}
</style>
<script src="/rewards/Public/login/js/jquery.js"></script>
<script src="/rewards/Public/login/js/verificationNumbers.js" tppabs="js/verificationNumbers.js"></script>
<script src="/rewards/Public/login/js/Particleground.js" tppabs="js/Particleground.js"></script>
<script>
$(document).ready(function() {
  //粒子背景特效
  $('body').particleground({
    dotColor: '#5cbdaa',
    lineColor: '#5cbdaa'
  });
  //验证码
  createCode();
  //测试提交，对接程序删除即可
  // $(".submit_btn").click(function(){
	 //  location.href="javascrpt:;"/*tpa=http://***index.html*/;
	 //  });
});
</script>
</head>
<body>
<dl class="admin_login">
 <dt>
  <strong>学生奖罚信息管理</strong>
  <em>Management System</em>
 </dt>
 <form  id="login" method="post" action="<?php echo U('Home/Index/login');?>">
 <dd class="sh_icon">
  <select name="identify" placeholder="账号" class="login_txtbx" id="login_sf">
  <option value="0">管理员</option>
  <option value="1">班主任</option>
  <option value="2">学生</option>
</select>
 </dd>
 <dd class="user_icon">
  <input type="text" name="number" placeholder="账号" class="login_txtbx"/>
 </dd>
 <dd class="pwd_icon">
  <input type="password" name="password" placeholder="密码" class="login_txtbx"/>
 </dd>
 <dd>
  <input type="submit" value="立即登陆" class="submit_btn"/>
 </dd>
 </form>
 <dd>
  <p>© 2017-2018 千行 版权所有</p>
  <p>孙肖宁 牛亚蒙制作</p>
 </dd>
</dl>
</body>
</html>