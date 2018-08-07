<?php
include("admin.php");
define('IMG_PATH', "http://" . $_SERVER['HTTP_HOST'] . "/user_files/");
require_once('sql/selectTech.php');
$res = $result->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>中国-东盟太阳能技术转移平台后台管理系统</title>
    <link href="./bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="./bootstrap/css/style.css?v" rel="stylesheet" type="text/css"/>
    <link href="./bootstrap/css/my.css"/>
</head>

<body class="">
<?php include("./style/top.php"); ?>
<div class="container">
    <table class="table-hober" width="90%" align="center" border="0" cellspacing="0" cellpadding="6">
        <tr>
            <td>
                <h1>编辑技术成果专利</h1>
                <form id="form1" name="form1" method="post" action="./sql/updateTech.php"
                      enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id" value="<?=$res->id;?>"/>
                    <table width="100%" border="0" cellpadding="6" cellspacing="0" class="grid">
                        <tr>
                            <th width="120" align="right">技术名称：</th>
                            <td><input name="title" value="<?=$res->title;?>" type="text" id="title" size="60"/></td>
                        </tr>
                        <tr>
                            <th width="120" align="right">发布单位：</th>
                            <td><input name="entreprise" value="<?=$res->entreprise;?>" type="text" id="entreprise" size="60"/></td>
                        </tr>
                        <tr>
                            <th width="120" align="right">发布人：</th>
                            <td><input name="publisher" value="<?=$res->publisher;?>" type="text" id="publisher" size="60"/></td>
                        </tr>
                        <tr>
                            <th width="120" align="right">电子邮箱：</th>
                            <td><input name="email" value="<?=$res->email;?>" type="text" id="email" size="60"/></td>
                        </tr>

                        <tr>
                            <th width="120" align="right">所在地：</th>
                            <td><label for="location">
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
                            <th width="120" align="right">发布的用户账号：</th>
                            <td><label for="user_id">
                                <select class="form-control" name="user_id" id="user_id" style="width: 110px;"
                                        onchange="setUsername();">
                                    <option value="">选择用户</option>
                                    <?php
                                    require_once('./sql/selectUsername.php');
                                    while ($user = $result->fetch(PDO::FETCH_OBJ)) {
                                        ?>
                                        <option value="<?=$user->id;?>"
                                            <?php if($res->userid == $user->id) { ?>
                                                selected="selected"<?php } ?>><?=$user->accountname;?></option>
                                    <?php } ?>
                                </select></label>
                                <input type="hidden" id="user_name" name="user_name" value=""/>
                            </td>
                        </tr>
                        <tr>
                            <th align="right">技术图片：</th>
                            <td>
                                <ol class="breadcrumb  alert-info">
                                    <li><a>Tips：最多可选5张图片</a></li>
                                </ol>
                                <ul class="img-upload">
                                    <li>
                                        <img id="preview1" src="<?=IMG_PATH.$res->image1;?>" alt="预览"
                                             onerror="this.onerror=null;this.src='./images/default.jpg';"/>
                                        <input type="file" name="img1" id="img1" accept="image/*"/>
                                    </li>
                                    <li>
                                        <img id="preview2" src="<?=IMG_PATH.$res->image2;?>" alt="预览"
                                             onerror="this.onerror=null;this.src='./images/default.jpg';"/>
                                        <input type="file" name="img2" id="img2" accept="image/*"/>
                                    </li>
                                    <li>
                                        <img id="preview3" src="<?=IMG_PATH.$res->image3;?>" alt="预览"
                                             onerror="this.onerror=null;this.src='./images/default.jpg';"/>
                                        <input type="file" name="img3" id="img3" accept="image/*"/>
                                    </li>
                                    <li>
                                        <img id="preview4" src="<?=IMG_PATH.$res->image4;?>" alt="预览"
                                             onerror="this.onerror=null;this.src='./images/default.jpg';"/>
                                        <input type="file" name="img4" id="img4" accept="image/*"/>
                                    </li>
                                    <li>
                                        <img id="preview5" src="<?=IMG_PATH.$res->image5;?>" alt="预览"
                                             onerror="this.onerror=null;this.src='./images/default.jpg';"/>
                                        <input type="file" name="img5" id="img5" accept="image/*"/>
                                    </li>
                                </ul>
                                <!-- 原来已有的图 -->
                                <input type="hidden" name="o_img1" value="<?= $res->image1; ?>"/>
                                <input type="hidden" name="o_img2" value="<?= $res->image2; ?>"/>
                                <input type="hidden" name="o_img3" value="<?= $res->image3; ?>"/>
                                <input type="hidden" name="o_img4" value="<?= $res->image4; ?>"/>
                                <input type="hidden" name="o_img5" value="<?= $res->image5; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <th align="right">技术介绍：</th>
                            <td>
                                <label for="description">
                                <textarea name="description" id="description" rows="15" cols="100"
                                          style="overflow: scroll;"><?=$res->description;?></textarea></label>
                            </td>
                        </tr>
                        <tr>
                            <th align="right">&nbsp;</th>
                            <td>
                                <input type="submit" class="btn btn-primary" name="button" id="button" value="提交"/>
                                <a class="btn btn-primary" href="tech_list.php">返回</a>
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
</div>
<?php include("./style/foot.php"); ?>
<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="./js/edit-tech.js"></script>
<script>
    $("#location").val("<?=$res->location;?>");
    var userName = $("#user_id").find("option:selected").text();
    $("#user_name").val(userName);
</script>
</body>
</html>
