<?php
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
<?php include("./style/top.php"); ?>
<div class="container">
    <table class="table-hober" width="90%" align="center" border="0" cellspacing="0" cellpadding="6">
        <tr>
            <td>
                <h1>添加专家账号</h1>
                <form id="form1" name="form1" method="post" action="./sql/insertExpert.php"
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
                            <td><input name="name" type="text" id="name" size="60"/></td>
                        </tr>
                        <tr>
                            <th width="120" align="right">职位/头衔：</th>
                            <td><input name="title" type="text" id="title" size="60"/></td>
                        </tr>
                        <tr>
                            <th width="120" align="right">所在地：</th>
                            <td><input name="location" type="text" id="location" size="60"/></td>
                        </tr>
                        <tr>
                            <th width="120" align="right">从业时长(年)：</th>
                            <td><input name="career_age" type="text" id="career_age" size="60"/></td>
                        </tr>
                        <tr>
                            <th width="120" align="right">学历：</th>
                            <td><input name="degree" type="text" id="degree" size="60"/></td>
                        </tr>
                        <tr>
                            <th width="120" align="right">毕业院校：</th>
                            <td><input name="institute" type="text" id="institute" size="60"/></td>
                        </tr>
                        <tr>
                            <th width="120" align="right">从事领域：</th>
                            <td><input name="domain" type="text" id="domain" size="60"/></td>
                        </tr>
                        <tr>
                            <th width="120" align="right">擅长专业：</th>
                            <td><input name="speciality" type="text" id="speciality" size="60"/></td>
                        </tr>
                        <tr>
                            <th align="right">个人简介：</th>
                            <td>
                                <label for="introduction">
                                <textarea name="introduction" id="introduction" rows="15" cols="100"
                                          style="overflow: scroll;"></textarea></label>
                            </td>
                        </tr>
                        <tr>
                            <th align="right">&nbsp;</th>
                            <td>
                                <input type="submit" class="btn btn-primary" name="button" id="button" value="提交"/>
                                <a class="btn btn-primary" href="expert_list.php">返回</a>
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
