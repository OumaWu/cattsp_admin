<?php
include("admin.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="./bootstrap/css/templatemo_main.css?v">
    <link href="./bootstrap/css/my.css" rel="stylesheet" media="screen"/>
    <!-- Bootstrap -->
    <script src="./jquery/jquery.min.js"></script>
    <link href="./bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <script src="./bootstrap/js/bootstrap.js"></script>
    <script src="./jquery/gobal.js" type="text/javascript"></script>
    <title>中国-东盟太阳能技术转移平台后台管理系统</title>
    <?php include("./jquery/easyui/style/easyui.php"); ?>
    <style>
        .class1 {
            text-align: center;
        }
    </style>
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
                <div class="container" style="padding:0;">
                    <table width="85%" border="0" cellspacing="0" cellpadding="6">
                        <tr>
                            <td height="auto" valign="top">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" class="grid">
                                </table>
                                <br/>


                                <table id="list" cellpadding="6" cellspacing="0" class="table table-hover">
                                    <tr>
                                        <th>编号</th>
                                        <th>类别</th>
                                        <th>标题</th>
                                        <th>最近更新</th>
                                        <th>操作</th>
                                    </tr>
                                    <?php
                                    require_once('./sql/selectNewsList.php');
                                    while ($res = $result->fetch(PDO::FETCH_OBJ)) {
                                        ?>
                                        <tr>
                                            <td><?= $res->id; ?></td>
                                            <td><?= $res->category; ?></td>
                                            <td><a href="info_view.php?id=<?= $res->id; ?>"><?= $res->title; ?></a></td>
                                            <td><?= $res->date; ?></td>
                                            <td align="center">
                                                <a href="info_edit.php?id=<?= $res->id; ?>">[修改]</a>
                                                <a href="delete.php?id=<?= $res->id; ?>"
                                                   onclick="if(!confirm('确认删除?')) return false;">[删除]</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<? include("./style/foot.php"); ?>
<!--弹出窗口-->

<script language="javascript">
    $("td:contains('A')").parent('.class1').attr("class", "success");
    $("td:contains('B')").parent('.class1').attr("class", "info");
    $("td:contains('C')").parent('.class1').attr("class", "warning");
    $("td:contains('D')").parent('.class1').attr("class", "danger");
    $("td:contains('E')").parent('.class1').attr("class", "badly");
    $("#all").bind('click', function () {
        $("#list tr").css("display", "table-row")
    });
    $("#success").bind('click', function () {
        $("#list tr").css("display", "table-row")
        $("#list tr").not('.success').toggle()
    });
    $("#info").bind('click', function () {

        $("#list tr").css("display", "table-row")
        $("#list tr").not('.info').toggle()
    });
    $("#warning").bind('click', function () {

        $("#list tr").css("display", "table-row")
        $("#list tr").not('.warning').toggle()
    });
    $("#danger").bind('click', function () {

        $("#list tr").css("display", "table-row")
        $("#list tr").not('.danger').toggle()
    });
    $("#badly").bind('click', function () {

        $("#list tr").css("display", "table-row")
        $("#list tr").not('.badly').toggle()
    });


    function dlg(title, url) {
        $(document).find("#dlgfrm").attr("src", url);
        $("#dlg").dialog("open").dialog('setTitle', title);
    }
</script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script src="./bootstrap/js/templatemo_script.js"></script>
</body>
</html>
