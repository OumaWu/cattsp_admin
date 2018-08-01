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

        <form method="post" action="" class="form-horizontal" role="form" id="form_data"
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
                                    <input type="hidden" id="category_id" name="category_id" value="">
                                    <input type="hidden" id="action" name="action" value="insert">
                                </div>
                            </div>
                            <!--                            </form>-->

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                            </button>
                            <button type="submit" class="btn btn-primary" id="btn-submit">
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
                <h1 class="text-center">资讯栏目管理</h1>
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
                                                <a onclick="if(confirm('确定删除栏目？')) return deleteCategory(<?= $res->id; ?>);"
                                                   style="cursor: pointer;">[删除]</a>
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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"
                                    id="btn-add">
                                添加
                            </button>
                        </li>
                    </ul>

                    <!-- 分页链接 -->
                    <?= $page->displayPages(); ?>

                </div>
            </div>
        </div>
    </div>

</div>
<? include("./style/foot.php"); ?>
<script>
    function get_edit_info(id) {

        //修改id
        $('#category_id').val(id);
        //修改action值
        $('#action').val("update");

        $.ajax(
            {
                url: "./sql/newsColumn.php",
                data: {id: id},
                type: "POST",
                dataType: "JSON",
                success: function (result) {
                    // 赋值
                    $("#category").val(result.title);
                }
            });
    }

    // 提交表单
    function check_form() {
        var category = $.trim($('#category').val());
        var form_data = $('#form_data').serialize();
        var action = $('#action').val();

        if (!category) {
            alert('栏目名称不能为空！');
            return false;
        }
        else {
            // 异步提交数据到action/add_action.php页面
            $.ajax(
                {
                    url: "./sql/actionNewsCategory.php",
                    data: {"form_data": form_data, "action": action},
                    type: "POST",
                    dataType: "JSON",
                    success: function (result) {
                        if (result == 1) {
                            if (action == "insert")
                                alert('添加栏目成功！！');
                            else alert('修改栏目成功！！');

                        }
                        else if (result == -1) {
                            alert('没有接收到数据！！');
                        }
                        else {
                            alert('错误！！');
                        }
                    },
                    complete: function () {
                        location.reload(true);
                    }
                });
        }
        return true;
    }

    function deleteCategory(id) {
        if (!id) {
            alert('Error！');
            return false;
        }
        else {
            $.ajax(
                {
                    url: "./sql/actionNewsCategory.php",
                    data: {"id": id, "action": "delete"},
                    type: "POST",
                    dataType: "JSON",
                    success: function () {
                        alert('删除栏目成功！！');
                    },
                    complete: function () {
                        location.reload(true);
                    }
                });

            return true;
        }

    }

    //当点击添加按钮时清空文本框输入的栏目名称
    $(function () {
        $("#btn-add").on('click', function () {
            $("#category").val(null);
            $('#action').val("insert");
        });

        $("#btn-submit").on('click', function () {
            check_form();
        });
    });

</script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script src="./bootstrap/js/templatemo_script.js"></script>
</body>
</html>
