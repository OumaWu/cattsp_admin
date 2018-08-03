<div class="navbar-collapse collapse templatemo-sidebar" style=" margin-left:0;">
    <ul class="templatemo-sidebar-menu">

        <li style="border-bottom:1px solid #ddd" class="sub">
            <a href="javascript:;">管理中心
                <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
                <li><a href="index.php"><i class="fa fa-database"></i>用户资料</a></li>
                <li><a href="user_list.php"><i class="fa fa-database"></i>账号管理</a></li>
                <li><a href="tech_list.php"><i class="fa fa-database"></i>技术成果管理</a></li>
                <li><a href="demand_list.php"><i class="fa fa-database"></i>企业需求管理</a></li>
                <li><a href="expert_list.php"><i class="fa fa-database"></i>专家账号管理</a></li>
                <li><a href="question_list.php"><i class="fa fa-database"></i>用户提问管理</a></li>
            </ul>
        </li>

        <li style="border-bottom:1px solid #ddd" class="sub">
            <a href="javascript:;">资讯管理
                <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
                <li><a href="info_category.php"><i class="fa fa-home"></i>栏目管理</a></li>
                <li><a href="info_list.php"><i class="fa fa-home"></i>内容管理</a></li>
            </ul>
        </li>

        <li style="border-bottom:1px solid #ddd" class="sub">
            <a href="javascript:;">政策法规管理
                <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
                <li><a href="policy_category.php"><i class="fa fa-home"></i>栏目管理</a></li>
                <li><a href="policy_list.php"><i class="fa fa-home"></i>内容管理</a></li>
            </ul>
        </li>

        <li style="border-bottom:1px solid #ddd" class="sub">
            <a href="javascript:;">数据统计
                <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
                <li><a href="tech_statistic.php?s_type=tech"><i class="fa fa-home"></i>技术成果统计</a></li>
                <li><a href="demand_statistic.php?s_type=demand"><i class="fa fa-home"></i>企业需求统计</a></li>
                <li><a href="ranking_statistic.php"><i class="fa fa-home"></i>热点统计</a></li>
            </ul>
        </li>

        <li style="border-bottom:1px solid #ddd "><a href="javascript:void(0);" onclick="logout();">注销登录</a>
        </li>
        <script>
            function logout() {
                var con = confirm("确定要注销吗？");
                if (con)
                    location.href = "logout.php";
            }
        </script>
    </ul>
</div>