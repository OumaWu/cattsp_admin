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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body class="">
<?php include("./style/top.php"); ?>
<div id="main-wrapper" style="min-height: 100%">
    <div class="template-page-wrapper">
        <?php include("./style/side_nav.php"); ?>
        <!--/.navbar-collapse -->

        <div class="templatemo-content-wrapper">
            <div class="templatemo-content" style="border-left:1px solid #ddd ">
                <h1>咨询问题列表</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>编号</th>
                            <th>问题名称</th>
                            <th>提问账号</th>
                            <th>用户姓名</th>
                            <th>专家账号</th>
                            <th>专家姓名</th>
                            <th>发布时间</th>
                            <th>回复列表</th>
                            <th>编辑</th>
                            <th>删除</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        require_once('./sql/questionList.php');
                        while ($res = $result->fetch(PDO::FETCH_OBJ)) {
                            ?>
                            <tr>
                                <td><?= $res->q_id; ?></td>
                                <td><?= $res->title; ?></td>
                                <td><?= $res->u_account; ?></td>
                                <td><?= $res->user; ?></td>
                                <td><?= $res->spe_account; ?></td>
                                <td><?= $res->expert; ?></td>
                                <td><?= $res->time; ?></td>
                                <td><a href="./reply_list.php?q_id=<?= $res->q_id; ?>&title=<?= $res->title; ?>"
                                       class="btn btn-default">查看</a>
                                </td>
                                <td><a href="./question_edit.php?q_id=<?= $res->q_id; ?>" class="btn btn-default">编辑</a>
                                </td>
                                <td><a href="./sql/deleteQuestion.php?q_id=<?= $res->q_id; ?>" class="btn btn-primary"
                                       onclick="if(!confirm('删除后该问题下的回复将被一并删除，确定要删除吗？')) return false;">删除</a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <!-- 分页链接 -->
                    <?= $page->displayPages(); ?>
                </div>
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


<?php include("./style/foot.php"); ?>
<script src="./bootstrap/js/jquery.min.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script src="./bootstrap/js/templatemo_script.js"></script>
</body>
</html>