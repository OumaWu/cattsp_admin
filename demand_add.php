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

<body class="">
<? include("./style/top.php"); ?>
<div class="container" style="height: 100%">
    <table class="table-hober" width="90%" align="center" border="0" cellspacing="0" cellpadding="6">
        <tr>
            <td>
                <h1>添加需求</h1>
                <form id="form1" name="form1" method="post" action="./sql/insertDemand.php">
                    <table width="100%" border="0" cellpadding="6" cellspacing="0" class="grid">
                        <tr>
                            <th width="120" align="right">需求名称：</th>
                            <td><input name="title" value="" type="text" id="title"
                                       size="60"/></td>
                        </tr>
                        <tr>
                            <th align="right">需求企业：</th>
                            <td>
                                <input name="entreprise" value="" type="text" id="entreprise"
                                       size="60"/></td>
                        </tr>
                        <tr>
                            <th width="120" align="right">需求地点：</th>
                            <td><input name="location" value="" type="text" id="location" size="60"/></td>
                        </tr>
                        <tr>
                            <th width="120" align="right">联系邮箱：</th>
                            <td><input name="email" value="" type="text" id="email" size="60"/></td>
                        </tr>
                        <tr>
                            <th align="right">需求简介：</th>
                            <td>
                                <label for="description"></label>
                                <textarea name="description" id="description" rows="15" cols="100"
                                          style="overflow: scroll;"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th width="120" align="right">发布的用户账号：</th>
                            <td>
                                <select class="form-control" name="user_id" id="user_id" style="width: 150px;">
                                    <?
                                    require_once('./sql/selectUsername.php');
                                    while ($user = $result->fetch(PDO::FETCH_OBJ)) {
                                    ?>
                                    <option value="<?=$user->id;?>"><?=$user->accountname;?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th align="right">&nbsp;</th>
                            <td>
                                <input type="submit" class="btn btn-primary" name="button" id="button" value="提交"/>
                                <a class="btn btn-primary" href="demand_list.php">返回</a>
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
