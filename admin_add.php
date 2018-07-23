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
<div class="container">
    <table class="table-hober" width="90%" align="center" border="0" cellspacing="0" cellpadding="6">
        <tr>
            <td>
                <h1>添加企业账号</h1>
                <form id="form1" name="form1" method="post" action="./sql/insertUser.php"
                      enctype="multipart/form-data">
                    <table width="100%" border="0" cellpadding="6" cellspacing="0" class="grid">
                        <tr>
                            <th width="120" align="right">用户名：</th>
                            <td><input name="accountname" type="text" id="accountname" size="60"/></td>
                        </tr>
                        <tr>
                            <th width="120" align="right">密码</th>
                            <td>
                                <input type="password" name="password" id="password" size="60"/>
                            </td>
                        </tr>
                        <tr>
                            <th align="right">头像：</th>
                            <td>
                                <img id="headimg" src="./images/default.jpg" alt="预览"
                                     onerror="this.onerror=null;this.src='./images/default.jpg';"
                                     style="height: 150px; width: 200px;"/>
                                <input type="file" id="photo" name="photo" accept="image/*"/>
                            </td>
                        </tr>
                        <tr>
                            <th width="120" align="right">姓名：</th>
                            <td><input name="realname" type="text" id="realname" size="60"/></td>
                        </tr>
                        <tr>
                            <th width="120" align="right">性别：</th>
                            <td><input id="male" type="radio" name="sex"
                                       value="1" checked="checked"/>
                                <label for="male">先生</label>
                                <input id="female" type="radio" name="sex"
                                       value="0"/>
                                <label for="female">女士</label></td>
                        </tr>
                        <tr>
                            <th width="120" align="right">手机号码：</th>
                            <td><input name="tel" type="text" id="tel" size="60"/></td>
                        </tr>
                        <tr>
                            <th width="120" align="right">邮箱地址：</th>
                            <td><input name="email" type="text" id="email" size="60"/></td>
                        </tr>
                        <tr>
                            <th width="120" align="right">所在地：</th>
                            <td><input name="location" type="text" id="location" size="60"/></td>
                        </tr>
                        <tr>
                            <th width="120" align="right">联系地址：</th>
                            <td><input name="address" type="text" id="address" size="60"/></td>
                        </tr>
                        <tr>
                            <th align="right">&nbsp;</th>
                            <td>
                                <input type="submit" class="btn btn-primary" name="button" id="button" value="提交"/>
                                <a class="btn btn-primary" href="user_list.php">返回</a>
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
</div>
<? include("./style/foot.php"); ?>
<script>
    // 获取图片上传对象
    var photo = document.getElementById("photo");

    // 获取图片对象
    var headImg = document.getElementById("headimg");

    // 绑定预览上传事件和预览功能
    photo.onchange = function () {

        // 获取input上传的图片数据，得到bolb对象路径，可当成普通的文件路径一样使用，赋值给src;
        headImg.src = window.URL.createObjectURL(this.files[0]);
    }
</script>
</body>
</html>
