<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:70:"D:\phpStudy\WWW\invest\public/../application/admin\view\manag\lst.html";i:1588841326;s:62:"D:\phpStudy\WWW\invest\application\admin\view\public\head.html";i:1588388460;s:60:"D:\phpStudy\WWW\invest\application\admin\view\public\js.html";i:1580893892;s:62:"D:\phpStudy\WWW\invest\application\admin\view\public\left.html";i:1589337931;}*/ ?>
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

</div>

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
                    <li>
                        <a href="<?php echo url('index/index'); ?>">系统</a>
                    </li>
                    <li class="active">题目管理</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->

            <!-- Page Body -->
            <div class="page-body">
                <form id="form1" class="navbar-form navbar-right" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" id="search" name="mname" placeholder="搜索" style="margin-left: 572px;display: inline-block"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default btn-sm">搜索</button>
                    </div>
                </form>
                <!--<span  class="input-icon inverted">-->
                      <!--<input style="width: 40%; margin: auto; font-size: 13px" type="text" placeholder="输入题目名称" class="form-control input-sm">-->
                     <!--<i  style="margin-left: 443px;width: 50px;" class="glyphicon glyphicon-search bg-blue">搜索</i>-->
                 <!--</span>-->
                <a href="<?php echo url('manag/add'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>&nbsp;Add</a>
                </button>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="flip-scroll">
                                    <table class="table table-bordered table-hover">
                                        <thead class="">
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">题目名称</th>
                                            <th class="text-center">部门</th>
                                            <th class="text-center">状态</th>
                                            <th class="text-center">添加时间</th>
                                            <th class="text-center">操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(is_array($manag) || $manag instanceof \think\Collection || $manag instanceof \think\Paginator): $i = 0; $__LIST__ = $manag;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <tr>
                                            <td align="center"><?php echo $vo['id']; ?></td>
                                            <td align="center"><?php echo $vo['mname']; ?></td>
                                            <td align="center"><?php echo $vo['name']; ?></td>
                                            <td align="center">
                                                <?php if($vo['status'] == 1): ?>
                                                <img src="http://localhost/invest/public/static/admin/images/right.png" alt="">
                                                <?php else: ?>
                                                <img src="http://localhost/invest/public/static/admin/images/wrong.png" alt="">
                                                <?php endif; ?>
                                            </td>
                                            <td align="center"><?php echo $vo['create_time']; ?></td>
                                            <td align="center">
                                                <a href="<?php echo url('manag/edit', array('id' => $vo['id'])); ?>" id="mainEdit" class="btn btn-primary btn-sm shiny">
                                                    <i class="fa fa-edit"></i> 编辑
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-danger brand_del btn-sm shiny" onclick="dele(this,'<?php echo $vo['id']; ?>')">删除</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div style="padding-top: 10px; text-align: right;">
                                    <!--分页-->
                                    <?php echo $manag->render(); ?>
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
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




<script>

    /*用户-删除*/
    function dele(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            //发异步删除数据
            $.post("<?php echo url('manag/del'); ?>",{id:id},function (data) {

                if(data.code == 1){
                    //删除成功 删除元素
                    $(obj).parents('table tr').remove();
                    layer.msg(data.msg,{icon:1,time:1000});
                }else{
                    //删除失败
                    layer.msg(data.msg,{icon:2,time:1000});
                }
            });
        });
    }
    $(function () {
        $('#seBtn').click(function () {
            $.ajax({
               url: "<?php echo url('manag/lst'); ?>",
               type: 'get',
               data: $('#form1').serialize(),
               success:function (data) {
                   // console.log(data)
                   $("html").empty().append($(data))
                   // location.reload();
               }
            });
        });
    });
</script>


</body></html>