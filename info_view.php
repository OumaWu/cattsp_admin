<?
include("admin.php");
require_once('./sql/selectNews.php');
$news = $result->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>中国-东盟太阳能技术转移平台后台管理系统</title>
    <link href="./bootstrap/css/style.css?v" rel="stylesheet" type="text/css"/>
    <link href="./bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="./bootstrap/css/my.css?v" rel="stylesheet" type="text/css">
    <script language="javascript" src="./jquery/jquery.min.js"></script>
</head>

<body class="new">
<? include("./style/top.php"); ?>
<div class="container">
    <!--    <div class="row">-->
    <table width="90%" style="margin-bottom:20px;" align="center" border="0" cellspacing="0" cellpadding="6">
        <tr>
            <td>
                <br/>
                <table width="100%" cellspacing="0" cellpadding="0">
                    <tr>
                        <td style="float:left"><a href="info_list.php">[返回]</a></td>
                        <td style="float:right"><a href="info_edit.php?id=<?= $news->id ?>">[修改]</a><a
                                    href="./sql/deleteNews.php?id=<?= $news->id ?>"
                                    onclick="if(!confirm('确认删除?')) return false;">[删除]</a>
                        </td>
                    </tr>
                </table>

                <br/>
                <table width="100%" border="0" cellpadding="6" cellspacing="0" class="grid">

                    <tr>
                        <td width="120" align="right">新闻标题：</td>
                        <td width="995"><h3><?= $news->title; ?></h3></td>
                    </tr>

                    <tr>
                        <td width="120" align="right">类别：</td>
                        <td width="995"><?= $news->category; ?></td>
                    </tr>
                    <tr>
                        <td align="right">新闻内容：</td>
                        <td width="995">
                            <div show="1" style="display:block;" id="hidnr">
                                <?= $news->content; ?>
                            </div>
                            <div style="display:none;" id="shownr">
                                <?= $news->content; ?>
                            </div>
                            <a href="#" style="font-size:16px;" id="toggle" onclick="showhidden();">全文</a>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">发布时间：</td>
                        <td><?= $news->date; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!--    </div>-->
</div>

<? include("./style/foot.php"); ?>
<script>
    //收起、全文切换
    var nr = document.getElementById("hidnr").innerHTML;
    var subnr = nr.substr(0, 3000);
    var xt = document.getElementById("hidnr");
    xt.innerHTML = subnr;


    function showhidden() {
        var xt = document.getElementById("hidnr");
        var show = xt.getAttribute("show");
        var shownr = document.getElementById("shownr");
        var toggle = document.getElementById("toggle");

        if (show == 1) {
            toggle.innerHTML = "收起";

            shownr.style.display = "block";
            xt.style.display = "none";
            xt.setAttribute("show", "0");
        }
        else {
            toggle.innerHTML = "全文";
            shownr.style.display = "none";
            xt.style.display = "block";
            xt.setAttribute("show", "1");
        }
    }
</script>
</body>
</html>
