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
        <li><a href="index.html"><span class="am-icon-home"></span> 首页</a></li>
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
				<div class="am-u-sm-12">
					<div class="card-box">
						<h4 class="header-title m-t-0 m-b-30">请选择需要排序的数据</h4>
						<div class="am-g">
							<div class="am-u-md-12">
								<form  action="__APP__?g=<?php echo GROUP_NAME;?>&m=<?php echo MODULE_NAME;?>&a=sortResult" method="post" class="am-form am-text-sm"  id="select_form">
									<div class="am-form-group">
										<div class="am-u-md-5">
											<label class="am-u-md-2 am-md-text-right" for="doc-select-1">文件：</label>
											<select name="fileName" class="am-md-text-right" id="doc-select-1">
												<option name="fileName" value="idkp1-10.txt">idkp1-10.txt</option>
												<option name="fileName" value="sdkp1-10.txt">sdkp1-10.txt</option>
												<option name="fileName" value="wdkp1-10.txt">wdkp1-10.txt</option>
												<option name="fileName" value="udkp1-10.txt">udkp1-10.txt</option>
											</select>
										</div>
										<div class="am-u-md-5">
											<label class="am-u-md-2 am-md-text-right" for="doc-select-1">组数：</label>
											<select name="seriesNumber" class="am-md-text-right"  id="doc-select-1">
												<option name="seriesNumber" value="1">1</option>
												<option name="seriesNumber" value="2">2</option>
												<option name="seriesNumber" value="3">3</option>
												<option name="seriesNumber" value="4">4</option>
												<option name="seriesNumber" value="5">5</option>
												<option name="seriesNumber" value="6">6</option>
												<option name="seriesNumber" value="7">7</option>
												<option name="seriesNumber" value="8">8</option>
												<option name="seriesNumber" value="9">9</option>
												<option name="seriesNumber" value="10">10</option>
											</select>
											<span class="am-form-caret"></span>
										</div>
										<button type="button" class="am-btn am-btn-primary am-radius" onclick="submitForm_filter_platform()">提交申请</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="am-u-md-12">
					<div class="card-box">
						<h4 class="header-title m-t-0 m-b-30">排序结果</h4>
						<div class="am-scrollable-horizontal am-text-ms" style="font-family: '微软雅黑';">
							<table class="am-table   am-text-nowrap">
								<thead>
									<tr>
										<th>数据1价值</th>
										<th>数据2价值</th>
										<th>数据3价值</th>
										<th>数据1重量</th>
										<th>数据2重量</th>
										<th>数据3重量</th>
										<th>数据1价值/重量</th>
										<th>数据2价值/重量</th>
										<th>数据3价值/重量</th>
									</tr>
								</thead>
								<tbody>
									<?php if(is_array($result_data)): $i = 0; $__LIST__ = $result_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?><tr>
											<?php if(is_array($m)): $i = 0; $__LIST__ = $m;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$k): $mod = ($i % 2 );++$i;?><td><?php echo ($k); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
										</tr><?php endforeach; endif; else: echo "" ;endif; ?>
								</tbody>
							</table>
						</div>
					</div>
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
	<script>
		function submitForm_filter_platform(){
			//获取form表单对象,提交选择项目
			var form = document.getElementById("select_form");
			form.submit();//form表单提交
		}
	</script>

</body>
</html>