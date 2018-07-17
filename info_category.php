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
    <script src="./js/jquery-3.3.1.min.js"></script>
    <link href="./bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <script src="./jquery/gobal.js" type="text/javascript"></script>
    <title>中国-东盟太阳能技术转移平台后台管理系统</title>
</head>
<body class="new">
<?php include("./style/top.php"); ?>
<div id="main-wrapper">
    <div class="template-page-wrapper">
        <?php include("./style/side_nav.php"); ?>
        <!--/.navbar-collapse -->

        <form method="post" action="./sql/insertNewsCategory.php" class="form-horizontal" role="form" id="form_data"
              style="margin: 20px;">

            <!-- 模态框（Modal） -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                ×
                            </button>
                            <br>
                        </div>
                        <div class="modal-body">

                            <!--                            <form class="form-horizontal" role="form">-->
                            <div class="form-group">
                                <label for="category" class="col-sm-3 control-label">栏目名称</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="category" id="category"
                                           placeholder="栏目名称">
                                </div>
                            </div>
                            <!--                            </form>-->

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                            </button>
                            <button type="submit" class="btn btn-primary">
                                提交
                            </button>
                            <span id="tip"> </span>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal -->
            </div>
        </form>

        <div class="templatemo-content-wrapper">
            <div class="templatemo-content" style="border-left:1px solid #ddd; min-height:885px;">
                <div class="modal-header" align="right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        添加
                    </button>
                </div>
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
                                        <th>栏目名称</th>
                                        <th>操作</th>
                                    </tr>
                                    <?php
                                    require_once('./sql/newsColumns.php');
                                    while ($res = $result->fetch(PDO::FETCH_OBJ)) {
                                        ?>
                                        <tr>
                                            <td><?= $res->id; ?></td>
                                            <td><?= $res->title; ?></td>
                                            <td align="center">
                                                <a
                                                   onclick="get_edit_info(<?= $res->id; ?>);"
                                                   data-toggle="modal"
                                                   style="cursor: pointer;"
                                                   data-target="#myModal">[修改]</a>
                                                <a href="./sql/delete_news_category.php?id=<?= $res->id; ?>"
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
<script>
    function get_edit_info(id) {
        $.ajax(
            {
                url: "./sql/newsColumn.php",
                data:{id:id},
                type: "POST",
                dataType:"JSON",
                success:function(result)
                {
                    // 解析json数据
                    // var data = $.parseJSON(result);

                    // 赋值
                    $("#category").val(result.title);

                }
            });
    }
</script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script src="./bootstrap/js/templatemo_script.js"></script>
</body>
</html>
