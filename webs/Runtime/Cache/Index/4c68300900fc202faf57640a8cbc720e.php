<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<meta name="description" content="">
	<title>DP{0-1}算法测评平台</title>
	<!-- Bootstrap core CSS -->
<!--<link href="__PUBLIC__/bootstrap/css/bootstrap.css" rel="stylesheet">-->
<link rel="stylesheet" href="../Public/css/amazeui.css" />
<link rel="stylesheet" href="../Public/css/core.css" />
<link rel="stylesheet" href="../Public/css/menu.css" />
<link rel="stylesheet" href="../Public/css/index.css" />
<link rel="stylesheet" href="../Public/css/admin.css" />
<link rel="stylesheet" href="../Public/css/page/typography.css" />
<link rel="stylesheet" href="../Public/css/page/form.css" />
<link rel="stylesheet" href="../Public/css/component.css" /
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script type="text/javascript" src="../Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../Public/ueditor/ueditor.all.js"></script>
	
		<!-- 页面非公用css及js文件引入 -->
	
</head>
<body>
	<header class="am-topbar am-topbar-fixed-top">
	<div class="am-topbar-left am-hide-sm-only">
		<a href="index.html"  class="logo"><span style="font-size:28px;">D{0-1}KP算法实验平台</span></a>
	</div>
	<div class="contain">
		<ul class="am-nav am-navbar-nav am-navbar-left">
			<li><h4 class="page-title">D{0-1}KP算法实验平台</h4></li>
		</ul>
	</div>
