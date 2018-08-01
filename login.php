<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>中国-东盟太阳能技术转移平台后台管理系统</title>
<link href="bootstrap/css/my.css?v=2" rel="stylesheet">
<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container" id="login-ct">
  <div class="row in">
    <div id="con">
      <div class="form-signin">
        <form id="form1" class="form-signin" name="form1" method="post" action="./sql/signin.php">
          <div class="control-group">
            <label class="control-label"   for="username">用户名</label>
            <div  class="controls">
              <input type="text" class="form-control" id="username" name="username" placeholder="用户名">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="password">密码</label>
            <div class="controls">
              <input type="password" class="form-control" id="password" name="password" placeholder="密码">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="checkword">验证码</label>
            <div class="controls">
              <input type="text" class="form-control" id="checkword" name="checkword" placeholder=验证码>
              <img id="checkpic"  style="padding-bottom:3px;" onClick="this.src='./sql/yz.php?rand='+Math.random();" src="./sql/yz.php"/> </div>
          </div>
          <div class="control-group">
            <div class="controls bt-pad">
              <button type="submit" class="btn btn-default">登录</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<p style="display:block; text-align:center; margin-top:20px; color:#666666;">&copy;copyright  1980-2017 广西科学院应用物理研究所</p>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="jquery/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>