<?php
/* +----------------------------------------------------------------------
 * 作	   者: xinglou <xinglou1@foxmail.com>
 +----------------------------------------------------------------------
 * 创建日期：2015-06-24
 +----------------------------------------------------------------------
 * 文件描述：公用方法
 +----------------------------------------------------------------------
 * 升级记录： 
 +----------------------------------------------------------------------
*/
class CommonAction extends Action {	
	/**
	 * 初始化方法
	 */
	public function _initialize() {		
		// 查询用户基本信息
		$data = get_user_info();
		$this->assign('login_user_info', $data);
		$userid = session('userid');
		if(MODULE_NAME <> 'Index' && (empty($userid))) {
			$this->assign('jumpUrl', __APP__.'?g=Index&m=Index&a=login');
			$this->error('您没有登录或您的登录信息已丢失，请重新登陆！');
		}
	}
	
	/**
	 * 删除指定地址下的文件
	 * @param string $path 文件路径
	 */
	public function delFile($path) {
		try {
	  		if(file_exists($path)) {
	   			unlink($path);
	  		}
		} catch(Exception $e) {
	  		echo $e->getMessage();
		}
	}	
	
	/**
	 * 时间格式转换  秒---时：分：秒  
	 * @param int $seconds
	 * @return 格式化时间
	 */
	function changeTimeType($seconds) {
		if($seconds > 3600) {
			$hours = intval($seconds / 3600);
			$minutes = $seconds / 600;
			$time = $hours.":".gmstrftime('%M:%S', $minutes);
		} else {
			$time = gmstrftime('%H:%M:%S', $seconds);
		}
		return $time;
	}
	
	/**
	 * 获取登录用户ID
	 * @return 用户ID
	 */
	function get_userid() {
		return session('userid');
	}
	
	/**
	 * 获取登录用户名
	 * @return 用户名
	 */
	function get_user_name() {
		return session('user_name');
	}
	
	/**
	 * 获取登录用户真实姓名
	 * @return 用户真实姓名
	 */
	function get_user_real_name() {
		return session('user_real_name');
	}
	
	/**
	 * 获取系统日期
	 * @return 例如：2016-07-18 04:08:36
	 */
	function get_date() {
		return date('Y-m-d H:i:s');
	}
	
	/**
	 * 文件夹打包成zip文件
	 * @param string $path
	 * @param string $zip
	 */
	function addFileToZip($path, $zip) {
		$handler = opendir($path); 										// 打开当前文件夹由$path指定。
		while(($filename = readdir($handler)) !== false) {
			if($filename != "." && $filename != "..") {                 // 文件夹文件名字为'.'和‘..’，不要对他们进行操作
				if(is_dir($path."/".$filename)) {						// 如果读取的某个对象是文件夹，则递归
					$this->addFileToZip($path."/".$filename, $zip);
				} else { 												// 将文件加入zip对象
					$zip->addFile($path."/".$filename);
				}
			}
		}
		@closedir($path);
	}
	
	/**
	 * 移动文件夹
	 * @param string $source
	 * @param string $target
	 */
	function move_d($source, $target) {
		if(is_dir($source)) {
			$dest_name = basename($source);
	   		$creat_dir = $target."/".$dest_name;
	   		if(!is_dir($creat_dir)) {
	   			mkdir($creat_dir, 0777);
	   		}
	   		$d = dir($source);
	   		while(($entry = $d->read()) !== false) {
	   			if(is_dir($source."/".$entry)) {
	   				if($entry == "." || $entry == "..") {
	   					continue;
	   				} else {
	   					$se = $source."/".$entry;
		  				$td = $target."/".$dest_name;
		  				$this->move_d($se,$td);
		 			}
				} else {
					$se = $source."/".$entry;
		 			$tde = $target."/".$dest_name."/".$entry;
			 		copy($se, $tde);
				}
	   		}
	 	} else {
	 		$se = $source."/".$entry;
	 		$td = $target."/".$dest_name;
	 		copy($se, $td);
	 	}
	 	//删除源目录
	 	$this->delDir($source);
	 	return true;
	}
	
	 /**
	 * 删除整个目录
	 * @param $dir
	 * @return bool
	 */
	function delDir($dir) {
		// 先删除目录下的所有文件：
		$dh = opendir($dir);
		while($file = readdir($dh)) {
			if($file != "." && $file != ".." ) {
				$fullpath = $dir."/".$file;
				if(!is_dir($fullpath)) {
					unlink($fullpath);
				} else {
					$this->delDir($fullpath);
				}
			}
		}
		closedir($dh);
		// 删除当前文件夹：
		return rmdir($dir);
	}
	
	/**
	 * 正则去掉字符串中的html标签
	 * @param unknown $str
	 * @return string
	 */
	function filterHtml($str) {
		$str = str_replace("&nbsp;","",strip_tags($str));
		$str = preg_replace('/((\s)*(\n)+(\s)*)/i','', $str);
		$str = trim($str);
		return $str;
	}
}
?>