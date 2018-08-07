<?php
include("admin.php");
require_once('sql/selectDemand.php');
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
                <h1>编辑需求</h1>
                <form id="form1" name="form1" method="post" action="./sql/updateDemand.php">
                    <table width="100%" border="0" cellpadding="6" cellspacing="0" class="grid">
                        <input type="hidden" id="id" name="id" value="<?= $res->id; ?>"/>
                        <tr>
                            <th width="120" align="right">需求名称：</th>
                            <td><input name="title" value="<?= $res->title; ?>" type="text" id="title"
                                       size="60"/></td>
                        </tr>
                        <tr>
                            <th align="right">需求企业：</th>
                            <td>
                                <input name="entreprise" value="<?= $res->entreprise; ?>" type="text" id="entreprise"
                                       size="60"/></td>
                        </tr>
                        <tr>
                            <th width="120" align="right">需求地点：</th>
                            <td><label>
                                    <select name="location" class="form-control" id="location" style="width: 110px;">
                                        <option value="">-请选择-</option>
                                        <option value="北京市">北京市</option>
                                        <option value="天津市">天津市</option>
                                        <option value="河北省">河北省</option>
                                        <option value="山西省">山西省</option>
                                        <option value="内蒙古">内蒙古</option>
                                        <option value="辽宁省">辽宁省</option>
                                        <option value="吉林省">吉林省</option>
                                        <option value="黑龙江">黑龙江</option>
                                        <option value="上海市">上海市</option>
                                        <option value="江苏省">江苏省</option>
                                        <option value="浙江省">浙江省</option>
                                        <option value="安徽省">安徽省</option>
                                        <option value="福建省">福建省</option>
                                        <option value="江西省">江西省</option>
                                        <option value="山东省">山东省</option>
                                        <option value="河南省">河南省</option>
                                        <option value="湖北省">湖北省</option>
                                        <option value="湖南省">湖南省</option>
                                        <option value="广东省">广东省</option>
                                        <option value="广西省">广西省</option>
                                        <option value="海南省">海南省</option>
                                        <option value="重庆市">重庆市</option>
                                        <option value="四川省">四川省</option>
                                        <option value="贵州省">贵州省</option>
                                        <option value="云南省">云南省</option>
                                        <option value="西藏">西藏</option>
                                        <option value="陕西省">陕西省</option>
                                        <option value="甘肃省">甘肃省</option>
                                        <option value="青海省">青海省</option>
                                        <option value="宁夏省">宁夏省</option>
                                        <option value="新疆">新疆</option>
                                        <option value="台湾省">台湾省</option>
                                        <option value="香港">香港</option>
                                        <option value="澳门">澳门</option>
                                        <option value="国外">国外</option>
                                    </select>
                                </label></td>
                        </tr>
                        <tr>
                            <th width="120" align="right">联系邮箱：</th>
                            <td><input name="email" value="<?= $res->email; ?>" type="text" id="email" size="60"/></td>
                        </tr>
                        <tr>
                            <th align="right">需求简介：</th>
                            <td>
                                <label for="description">
                                <textarea name="description" id="description" rows="15" cols="100"
                                          style="overflow: scroll;"><?= $res->description; ?></textarea></label>
                            </td>
                        </tr>
                        <tr>
                            <th width="120" align="right">发布的用户账号：</th>
                            <td>
                                <select class="form-control" name="user_id" id="user_id" style="width: 150px;">
                                    <option value="" selected="selected">请选择用户</option>
                                    <?php
                                    require_once('./sql/selectUsername.php');
                                    while ($user = $result->fetch(PDO::FETCH_OBJ)) {
                                    ?>
                                    <option value="<?=$user->id;?>"
                                        <?php if($res->userid == $user->id) { ?>
                                            selected="selected"<?php } ?>><?=$user->accountname;?></option>
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
<?php include("./style/foot.php"); ?>
<script>
    $("#location").val("<?=$res->location;?>");
</script>
</body>
</html>
