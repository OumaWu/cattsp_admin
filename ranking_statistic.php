<?php include_once("admin.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <title>中国-东盟太阳能技术转移平台后台管理系统</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="./bootstrap/css/templatemo_main.css">
    <link href="./bootstrap/css/my.css" rel="stylesheet" type="text/css">
    <style type="text/css">

        .rank_list {
            /*line-height: 14px;*/
            width: 750px;
            /*margin: 0 auto;*/
            padding-top: 5px;
        }

        .rank_list li {
            /*height: 14px;*/
            font-size: 20px;
            margin-bottom: 8px;
            width: 100%;
            /*padding-left: 20px;*/
            white-space: nowrap;
            overflow: hidden;
            position: relative;
        }

        .rank_list li a {
            padding-left: 25px;
        }

        .rank_list li.top3 em {
            background: #FFE4B7;
            border: 1px solid #FFBB8B;
            color: #FF6800;
        }

        .rank_list li#title {
            font-size: 25px;
        }

        .rank_list em {
            position: absolute;
            left: 0;
            top: 15%;
            width: 20px;
            height: 20px;
            border: 1px solid #B1E0F4;
            color: #6298CC;
            font-family: '宋体', Arial;
            font-style: normal;
            font-weight: bold;
            font-size: 15px;
            background: #E6F0FD;
            text-align: center;
            line-height: 20px;
            overflow: hidden;
        }

        .rank_list span {
            float: right;
            width: 120px;
            /*color: #B7B7B7;*/
            text-align: right;
            /*height: 14px;*/
            background: #fff;
        }
    </style>
</head>
<body class="">
<?php include("./style/top.php"); ?>
<div id="main-wrapper">
    <div class="template-page-wrapper">
        <?php include("./style/side_nav.php"); ?>
        <!--/.navbar-collapse -->

        <div class="templatemo-content-wrapper">
            <div class="templatemo-content" style="border-left:1px solid #ddd; min-height:885px;">
                <?php
                include_once ("./sql/ranking.php");
                $r_list = $result->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 style="margin-left: 40px">指定时间内对技术成果的浏览量排名</h1>
                    </div>
                    <div class="col-lg-12 margin-bottom-15">
                        <h3 style="margin-left: 40px">
                            <?php
                            if (!empty($start) && !empty($end) && $start <= $end) {
                                echo "从 <b>{$start}</b> 至 <b>{$end}</b> 的排名情况";
                            } else {
                                echo "所有排名";
                            }
                            ?>
                        </h3>
                        <ul class="rank_list">
                            <li id="title"><b>技术成果名称</b><span><b>访问数量</b></span></li>
                            <?php foreach ($r_list as $index => $item) { ?>
                                <li <?= ($index < 3) ? "class=\"top3\"" : ""; ?>><em><?= $index + 1; ?></em><a
                                            target="_blank" href="tech_edit.php?id=<?= $item["s_id"]; ?>">
                                        <?= $item["title"]; ?></a><span><?= $item["count"]; ?></span>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="col-lg-12 margin-bottom-15" style="padding-left: 55px">
                        <h3>请输入查询年限：</h3>
                        <form id="date_search" action="ranking_statistic.php" method="post">
                            <label for="start">起始日期：<input id="start" name="start" type="date"></label><br>
                            <label for="end">结束日期：<input id="end" name="end" type="date"></label>
                            <button type="submit" id="btn_search" class="btn btn-default"
                                    onclick="return checkForm();">搜索排名
                            </button>
                            <button type="submit" class="btn btn-default">查看所有排名
                            </button>
                        </form>
                    </div>
                    <div class="col-lg-12 margin-bottom-15"></div>
                </div>
                <div id="line-bar" class="col-log-12" style="width:100%; height:400px;"></div>
                <div class="col-lg-12 margin-bottom-30"></div>
                <div class="col-lg-12 margin-bottom-30"></div>
            </div>

        </div>
    </div>
</div>
<?php include("./style/foot.php"); ?>
<script src="./bootstrap/js/jquery.min.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script src="./bootstrap/js/templatemo_script.js"></script>
<script src="./echarts/echarts.js"></script>

<!-- 图表加载脚本 -->
<script>
    var linebar = echarts.init(document.getElementById("line-bar"));
    linebar.setOption({
        title: {
            show: true,
            text: '前十排名直方图',
            left: 'center',
            textStyle: {
                fontSize: 20,
                fontWeight: 'lighter',

            }
        },
        tooltip: {
            trigger: 'axis'
        },
        toolbox: {
            show: true,
            right: '5%',
            feature: {
                dataView: {show: true, readOnly: false},
                magicType: {show: true, type: ['line', 'bar']},
                restore: {show: true},
                saveAsImage: {show: true}
            }
        },
        xAxis: [
            {
                name: '技术成果名称',
                type: 'category',
                data: [<?php
                    foreach ($r_list as $index => $item)
                        echo "'" . $item["title"]
//                        echo "'" . mb_substr($item["title"], 0, 4, 'utf-8'). "..."
                            . ($index == count($r_list) - 1 ? "'" : "',");
                    ?>],
                axisLabel: {
                    interval: 0,
                    rotate: 10
                },
            }
        ],
        grid: { // 控制图的大小，调整下面这些值就可以，
            x: 50,
            x2: 100,
            y2: 50// y2可以控制 X轴跟Zoom控件之间的间隔，避免以为倾斜后造成 label重叠到zoom上
        },
        yAxis:
            {
                name: '访问量',
                type: 'value',
                axisLabel: {
                    formatter: '{value} 个'
                }
            },

        series: [
            {
                name: '访问量',
                type: 'bar',
                data: [<?php
                    foreach ($r_list as $index => $item)
                        echo "'" . $item["count"] . ($index == count($r_list) - 1 ? "'" : "',");
                    ?>]
            }
        ]
    });


    //检查日期输入是否合法
    function checkForm() {
        var startDt = document.getElementById("start").value;
        var endDt = document.getElementById("end").value;

        if (startDt === "" || endDt === "") {
            alert("搜索的日期不能为空！");
            return false;
        }

        if ((new Date(startDt).getTime() > new Date(endDt).getTime())) {
            alert("输入的起始日期大于终止日期！");
            return false;
        }
        return true;
    }

</script>
</body>
</html>