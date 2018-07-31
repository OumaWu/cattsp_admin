<?
include("admin.php");
require_once('sql/selectQuestion.php');
$res = $result->fetch(PDO::FETCH_OBJ);
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

<body class="">
<? include("./style/top.php"); ?>
<div class="container" style="min-height: 100%">
    <table class="table-hober" width="90%" align="center" border="0" cellspacing="0" cellpadding="6">
        <tr>
            <td>
                <h1>编辑需求</h1>
                <form id="form1" name="form1" method="post" action="./sql/updateQuestion.php">
                    <table width="100%" border="0" cellpadding="6" cellspacing="0" class="grid">
                        <input type="hidden" id="q_id" name="q_id" value="<?= $res->q_id; ?>"/>
                        <tr>
                            <th width="120" align="right">编号：</th>
                            <td><?= $res->q_id; ?></td>
                        </tr>
                        <tr>
                            <th width="120" align="right">企业账号：</th>
                            <td><?= $res->u_account; ?></td>
                        </tr>
                        <tr>
                            <th width="120" align="right">专家账号：</th>
                            <td><?= $res->spe_account; ?></td>
                        </tr>
                        <tr>
                            <th width="120" align="right">问题名称：</th>
                            <td><input name="title" value="<?= $res->title; ?>" type="text" id="title"
                                       size="60"/></td>
                        </tr>
                        <tr>
                            <th align="right">问题内容：</th>
                            <td>
                                <label for="description">
                                <textarea name="content" id="content" rows="15" cols="100"
                                          style="overflow: scroll;"><?= $res->content; ?></textarea></label>
                            </td>
                        </tr>
                        <tr>
                            <th align="right">&nbsp;</th>
                            <td>
                                <input type="submit" class="btn btn-primary" name="button" id="button" value="提交"/>
                                <a class="btn btn-primary" href="question_list.php">返回</a>
                            </td>
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
