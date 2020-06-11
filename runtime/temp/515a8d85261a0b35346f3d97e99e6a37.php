<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:72:"D:\phpStudy\WWW\invest\public/../application/admin\view\index\index.html";i:1588404442;s:62:"D:\phpStudy\WWW\invest\application\admin\view\public\head.html";i:1588388460;s:60:"D:\phpStudy\WWW\invest\application\admin\view\public\js.html";i:1580893892;s:62:"D:\phpStudy\WWW\invest\application\admin\view\public\left.html";i:1589337931;}*/ ?>
<!DOCTYPE html>
<html><head>
	    <meta charset="utf-8">
    <title>调查系统</title>

    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="http://localhost/invest/public/static/admin/style/bootstrap.css" rel="stylesheet">
    <link href="http://localhost/invest/public/static/admin/style/font-awesome.css" rel="stylesheet">
    <link href="http://localhost/invest/public/static/admin/style/weather-icons.css" rel="stylesheet">

    <!--Beyond styles-->
    <link id="beyond-link" href="http://localhost/invest/public/static/admin/style/beyond.css" rel="stylesheet" type="text/css">
    <link href="http://localhost/invest/public/static/admin/style/demo.css" rel="stylesheet">
    <link href="http://localhost/invest/public/static/admin/style/typicons.css" rel="stylesheet">
    <link href="http://localhost/invest/public/static/admin/style/animate.css" rel="stylesheet">
    
</head>
<body>
	<!-- 头部 -->

<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="<?php echo url('admin/index/index'); ?>" class="navbar-brand">
                    <small>
                        <img src="http://localhost/invest/public/static/admin/images/logo.png" alt="">
                    </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings -->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area" style="margin-right: 100px">
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" style="width: 68px; font-size: 20px; color: white;" title="View your public profile">
                                    用户名:
                                </div>
                                <?php if(session('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz.id')): ?>
                                <section>
                                    <h2><span class="profile" style="padding-top: 2px"><span><?php echo session('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz.name'); ?></span></span></h2>

                                </section>
                                <?php endif; ?>
                            </a>
                        <li class="dropdown-footer">
                            <a href="javascript:void(0)"style="color:white; padding-top: 13px" id="outLogin">
                                退出登录
                            </a>
                        </li>
                            <!--Login Area Dropdown-->
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                        <!-- Settings -->
                    </ul>
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>

</div>
<script src="http://localhost/invest/public/static/admin/style/jquery-3.4.1.min.js"></script>
<script src="http://localhost/invest/public/static/admin/style/bootstrap.js"></script>
<script src="http://localhost/invest/public/static/admin/style/jquery.js"></script>
<!--Beyond Scripts-->
<script src="http://localhost/invest/public/static/admin/style/beyond.js"></script>
<script src="http://localhost/invest/public/static/lib/layer/layer.js"></script>



<script>
    $(function () {
        $('#outLogin').click(function () {
            $.ajax({
                url: "<?php echo url('index/outLogin'); ?>",
                type: 'post',
                dataType: 'json',
                success: function (data) {
                    if (data.code == 1) {
                        layer.msg(data.msg ,{
                            icon:6,
                            time:1000
                        }, function () {
                            location.href = data.url;
                        });
                    }else {
                        layer.open({
                            title:'退出!',
                            content:data.msg,
                            icon:5,
                            anim:6
                        });
                    }
                }
            });
            return false;
        });
    });
