<?php
include("admin.php");
require_once('sql/selectAdmin.php');
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
<?php include("./style/top.php"); ?>
<div class="container" style="height: 100%">
    <table class="table-hober" width="90%" align="center" border="0" cellspacing="0" cellpadding="6">
        <tr>
            <td>
                <h1>添加企业账号</h1>
                <form id="form1" name="form1" method="post" action="./sql/updateAdmin.php"
                      enctype="multipart/form-data">
                    <table width="100%" border="0" cellpadding="6" cellspacing="0" class="grid">
                        <input type="hidden" id="id" name="id" value="<?= $res->id; ?>"/>
                        <input type="hidden" id="old_password" name="old_password" value="<?= $res->password; ?>"/>
                        <tr>
                            <th width="120" align="right">账号名：</th>
                            <td>
                                <label for="username">
                                    <input name="username" value="<?= $res->username; ?>" type="text" id="username" size="60"/>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th width="120" align="right"><span style="color: red"><b>*</b></span>密码</th>
                            <td>
                                <input type="password" name="password" id="password" size="60"/>
                                <ol class="breadcrumb  alert-info">
                                    <li><a>Tips：如不填，则保持原有密码</a></li>
                                </ol>
                            </td>
                        </tr>
                        <tr>
                            <th width="120" align="right">权限：</th>
                            <td>
                                <!-- Split button -->
                                <label for="level">
                                    <select class="form-control" name="level" id="level" style="width: 120px;">
                                        <option value="">请选择权限</option>
                                        <option value="1" <?=$res->level == 1 ? "selected" : ""; ?>>超级管理员</option>
                                        <option value="2" <?=$res->level == 2 ? "selected" : ""; ?>>普通管理员</option>
                                    </select>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th align="right">&nbsp;</th>
                            <td>
                                <input type="submit" class="btn btn-primary" name="button" id="button" value="提交"/>
                                <a class="btn btn-primary" href="user_list.php#admins">返回</a>
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
