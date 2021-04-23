<?php
return array(
	//'配置项'=>'配置值'
	'URL_MODEL'            	 	=> 0,
	'DB_TYPE'              		=> 'mysqli',         			 					// 数据库类型
    'DB_HOST'            	   	=> 'localhost',     		 						// 服务器地址
    'DB_NAME'               	=> 'thesis',          			 					// 数据库名
    'DB_USER'               	=> 'root',          			 					// 用户名
    'DB_PWD'                	=> 'root',  			 					// 密码
    'DB_PORT'               	=> '3306',          			 					// 端口
	'DB_PREFIX'					=> '',											 	// 数据库表前缀

    'PAGESIZE'              	=> 20,               			 					// 配置每页显示数据个数
	'VAR_PAGE'					=> 'pageNum',					 					// 分页变量名称
	'PAGE_NUM_SHOWN'			=> '10',						 					// 页标数字显示数目	
	
    'APP_GROUP_LIST' 			=> 'Admin,Index',
    'DEFAULT_GROUP' 			=> 'Index',
	'ADMIN_NAME'				=> 'admin',											// 超级管理员名称
	
	//主题配置
	'DEFAULT_THEME'				=> 'Default',										// 模板定义
    'DEFAULT_CHARSET' 			=> 'utf-8',

	'SITENAME'					=> '论文选题系统',
	'ROOT_URL'					=> 'http://thesis.xbjsyx.com',
	'UNIT'						=> '重庆第二师范学院 教师教育学院',
	'COPYRIGHT'					=> '版权所有&copy;重庆第二师范学院 教师教育学院 All Rights Reserved',
	'PASSWORD'					=> '666666',					 					// 默认密码
	'SHOW_PAGE_TRACE'			=> false,						 					// 显示调试信息
    'SHOW_ERROR_MSG'        	=> false,            			 					// 显示错误信息
    'SHOW_PAGE_TRACE'       	=> false,           				 					// 显示页面Trace信息
	'FFDEBUG'					=> false,						 					// 开启firebug调试
	'APP_DEBUG'             	=> false,

	
	//用户头像
	'USER_IMG'					=> 'user_img/',					
	'USER_IMG_MAX_SIZE'			=> 1024000,					
	'USER_IMG_ALLOWEXTS'		=> array('jpg','gif','png','jpeg','bmp'),

	
	//错误跳转
	'TMPL_ACTION_ERROR' 		=> './Public/skip/error.html', 							// 失败跳转
	'TMPL_ACTION_SUCCESS' 		=> './Public/skip/success.html', 						// 成功跳转
    'TMPL_CACHE_ON'             => false,
    'HTML_CACHE_ON'             => false

);		
?>