<?php
include("admin.php");
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <title>中国-东盟太阳能技术转移平台后台管理系统</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="./bootstrap/css/templatemo_main.css">
    <link href="./bootstrap/css/my.css" rel="stylesheet" type="text/css">
    <!--    <style>-->
    <!--        .templatemo-sidebar-menu li {-->
    <!--            border-bottom: 1px solid #ddd;-->
    <!--        }-->
    <!--        .templatemo-sidebar-menu li {-->
    <!--            border-bottom: 1px solid #ddd;-->
    <!--        }-->
    <!--    </style>-->
</head>
<body class="new">
<?php include("./style/top.php"); ?>
<div id="main-wrapper">
    <div class="template-page-wrapper">
        <div class="navbar-collapse collapse templatemo-sidebar" style=" margin-left:0;">
            <ul class="templatemo-sidebar-menu">

                <li style="border-bottom:1px solid #ddd" class="sub">
                    <a href="javascript:;">管理中心
                        <div class="pull-right"><span class="caret"></span></div>
                    </a>
                    <ul class="templatemo-submenu">
                        <li><a href="index.php"><i class="fa fa-database"></i>用户资料</a></li>
                        <li><a href="user_list.php"><i class="fa fa-database"></i>账号管理</a></li>
                        <li><a href="tech_list.php"><i class="fa fa-database"></i>技术成果管理</a></li>
                        <li><a href="demand_list.php"><i class="fa fa-database"></i>企业需求管理</a></li>
                        <li><a href="expert_list.php"><i class="fa fa-database"></i>专家账号管理</a></li>
                        <li><a href="question_list.php"><i class="fa fa-database"></i>用户提问管理</a></li>
                    </ul>
                </li>

                <li style="border-bottom:1px solid #ddd" class="sub">
                    <a href="javascript:;">资讯管理
                        <div class="pull-right"><span class="caret"></span></div>
                    </a>
                    <ul class="templatemo-submenu">
                        <li><a href="info_category.php"><i class="fa fa-home"></i>栏目管理</a></li>
                        <li><a href="info_list.php"><i class="fa fa-home"></i>内容管理</a></li>
                    </ul>
                </li>

                <li style="border-bottom:1px solid #ddd" class="sub">
                    <a href="javascript:;">政策法规管理
                        <div class="pull-right"><span class="caret"></span></div>
                    </a>
                    <ul class="templatemo-submenu">
                        <li><a href="policy_category.php"><i class="fa fa-home"></i>栏目管理</a></li>
                        <li><a href="policy_list.php"><i class="fa fa-home"></i>内容管理</a></li>
                    </ul>
                </li>

                <li style="border-bottom:1px solid #ddd "><a href="javascript:void(0);" onclick="logout();">注销登录</a>
                </li>
                <script>
                    function logout() {
                        var con = confirm("确定要注销吗？");
                        if (con)
                            location.href = "logout.php";
                    }
                </script>
            </ul>
        </div>
        <!--/.navbar-collapse -->

        <div class="templatemo-content-wrapper">
            <div class="templatemo-content" style="border-left:1px solid #ddd; min-height:885px;">
                <ol class="breadcrumb  alert-info">
                    <li><a>Tips：请妥善保管管理员资料！</a></li>
                </ol>
                <h1>用户资料</h1>
                <p class="margin-bottom-15">用户详细信息添加/修改</p>
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" id="templatemo-preferences-form">
                            <div class="row">
                                <div class="col-md-6 margin-bottom-15">
                                    <label>用户名</label>
                                    <p class="form-control-static" id="username">admin</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 margin-bottom-15">
                                    <label>电子邮箱</label>
                                    <p class="form-control-static" id="email">admin@company.com</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 margin-bottom-15">
                                    <label for="currentPassword">密码</label>
                                    <input type="password" class="form-control" id="currentPassword" value="********"
                                           disabled>
                                    <button type="submit" class="btn btn-default">修改密码</button>
                                </div>
                                <div class="col-md-6 margin-bottom-15"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 margin-bottom-15">
                                    <label for="firstName" class="control-label">姓名</label>
                                    <input type="text" class="form-control" id="firstName" value="管理员">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 margin-bottom-15">
                                    <label for="lastName" class="control-label">创建日期</label>
                                    <input class="form-control" id="lastName" value="2015.1.1" disabled="disabled">
                                </div>
                                <div class="col-md-6 margin-bottom-15"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 margin-bottom-15">
                                    <label for="password_1">联系电话</label>
                                    <input type="password" class="form-control" id="password_1"
                                           placeholder="151********">
                                </div>
                                <div class="col-md-6 margin-bottom-15"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 margin-bottom-15">
                                    <label for="password_2">身份证明</label>
                                    <input type="password" class="form-control" id="password_2"
                                           placeholder="410741741***">
                                </div>
                                <div class="col-md-6 margin-bottom-15"></div>
                            </div>
                            <div class="row templatemo-form-buttons">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">确定</button>
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