</script>


	<!-- /头部 -->
	
	<div class="main-container container-fluid">
		<div class="page-container">
			            <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
    <!-- Page Sidebar Header-->
    <div class="sidebar-header-wrapper">
        <input class="searchinput" type="text">
        <i class="searchicon fa fa-search"></i>
        <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
    </div>
    <!-- /Page Sidebar Header -->
    <!-- Sidebar Menu -->
    <ul class="nav sidebar-menu">
        <!--Dashboard-->

        <!--人员类型分类-->
        <li>
            <a href="javascript:void(0)" class="menu-dropdown">
                <i class="menu-icon fa  fa-user"></i>
                    <span class="menu-text">调查方式分类</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('Personnel/lst'); ?>">
                                    <span class="menu-text">调查方式</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <!--<li>-->
                    <!--<a href="<?php echo url('position/lst'); ?>">-->
                                    <!--<span class="menu-text">部门分类</span>-->
                        <!--<i class="menu-expand"></i>-->
                    <!--</a>-->
                <!--</li>-->
            </ul>
        </li>

        <!--班级分类-->
        <li>
            <a href="javascript:void(0)" class="menu-dropdown">
                <i class="menu-icon fa fa-renren"></i>
                <span class="menu-text">班级分类</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('grade/lst'); ?>">
                        <span class="menu-text">班级添加</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('local/lst'); ?>">
                        <span class="menu-text">班级分类</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>

            </ul>
        </li>

        <!--老师分类管理-->
        <li>
            <a href="javascript:void(0)" class="menu-dropdown">
                <i class="menu-icon fa  fa-user-md"></i>
                <span class="menu-text">老师分类管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('Main/lst'); ?>">
                        <span class="menu-text">职位管理</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('Teacher/lst'); ?>">
                        <span class="menu-text">老师管理</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>

            </ul>
        </li>

        <!--部门分类管理-->
        <li>
            <a href="javascript:void(0)" class="menu-dropdown">
                <i class="menu-icon fa fa-building"></i>
                <span class="menu-text">部门分类管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('position/lst'); ?>">
                        <span class="menu-text">部门分类管理</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>


        <!--题目分类管理-->
        <li>
            <a href="javascript:void(0)" class="menu-dropdown">
                <i class="menu-icon fa fa-database"></i>
                <span class="menu-text">题目分类管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('manag/lst'); ?>">
                        <span class="menu-text">题目标题管理</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('topic/lst'); ?>">
                        <span class="menu-text">调查问题列表</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>

            </ul>
        </li>

        <!--用户管理-->
        <li>
            <a href="javascript:void(0)" class="menu-dropdown">
                <i class="menu-icon fa fa-male"></i>
                <span class="menu-text">用户管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('user/lst'); ?>" >
                        <span class="menu-text">用户</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>

        <!--调查统计-->
        <li>
            <a href="javascript:void(0)" class="menu-dropdown">
                <i class="menu-icon glyphicon glyphicon glyphicon-book"></i>
                <span class="menu-text">调查统计</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('time/index',array('id'=>1)); ?>">
                        <span class="menu-text">学生综合调查管理数据</span>
                        <i class="menu-expand"></i>
                    </a>

                </li>
                <li>
                    <a href="<?php echo url('time/index',array('id'=>2)); ?>">
                        <span class="menu-text">教师授课满意度调查</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('time/index',array('id'=>3)); ?>">
                        <span class="menu-text">各题目的平均分</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('time/index',array('id'=>4)); ?>">
                        <span class="menu-text">各大题平均分</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>

        <!--评论区-->
        <!--部门分类管理-->
        <li>
            <a href="javascript:void(0)" class="menu-dropdown">
                <i class="menu-icon fa fa-comment"></i>
                <span class="menu-text">评论区</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('comment/lst', array('personnel_id'=> 1)); ?>">
                        <span class="menu-text">学生评论</span>
                        <i class="menu-expand"></i>
                    </a>

                </li>
                <li>
                    <a href="<?php echo url('comment/lst', array('personnel_id'=> 2)); ?>">
                        <span class="menu-text">老师评论</span>
                        <i class="menu-expand"></i>
                    </a>
            </li>
            </ul>
        </li>
    </ul>
    <!-- /Sidebar Menu -->
</div>
            <!-- /Page Sidebar -->
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                                        <li class="active">控制面板</li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    
				<div style="text-align:center; line-height:1000%; font-size:24px;">
                <br /><p style="color:#f00;">学生调查系统</p></div>
                </div>


                </div>
                <style type="text/css" media="screen">
                    .inner {
                        display: flex;
                        x-index:999;
                        margin-left: 50%;
                        margin-top: 450px;
                        flex-direction: column;
                        justify-content: space-between;
                        //height: calc(~"100vh - 100px"); // less的写法
                        height: calc(100vh - 100px);  // css的写法
                        // 100px是头部的高度，视情况修改
                    }
                </style>
                
                <div class="main">
                    <div class="inner">
                        <div style="font-size: 10px;" class="main-content">
                            四川新华电脑学院  教师:  陈雪冬  学生:  马冲 岳长春 刘友刚
                        <div>
                          
                        
                        
                    </div>
                <div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
		</div>	
	</div>

	    <!--Basic Scripts-->
    <script src="http://localhost/invest/public/static/admin/style/jquery-3.4.1.min.js"></script>
<script src="http://localhost/invest/public/static/admin/style/bootstrap.js"></script>
<script src="http://localhost/invest/public/static/admin/style/jquery.js"></script>
<!--Beyond Scripts-->
<script src="http://localhost/invest/public/static/admin/style/beyond.js"></script>
<script src="http://localhost/invest/public/static/lib/layer/layer.js"></script>



    


</body></html>