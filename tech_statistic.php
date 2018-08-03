<?php
include("admin.php");
?>
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
                <div class="row">
                    <div id="locationbar" class="col-lg-12" style="text-align:center">
                        <span class="chartpage-title">地域统计</span>
                    </div>
                    <div id="line-bar" class="col-log-12" style="width:100%; height:100%; min-height:300px;"></div>
                    <div id="locationbar" class="col-lg-12" style="text-align:center">
                        <span class="chartpage-title">指定时间内统计</span>
                    </div>
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

<script>
    var linebar = echarts.init(document.getElementById("line-bar"));
    linebar.setOption({
        title: {
            show: false,
            text: '地市分布情况',
            left: 'center',
            textStyle: {
                fontSize: 18,
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
                data: ['南宁', '柳州', '桂林', '百色', '北海', '防城港', '玉林', '崇左', '贵港', '贺州', '梧州', '来宾', '河池', '钦州']
            }
        ],
        yAxis:
            {
                name: '数量',
                type: 'value',
                axisLabel: {
                    formatter: '{value} 个'
                }
            },

        series: [
            {
                name: '漏洞数量',
                type: 'bar',
                data: [12, 9, 12, 14, 13, 5, 3, 20, 15, 16, 23, 14, 18, 16]
            }
        ]
    });

    var line = echarts.init(document.getElementById("line"));
    line.setOption({
        title: {
            show: false,
            text: '工控网络安全形势分析',
            left: 'center',
            textStyle: {
                color: 'black',
                fontWeight: 'lighter',
                fontSize: 18,

            }
        },
        tooltip: {
            trigger: 'axis'
        },
        dataZoom: [{  //数据缩放，
            type: 'slider',
            show: true,
            realtime: true,
            start: 40,
            end: 80,
        },
            {			//鼠标拖动
                type: 'inside',
                show: true,
                realtime: true,
                start: 40,
                end: 80
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
            data: ['2014/1', '2014/2', '2014/3', '2014/4', '2014/5', '2014/6', '2014/7', '2014/8', '2014/9', '2014/10', '2014/11', '2014/12', '2015/1', '2015/2', '2015/3', '2015/4', '2015/5', '2015/6', '2015/7', '2015/8', '2015/9', '2015/10', '2015/11', '2015/12', '2016/1', '2016/2', '2016/3']
        },
        yAxis: {
            name: '数量',
            type: 'value',
            axisLabel: {
                formatter: '{value} 个'
            }
        },
        series: [

            {
                name: '提交数量',
                type: 'line',
                data: [11, 15, 9, 6, 15, 35, 30, 25, 14, 34, 23, 25, 5, 12, 15, 21, 9, 15, 16, 17, 15, 14, 10, 19, 10, 16, 8],

                /*markLine: {
                    data: [
                        {type: 'average', name: '平均值'},

                    ]
                }*/
            }
        ]
    });

    line.on('click', function (params) {
        //临时生成数值
        var data = [];
        for (var i = 0; i < 14; i++) {
            var value = parseInt(Math.random() * 15);
            data.push(value);

        }
        $(function () {
            switch (params.dataIndex) {
                case 0:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
                case 1:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
                case 2:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    })
                    break;
                case 3:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
                case 4:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    })
                    break;
                case 5:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
                case 6:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    })
                    break;
                case 7:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
                case 8:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
                case 9:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
                case 10:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
                case 11:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
                case 12:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
                case 13:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
                case 14:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
                case 15:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
                case 16:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
                case 17:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
                case 18:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
                case 19:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
                case 20:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
                case 21:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
                case 22:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
                case 23:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
                case 24:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
                case 25:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
                case 26:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
                case 27:
                    linebar.setOption({
                        series: [{

                            data: data
                        }]
                    });
                    break;
            }

        })

    });

</script>
</body>
</html>