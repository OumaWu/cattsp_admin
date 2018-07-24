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
    <link rel="stylesheet" href="./bootstrap/css/tab.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body class="new">
<?php include("./style/top.php"); ?>
<div id="main-wrapper" style="min-height: 100%;">
    <div class="template-page-wrapper">
        <?php include("./style/side_nav.php"); ?>
        <!--/.navbar-collapse -->

        <div class="templatemo-content-wrapper">
            <div class="templatemo-content" style="border-left:1px solid #ddd ">
                <h1>账号列表</h1>
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget">
                            <div class="widget-list" id="admins">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th>编号</th>
                                            <th>账号名</th>
                                            <th>权限</th>
                                            <th>编辑</th>
                                            <th>删除</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        require('./sql/adminList.php');
                                        while ($admin = $result->fetch(PDO::FETCH_OBJ)) {
                                            ?>
                                            <tr>
                                                <td><?= $admin->id; ?></td>
                                                <td><?= $admin->username; ?></td>
                                                <td><?= $admin->level == 1 ? "超管" : "普通管理员"; ?></td>
                                                <td><a href="#" class="btn btn-default">编辑</a></td>
                                                <!--                                            <td>-->
                                                <!-- Split button -->
                                                <!--                                                <div class="btn-group">-->
                                                <!--                                                    <button type="button" class="btn btn-default">类别</button>-->
                                                <!--                                                    <button type="button" class="btn btn-default dropdown-toggle"-->
                                                <!--                                                            data-toggle="dropdown">-->
                                                <!--                                                        <span class="caret"></span>-->
                                                <!--                                                        <span class="sr-only">Toggle Dropdown</span>-->
                                                <!--                                                    </button>-->
                                                <!--                                                    <ul class="dropdown-menu" style="background-color:#FFFFFF; "-->
                                                <!--                                                        role="menu">-->
                                                <!--                                                        <li><a href="#">一类用户</a></li>-->
                                                <!--                                                        <li><a href="#">二类用户</a></li>-->
                                                <!---->
                                                <!--                                                    </ul>-->
                                                <!--                                                </div>-->
                                                <!--                                            </td>-->
                                                <td><a href="#" class="btn btn-primary">删除</a></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="widget-list" id="users">

                                <!-- 企业账号列表 -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th>编号</th>
                                            <th>用户名</th>
                                            <th>真实姓名</th>
                                            <th>所在地</th>
                                            <th>邮箱</th>
                                            <th>编辑</th>
                                            <th>删除</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        require('./sql/userList.php');
                                        while ($user = $result->fetch(PDO::FETCH_OBJ)) {
                                            ?>
                                            <tr>
                                                <td><?= $user->id; ?></td>
                                                <td><?= $user->accountname; ?></td>
                                                <td><?= $user->realname; ?></td>
                                                <td><?= $user->location; ?></td>
                                                <td><?= $user->email; ?></td>
                                                <td><a href="user_edit.php?id=<?= $user->id; ?>"
                                                       class="btn btn-default">编辑</a></td>
                                                <td><a href="./sql/deleteUser.php?id=<?= $user->id; ?>"
                                                       class="btn btn-primary"
                                                       onclick="confirm('确定要删除吗？')">删除</a></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <ul class="widget-tabs">
                                <!-- Omitting the end tag is valid HTML and removes the space in-between inline blocks. -->
                                <li class="widget-tab">
                                    <a href="#admins" class="widget-tab-link">管理员账号</a>
                                <li class="widget-tab">
                                    <a href="#users" class="widget-tab-link">企业账号</a>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <ul class="pagination pull-left">
                        <li class="active">
                            <a href="user_add.php" id="btn-add" class="btn btn-primary" style="cursor: pointer">添加</a>
                        </li>
                    </ul>
                    <ul class="pagination pull-right">
                        <li class="disabled"><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">2 <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">3 <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">4 <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">5 <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span
                                class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">确定注销登录?</h4>
                </div>
                <div class="modal-footer">
                    <a href="logout.php" class="btn btn-primary">是</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">否</button>
                </div>
            </div>
        </div>
    </div>


</div>
<?php include("./style/foot.php"); ?>
<script src="./bootstrap/js/jquery.min.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script src="./bootstrap/js/templatemo_script.js"></script>
<script>
    //绑定管理员账号表格和企业账号表格切换时添加按钮所对应的不同的添加页面
    $(window).bind('hashchange', function() {
        //code
        if(location.hash.slice(1).localeCompare("admins")==0) {
            $("#btn-add").attr("href","admin_add.php");
        }
        else {
            $("#btn-add").attr("href","user_add.php");
        }
    });
</script>
</body>
</html>