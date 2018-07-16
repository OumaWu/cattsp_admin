<?php

include("admin.php");
?>


<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <title>广西工业控制网路监测平台</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="./bootstrap/css/templatemo_main.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
                        <li><a href="index.php"><i class="fa fa-database"></i>帐户资料</a></li>
                    </ul>
                </li>

                <li style="border-bottom:1px solid #ddd" class="sub">
                    <a href="javascript:;">资讯管理
                        <div class="pull-right"><span class="caret"></span></div>
                    </a>
                    <ul class="templatemo-submenu">
                        <li><a href="#"><i class="fa fa-home"></i>栏目管理</a></li>
                        <li><a href="#"><i class="fa fa-home"></i>内容管理</a></li>
                    </ul>
                </li>

                <li style="border-bottom:1px solid #ddd "><a href="userlist.php">用户管理</a></li>
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
            <div class="templatemo-content" style="border-left:1px solid #ddd ">
                <ol class="breadcrumb  alert-info">
                    <li><a>Tips：请妥善保管管理员资料！</a></li>

                </ol>
                <h1>用户列表</h1>
                <p>Here goes users.</p>

                <div class="row margin-bottom-30">
                    <div class="col-md-12">
                        <ul class="nav nav-pills">
                            <li class="active"><a href="#">一类用户 <span class="badge">42</span></a></li>
                            <li><a href="#">二类用户<span class="badge">107</span></a></li>

                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="table-responsive">
                            <h4 class="margin-bottom-15">一类用户</h4>
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>姓名</th>
                                    <th>籍贯</th>
                                    <th>用户名</th>
                                    <th>邮箱</th>
                                    <th>编辑</th>
                                    <th>权限</th>
                                    <th>删除</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>John</td>
                                    <td>广西南宁</td>
                                    <td>@js</td>
                                    <td>a@company.com</td>
                                    <td><a href="#" class="btn btn-default">编辑</a></td>
                                    <td>
                                        <!-- Split button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default">类别</button>
                                            <button type="button" class="btn btn-default dropdown-toggle"
                                                    data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" style="background-color:#FFFFFF; " role="menu">
                                                <li><a href="#">一类用户</a></li>
                                                <li><a href="#">二类用户</a></li>

                                            </ul>
                                        </div>
                                    </td>
                                    <td><a href="#" class="btn btn-link">删除</a></td>
                                </tr>
                                <tr class="success">
                                    <td>2</td>
                                    <td>Bill</td>
                                    <td>广西南宁</td>
                                    <td>@bd</td>
                                    <td>bd@company.com</td>
                                    <td><a href="#" class="btn btn-default">编辑</a></td>
                                    <td>
                                        <!-- Split button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default">类别</button>
                                            <button type="button" class="btn btn-default dropdown-toggle"
                                                    data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">一类用户</a></li>
                                                <li><a href="#">二类用户</a></li>

                                            </ul>
                                        </div>
                                    </td>
                                    <td><a href="#" class="btn btn-link">删除</a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Marry</td>
                                    <td>广西南宁</td>
                                    <td>@mj</td>
                                    <td>mj@company.com</td>
                                    <td><a href="#" class="btn btn-default">编辑</a></td>
                                    <td>
                                        <!-- Split button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default">类别</button>
                                            <button type="button" class="btn btn-default dropdown-toggle"
                                                    data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">一类用户</a></li>
                                                <li><a href="#">二类用户</a></li>

                                            </ul>
                                        </div>
                                    </td>
                                    <td><a href="#" class="btn btn-link">删除</a></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Carry</td>
                                    <td>广西南宁</td>
                                    <td>@cl</td>
                                    <td>cl@company.com</td>
                                    <td><a href="#" class="btn btn-default">编辑</a></td>
                                    <td>
                                        <!-- Split button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default">类别</button>
                                            <button type="button" class="btn btn-default dropdown-toggle"
                                                    data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">一类用户</a></li>
                                                <li><a href="#">二类用户</a></li>

                                            </ul>
                                        </div>
                                    </td>
                                    <td><a href="#" class="btn btn-link">删除</a></td>
                                </tr>
                                <tr class="success">
                                    <td>5</td>
                                    <td>New</td>
                                    <td>广西南宁</td>
                                    <td>@nc</td>
                                    <td>nc@company.com</td>
                                    <td><a href="#" class="btn btn-default">编辑</a></td>
                                    <td>
                                        <!-- Split button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default">类别</button>
                                            <button type="button" class="btn btn-default dropdown-toggle"
                                                    data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">一类用户</a></li>
                                                <li><a href="#">二类用户</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td><a href="#" class="btn btn-link">删除</a></td>
                                </tr>
                                <tr class="danger">
                                    <td>6</td>
                                    <td>Martin</td>
                                    <td>广西南宁</td>
                                    <td>@me</td>
                                    <td>me@company.com</td>
                                    <td><a href="#" class="btn btn-default">编辑</a></td>
                                    <td>
                                        <!-- Split button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default">类别</button>
                                            <button type="button" class="btn btn-default dropdown-toggle"
                                                    data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">一类用户</a></li>
                                                <li><a href="#">二类用户</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td><a href="#" class="btn btn-link">删除</a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <h4 class="margin-bottom-15">二类用户</h4>
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>姓名</th>
                                    <th>籍贯</th>
                                    <th>用户名</th>
                                    <th>邮箱</th>
                                    <th>编辑</th>
                                    <th>权限</th>
                                    <th>删除</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>John</td>
                                    <td>广西南宁</td>
                                    <td>@jh</td>
                                    <td>a@company.com</td>
                                    <td><a href="#" class="btn btn-default">编辑</a></td>
                                    <td>
                                        <!-- Split button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default">类别</button>
                                            <button type="button" class="btn btn-default dropdown-toggle"
                                                    data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">一类用户</a></li>
                                                <li><a href="#">二类用户</a></li>

                                            </ul>
                                        </div>
                                    </td>
                                    <td><a href="#" class="btn btn-link">删除</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Bill</td>
                                    <td>广西南宁</td>
                                    <td>@bg</td>
                                    <td>bg@company.com</td>
                                    <td><a href="#" class="btn btn-default">编辑</a></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default">类别</button>
                                            <button type="button" class="btn btn-default dropdown-toggle"
                                                    data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">一类用户</a></li>
                                                <li><a href="#">二类用户</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td><a href="#" class="btn btn-link">删除</a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Authen</td>
                                    <td>广西南宁</td>
                                    <td>@aj</td>
                                    <td>aj@company.com</td>
                                    <td><a href="#" class="btn btn-default">编辑</a></td>
                                    <td>
                                        <!-- Split button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default">类别</button>
                                            <button type="button" class="btn btn-default dropdown-toggle"
                                                    data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">一类用户</a></li>
                                                <li><a href="#">二类用户</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td><a href="#" class="btn btn-link">删除</a></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Jesica</td>
                                    <td>广西南宁</td>
                                    <td>@jh</td>
                                    <td>jh@company.com</td>
                                    <td><a href="#" class="btn btn-default">编辑</a></td>
                                    <td>
                                        <!-- Split button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default">类别</button>
                                            <button type="button" class="btn btn-default dropdown-toggle"
                                                    data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">一类用户</a></li>
                                                <li><a href="#">二类用户</a></li>

                                            </ul>
                                        </div>
                                    </td>
                                    <td><a href="#" class="btn btn-link">删除</a></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Tom</td>
                                    <td>广西南宁</td>
                                    <td>@tg</td>
                                    <td>tg@company.com</td>
                                    <td><a href="#" class="btn btn-default">编辑</a></td>
                                    <td>
                                        <!-- Split button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default">类别</button>
                                            <button type="button" class="btn btn-default dropdown-toggle"
                                                    data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">一类用户</a></li>
                                                <li><a href="#">二类用户</a></li>

                                            </ul>
                                        </div>
                                    </td>
                                    <td><a href="#" class="btn btn-link">删除</a></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Book</td>
                                    <td>广西南宁</td>
                                    <td>@br</td>
                                    <td>br@company.com</td>
                                    <td><a href="#" class="btn btn-default">编辑</a></td>
                                    <td>
                                        <!-- Split button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default">类别</button>
                                            <button type="button" class="btn btn-default dropdown-toggle"
                                                    data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">一类用户</a></li>
                                                <li><a href="#">二类用户</a></li>

                                            </ul>
                                        </div>
                                    </td>
                                    <td><a href="#" class="btn btn-link">删除</a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
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
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
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
</div>
<?php include("./style/foot.php"); ?>
<script src="./bootstrap/js/jquery.min.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script src="./bootstrap/js/templatemo_script.js"></script>
</body>
</html>