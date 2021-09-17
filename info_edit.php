<?php
include("admin.php");
require_once('sql/selectNews.php');
$news = $result->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>中国-东盟太阳能技术转移平台后台管理系统</title>
    <link href="./bootstrap/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="./bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="./bootstrap/css/my.css"/>
</head>

<body class="new">
<?php include("./style/top.php"); ?>
<div class="container" style="height: 100%">
    <table class="table-hober" width="90%" align="center" border="0" cellspacing="0" cellpadding="6">
        <tr>
            <td>
                <form id="form1" name="form1" method="post" action="./sql/updateNews.php">
                    <input type="hidden" name="id" id="id" value="<?= $news->id; ?>">
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tr>
                            <td style="float:left"><a href="info_list.php">[返回]</a></td>
                            <td style="float:right"><a href="./sql/deleteNews.php?id=<?= $news->id; ?>"
                                                       onclick="if(!confirm('确认删除?')) return false;">[删除]</a>
                            </td>
                        </tr>
                    </table>
                    <br/>
                    <table width="100%" border="0" cellpadding="6" cellspacing="0" class="grid">
                        <tr>
                            <th align="right">新闻标题：</th>
                            <td>
                                <textarea style="width: 900px"
                                       name="title"
                                       id="title"
                                ><?= $news->title; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th align="right"><label for="category">类别：</label></th>
                            <td>
                                <select class="form-control" name="category" id="category" style="width: 200px;">
                                    <?php
                                    require_once('./sql/newsColumns.php');
                                    while ($res = $result->fetch(PDO::FETCH_OBJ)) {
                                        ?>
                                        <option value="<?= $res->id; ?>"
                                            <?php if ($res->title == $news->category) { ?>
                                                selected="selected"<?php } ?>><?= $res->title; ?></option>
                                    <?php } ?>
                                </select></td>
                        </tr>
                        <tr>
                            <th align="right">内容：</th>
                            <td><?php include("common/ededit.php"); ?></td>
                        </tr>

                        <tr>
                            <td style="float:left">
                                <div class="modal-footer">
                                    <input type="submit" name="button" id="button" value="提交"
                                           class="btn btn-primary"/>
                                </div>

                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
</div>
<?php include("./style/foot.php"); ?>
</body>
</html>
