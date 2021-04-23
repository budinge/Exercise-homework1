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
              <div class="am-u-sm-12">
                  <div class="card-box">
                      <h4 class="header-title m-t-0 m-b-30">D{0-1}KP算法测试</h4>
                      <div class="am-g">
                          <div class="am-u-md-12">
                              <form class="am-form am-text-sm"  action="__APP__?g=<?php echo GROUP_NAME;?>&m=<?php echo MODULE_NAME;?>&a=checkResult" method="post" id="select_form">
                                  <div class="am-g">
                                      <div style="float:left;" class="am-form-group am-u-md-12">
                                          <label for="doc-ta-1">题目背景</label>
                                          <p>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;背包问题（Knapsack Problem，KP）是NP Complete问题，也是一个经典的组合优化问题，有着广泛而重要的应用背景。{０-1}背包问题（{0-1 }Knapsack Problem，{0-1}KP）是最基本的KP问题形式，它的一般描述为：从若干具有价值系数与重量系数的物品（或项）中，选择若干个装入一个具有载重限制的背包，如何选择才能使装入物品的重量系数之和在不超过背包载重前提下价值系数之和达到最大？

                                            &nbsp; &nbsp;&nbsp;
                                          </p>
                                          <p>
                                            &nbsp; &nbsp; &nbsp; &nbsp; D{0-1} KP 是经典{ 0-1}背包问题的一个拓展形式，用以对实际商业活动中折扣销售、捆绑销售等现象进行最优化求解，达到获利最大化。D{0-1}KP数据集由一组项集组成，<span style="color: rgb(255, 0, 0);">每个项集有3项物品可供背包装入选择</span>，<span style="color: rgb(255, 0, 0);">其中第三项价值是前两项之和</span>，<span style="color: rgb(255, 0, 0);">第三项的重量小于其他两项之和</span>，算法求解过程中，如果选择了某个项集，<span style="color: rgb(255, 0, 0);">则需要确定选择项集的哪个物品，每个项集的三个项中至多有一个可以被选择装入背包</span>，D{0-1} KP问题要求计算在不超过背包载重量 的条件下，从给定的一组项集中选择满足要求装入背包的项，使得装入背包所有项的价值系数之和达到最大；D{0-1}KP instances数据集是研究D{0-1}背包问题时，用于评测和观察设计算法性能的标准数据集；
                                          </p>
                                      </div>
                                  </div>
                                  <div class="am-g">
                                      <div style="float:left;" class="am-form-group am-u-md-12">
                                          <label for="doc-ta-1">测评代码</label>
                                          <br>
                                          <textarea id="value" rows="50" name="value" style="height:500px;"></textarea>
                                      </div>
                                  </div>
                                  <div class="am-g">
                                      <div class="am-u-md-3">
                                          <label class="am-md-text-right" style="float:left;" for="doc-select-1">文件：</label>
                                          <select name="fileName" class="am-md-text-right" style="float:left;width:150px;"id="doc-select-1">
                                              <option name="fileName" value="idkp1-10.txt">idkp1-10.txt</option>
                                              <option name="fileName" value="sdkp1-10.txt">sdkp1-10.txt</option>
                                              <option name="fileName" value="wdkp1-10.txt">wdkp1-10.txt</option>
                                              <option name="fileName" value="udkp1-10.txt">udkp1-10.txt</option>
                                          </select>
                                      </div>
                                      <div class="am-u-md-2">
                                          <label class="am-md-text-right"style="float: left;margin-top:5px;" for="doc-select-1">组数：</label>
                                          <select name="seriesNumber" class="am-md-text-right" style="float:right;width:120px;"  id="doc-select-1">
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
                                      </div>
                                      <div class="am-u-md-3">
                                          <label class="am-md-text-right" style="float:left;margin-top:5px; for="doc-select-1">背包最大容量:</label>
                                          <input class="form-control" name="maxWeight" style="width:150px; id="doc-select-1" >
                                      </div>
                                      <div class="am-u-md-2">
                                            <label class="am-md-text-right" style="float:left;" for="doc-select-1">语言：</label>
                                                <select class="am-md-text-right" name="fileType" style="width:100px;" id="doc-select-1">
                                                    <option value="java">Java</option>
                                                    <option value="c">C</option>
                                                    <option value="py">Python</option>
                                                </select>
                                            <span class="am-form-caret"></span>
                                      </div>
                                      <button type="button" class="am-btn am-btn-primary am-radius" onclick="submitForm_filter_platform()">提交代码</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="am-u-sm-12">
                  <div class="card-box">
                      <div class="am-form-group   am-form-feedback">
                          <div class="am-g">
                              <label class="am-u-md-2" for="doc-ipt-success">求解结果为：</label>
                              <span class="am-form-caret" STYLE="color: #C22F00"><?php echo ($salve_return["userOutStr"]); ?></span>
                          </div>
                          <div class="am-g">
                              <label class="am-u-md-2" for="doc-ipt-success">求解时间为：</label>
                              <span class="am-form-caret" STYLE="color: #C22F00"><?php echo ($salve_return["runTime"]); ?></span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      <!-- Row end -->
      </div>
  </div>
  <!-- end right Content here -->
  <a href="admin-offcanvas" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"><!--<i class="fa fa-bars" aria-hidden="true"></i>--></a>
  <script type="text/javascript" src="../Public/js/jquery-2.1.0.js" ></script>
  <script type="text/javascript" src="../Public/js/amazeui.min.js"></script>
  <script type="text/javascript" src="../Public/js/app.js" ></script>
  <script type="text/javascript" src="../Public/js/blockUI.js" ></script>
    <script>
        function submitForm_filter_platform(){
            //获取form表单对象,提交选择项目
            var form = document.getElementById("select_form");
            form.submit();//form表单提交
        }
    </script>

</body>
</html>