</header>
	<div class="admin">
  <!--<div class="am-g">-->
    <div class="admin-sidebar am-offcanvas  am-padding-0" id="admin-offcanvas">
        <div class="am-offcanvas-bar admin-offcanvas-bar">
             <!-- User -->
            <div class="user-box am-hide-sm-only">
            <div class="user-img">
                <img src="../Public/img/avatar-1.jpg" alt="user-img" title="Mat Helme" class="img-circle img-thumbnail img-responsive">
                <div class="user-status offline"><i class="am-icon-dot-circle-o" aria-hidden="true"></i></div>
            </div>
            <h5><a href="#">南派三叔结对编程小组</a> </h5>
            <ul class="list-inline">
                <li>
                    <a href="#">
                      <i class="fa fa-cog" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="#" class="text-custom">
                      <i class="fa fa-cog" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
      </div>
      <!-- End User -->
            <ul class="am-list admin-sidebar-list">
                <li><a href="__APP__?g=<?php echo GROUP_NAME;?>&m=<?php echo MODULE_NAME;?>&a=index"><span class="am-icon-home"></span> 首页</a></li>
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-nav1'}"><span class="am-icon-table"></span> 基本求解<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav1">
                        <li><a href="__APP__?g=<?php echo GROUP_NAME;?>&m=<?php echo MODULE_NAME;?>&a=sort">数据排序</a></li>
                        <li><a href="__APP__?g=<?php echo GROUP_NAME;?>&m=<?php echo MODULE_NAME;?>&a=scatter" class="am-cf"> 数据散点图</span></a></li>
                        <li><a href="__APP__?g=<?php echo GROUP_NAME;?>&m=<?php echo MODULE_NAME;?>&a=result">保存结果</a></li>
                        <li><a href="__APP__?g=<?php echo GROUP_NAME;?>&m=<?php echo MODULE_NAME;?>&a=salve">算法求解</a></li>
                    </ul>
                </li>
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-nav2'}"><i class="am-icon-line-chart" aria-hidden="true"></i>算法嵌入测评<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav2">
                        <li><a href="__APP__?g=<?php echo GROUP_NAME;?>&m=<?php echo MODULE_NAME;?>&a=check" class="am-cf"> 算法测评</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
  </div>
	
	<div class="content-page">
		<!-- Start content -->
		<div class="content">
			<div class="am-g">
				<!-- Row start -->
				<div class="am-u-md-4">
					<div class="card-box widget-user">
						<div>
							<img src="../Public/img/avatar-10.jpg" class="img-responsive img-circle" alt="user">
							<div class="wid-u-info">
								<h4 class="m-t-0 m-b-5 font-600">胡欢欢</h4>
								<a href="https://www.cnblogs.com/1763088787h/p/14656485.html">胡欢欢项目博客</a>
							</div>
						</div>
					</div>
				</div>
				<!-- col end -->
				<div class="am-u-md-4">
					<div class="card-box widget-user">
						<div>
							<img src="../Public/img/avatar-2.jpg" class="img-responsive img-circle" alt="user">
							<div class="wid-u-info">
								<h4 class="m-t-0 m-b-5 font-600">李岩松</h4>
								<a href="https://www.cnblogs.com/liyansong0198/p/14644940.html">李岩松项目博客</a>
							</div>
						</div>
					</div>
				</div>
				<!-- col end -->
				<div class="am-u-md-4">
					<div class="card-box widget-user">
						<div>
							<img src="../Public/img/avatar-1.jpg" class="img-responsive img-circle" alt="user">
							<div class="wid-u-info">
								<h4 class="m-t-0 m-b-5 font-600">丁宣元</h4>
								<a href="https://www.cnblogs.com/budinge/p/14630602.html">丁宣元项目博客</a>
							</div>
						</div>
					</div>
				</div>
				<!-- col end -->
				<!-- Row end -->
			</div>
			<!-- Row start -->
			<div class="am-g">
				<!-- col start -->
				<div class="am-u-md-12">
					<div class="card-box">
						<h4 class="header-title m-t-0 m-b-30">最新项目</h4>
						<div class="am-scrollable-horizontal am-text-ms" style="font-family: '微软雅黑';">
							<table class="am-table   am-text-nowrap">
								<thead>
								<tr>
									<th>#</th>
									<th>项目名称</th>
									<th>开始时间</th>
									<th>结束时间</th>
									<th>状态</th>
									<th>责任人</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>1</td>
									<td>D{0-1}KP算法实验平台后台接口</td>
									<td>06/04/2021</td>
									<td>09/04/2021</td>
									<td><span class="label label-danger">已发布</span></td>
									<td>胡欢欢</td>
								</tr>
								<tr>
									<td>2</td>
									<td>D{0-1}KP算法实验平台</td>
									<td>06/04/2021</td>
									<td>10/04/2021</td>
									<td><span class="label label-success">已发布</span></td>
									<td>李岩松</td>
								</tr>
								<tr>
									<td>3</td>
									<td>D{0-1}KP算法散点图求解</td>
									<td>06/04/2021</td>
									<td>10/04/2021</td>
									<td><span class="label label-success">已发布</span></td>
									<td>全体</td>
								</tr>
								<tr>
									<td>4</td>
									<td>D{0-1}KP算法嵌入测评</td>
									<td>06/04/2021</td>
									<td>10/04/2021</td>
									<td><span class="label label-success">已发布</span></td>
									<td>全体</td>
								</tr>
								<tr>
									<td>5</td>
									<td>D{0-1}KP算法求接</td>
									<td>06/04/2021</td>
									<td>10/04/2021</td>
									<td><span class="label label-success">已发布</span></td>
									<td>全体</td>
								</tr>
								<tr>
									<td>4</td>
									<td>D{0-1}KP算法实验平台v2.0</td>
									<td>09/04/2020</td>
									<td>14/04/2016</td>
									<td><span class="label label-purple">进行中</span>
									</td>
									<td>南派三叔结对编程</td>
								</tr>
								<tr>
									<td>5</td>
									<td>D{0-1}KP算法实验平台部署运行</td>
									<td>10/04/2021</td>
									<td>24/04/2016</td>
									<td><span class="label label-warning">即将开始</span></td>
									<td>胡欢欢</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- col end -->
			</div>
		</div>
	</div>
	<!-- end right Content here -->
	<!--</div>-->
	</div>
	</div>
	<!-- navbar -->
	<a href="admin-offcanvas" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"><!--<i class="fa fa-bars" aria-hidden="true"></i>--></a>
	<script type="text/javascript" src="../Public/js/jquery-2.1.0.js" ></script>
	<script type="text/javascript" src="../Public/js/amazeui.min.js"></script>
	<script type="text/javascript" src="../Public/js/app.js" ></script>
	<script type="text/javascript" src="../Public/js/blockUI.js" ></script>
	<script type="text/javascript" src="../Public/js/charts/echarts.min.js" ></script>
	<script type="text/javascript" src="../Public/js/charts/indexChart.js" ></script>

</body>
</html>