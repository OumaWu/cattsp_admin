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
</head>
<body class="new">
<?php include("./style/top.php"); ?>
<div id="main-wrapper" style="min-height: 100%">
    <div class="template-page-wrapper">
        <?php include("./style/side_nav.php"); ?>
        <!--/.navbar-collapse -->
        <div class="templatemo-content-wrapper">
            <div class="templatemo-content" style="border-left:1px solid #ddd; min-height:885px;">
                <h1 class="text-center">资讯内容管理</h1>
                <div class="container" style="padding:0;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="6">
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
                                            <td><?= !empty($res->category) ? $res->category : "无"; ?></td>
                                            <td><a href="info_view.php?id=<?= $res->id; ?>"><?= $res->title; ?></a></td>
                                            <td><?= $res->date; ?></td>
                                            <td align="center">
                                                <a href="info_edit.php?id=<?= $res->id; ?>">[修改]</a>
                                                <a href="./sql/deleteNews.php?id=<?= $res->id; ?>"
                                                   onclick="if(!confirm('确认删除?')) return false;">[删除]</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <ul class="pagination pull-left">
                        <li class="active">
                            <a href="info_add.php" class="btn btn-primary">添加</a>
                        </li>
                    </ul>
                    <ul class="pagination pull-right">
<!--                        <li class="disabled"><a href="#">&laquo;</a></li>-->

<!--                        --><?php
//
//                        $page->pageCount; ?>
                        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">2 <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<? include("./style/foot.php"); ?>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script src="./bootstrap/js/templatemo_script.js"></script>
</body>
</html>
