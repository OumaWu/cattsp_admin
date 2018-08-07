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
</head>
<body class="">
<?php include("./style/top.php"); ?>
<div id="main-wrapper">
    <div class="template-page-wrapper">
        <?php include("./style/side_nav.php"); ?>
        <!--/.navbar-collapse -->

        <div class="templatemo-content-wrapper">
            <div class="templatemo-content" style="border-left:1px solid #ddd; min-height:885px;">
                <h1 class="text-center">企业需求数量统计</h1>
                <div class="col-lg-12 margin-bottom-15"></div>
                <div class="row">
                    <div id="line-bar" class="col-log-12" style="width:100%; height:100%; min-height:300px;"></div>
                    <div class="col-lg-12 margin-bottom-30"></div>
                    <div class="col-lg-12 margin-bottom-15"></div>
                    <div id="line" class="col-lg-12"
                         style=" padding:0; width:100%; height:100%;min-height:300px"></div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include("./style/foot.php"); ?>
<script src="./bootstrap/js/jquery.min.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script src="./bootstrap/js/templatemo_script.js"></script>
<script src="./echarts/echarts.js"></script>
<?php

include_once ("./sql/quantityStatistics.php");

$location = $result->fetchAll(PDO::FETCH_ASSOC);
$date = $result2->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- 图表加载脚本 -->
<script>
    var linebar = echarts.init(document.getElementById("line-bar"));
    linebar.setOption({
        title: {
            show: true,
            text: '按地域统计',
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
                name: '地区',
                type: 'category',
                data: [<?php
                    foreach ($location as $index => $row)
                        echo "'" . $row["location"] . ($index == count($location) - 1 ? "'" : "',");
                    ?>]
            }
        ],
        yAxis:
            {
                name: '发布的企业需求数量',
                type: 'value',
                axisLabel: {
                    formatter: '{value} 个'
                }
            },

        series: [
            {
                name: '企业需求数量',
                type: 'bar',
                data: [<?php
                    foreach ($location as $index => $row)
                        echo "'" . $row["count"] . ($index == count($location) - 1 ? "'" : "',");
                    ?>]
            }
        ]
    });

    var line = echarts.init(document.getElementById("line"));
    line.setOption({
        title: {
            show: true,
            text: '按指定时间内统计',
            left: 'center',
            textStyle: {
                color: 'black',
                fontWeight: 'lighter',
                fontSize: 20,

            }
        },
        tooltip: {
            trigger: 'axis'
        },
        dataZoom: [{  //数据缩放，
            type: 'slider',
            show: true,
            realtime: true,
            start: 0,
            end: 100,
        },
            {			//鼠标拖动
                type: 'inside',
                show: true,
                realtime: true,
                start: 0,
                end: 100
            }
        ],
        barGap: '30%',
        toolbox: {
            show: true,
            right: '5%',
            feature: {
                dataZoom: {},
                dataView: {readOnly: true},
                magicType: {type: ['line', 'bar']},
                restore: {},
                saveAsImage: {}
            }
        },
        xAxis: {
            name: '日期',
            type: 'category',
            boundaryGap: true,
            data: [<?php
                foreach ($date as $array => $row)
                    echo "'" . $row["date"] . "',";
                ?>]
        },
        yAxis: {
            name: '发布的企业需求数量',
            type: 'value',
            axisLabel: {
                formatter: '{value} 个'
            }
        },
        series: [

            {
                name: '企业需求数量',
                type: 'line',
                data: [<?php
                    foreach ($date as $array => $row)
                        echo "'" . $row["count"] . "',";
                    ?>]
            }
        ]
    });
</script>
</body>
</html>