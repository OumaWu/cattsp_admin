<?
include("admin.php");
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
<? include("./style/top.php"); ?>
<div class="container" style="height: 100%">
    <table class="table-hober" width="90%" align="center" border="0" cellspacing="0" cellpadding="6">
        <tr>
            <td>
                <form id="form1" name="form1" method="post" action="sql/insertNews.php">
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tr>
                            <td style="float:left"><a href="info_list.php">[返回]</a></td>
                        </tr>
                    </table>
                    <br/>
                    <table width="100%" border="0" cellpadding="6" cellspacing="0" class="grid">
                        <tr>
                            <th width="120" align="right">新闻标题：</th>
                            <td><input name="title" type="text" id="title" size="60"/></td>
                        </tr>
                        <tr>
                            <th width="120" align="right"><label for="category">类别</label></th>
                            <td>
                                <select name="category" id="category" style="height: 20px;">
                                    <?php
                                    require_once('./sql/newsColumns.php');
                                    while ($res = $result->fetch(PDO::FETCH_OBJ)) {
                                        ?>
                                        <option value="<?= $res->id; ?>"><?= $res->title; ?></option>
                                    <?php } ?>
                                </select>

                            </td>
                        </tr>
                        <tr>
                            <th align="right">内容：</th>
                            <td><? include("common/edadd.php"); ?></td>
                        </tr>
                        <tr>
                            <th align="right">&nbsp;</th>
                            <td><input type="submit" name="button" id="button" value="提交"/></td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
</div>
<? include("./style/foot.php"); ?>
</body>
</html>
