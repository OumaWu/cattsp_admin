<?php
include("admin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <title>中国-东盟太阳能技术转移平台后台管理系统</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="./bootstrap/css/templatemo_main.css">
    <link href="./bootstrap/css/my.css" rel="stylesheet" type="text/css">
</head>
<body class="">
<?php include("./style/top.php"); ?>
<div id="main-wrapper">
    <div class="template-page-wrapper">
        <?php include("./style/side_nav.php"); ?>
        <!--/.navbar-collapse -->

        <div class="templatemo-content-wrapper">
            <div class="templatemo-content" style="border-left:1px solid #ddd; min-height:885px;">
                <ol class="breadcrumb  alert-info">
                    <li><a>Tips：请妥善保管管理员资料！</a></li>
                </ol>
                <h1>管理员资料</h1>
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" id="templatemo-preferences-form" action="./sql/changePassword.php" method="post">
                            <input type="hidden" value="<?=$_SESSION["id"];?>" name="id" id="id"/>
                            <div class="row">
                                <div class="col-md-6 margin-bottom-15">
                                    <label>用户名</label>
                                    <p class="form-control-static" id="username">
                                        <?=$_SESSION["username"];?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 margin-bottom-15">
                                    <label for="password">修改密码</label>
                                    <input type="password" class="form-control" name="password" id="password" value="">
                                </div>
                                <div class="col-md-6 margin-bottom-15"></div>
                            </div>
                            <div class="row templatemo-form-buttons">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" onclick="if(!confirm('是否修改密码？')) return false;">确定</button>
                                    <button type="reset" class="btn btn-default">重置</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("./style/foot.php"); ?>
<script src="./bootstrap/js/jquery.min.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script src="./bootstrap/js/templatemo_script.js"></script>
</body>
</html>