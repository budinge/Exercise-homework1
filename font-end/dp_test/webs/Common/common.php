<?php
	// +----------------------------------------------------------------------
	// | 作	   者： songyb <1371626452@qq.com>
	// +----------------------------------------------------------------------
	// | 创建日期：2015-06-16
	// +----------------------------------------------------------------------
	// | 文件描述：项目全局公用函数
	// +----------------------------------------------------------------------
	// | 升级记录： 
	// +----------------------------------------------------------------------
	
	/**
	 * 获取当前登录用户信息
	 * @return NULL
	 */
	function get_user_info() {
		$data['userid'] = session('userid');
		$data['user_name'] = session('user_name');
		$data['user_real_name'] = session('user_real_name');
		$data['user_img'] = session('user_img');
		$data['roleid'] = session('roleid');
		$data['current_role'] = session('current_role');
		$data['current_role_name'] = session('current_role_name');
		return $data;
		
	}
	
	/**
	 * 判断用户是否登录
	 * @return boolean
	 */
	function is_login() {
		$model = new CommonModel();
		$userid = $model->getUserId();
		if(!empty($userid)) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * 获取用户角色
	 * @param string $userid
	 * @return string
	 */
	function get_user_role($userid) {
		$role_list = array();
		//查询当前用户已授权的角色
		$model = new UserRoleModel();
		$roleid = $model->where("userid = '".$userid."'")->getField('roleid',true);
		return $roleid;
	}
	
	/**
	 * 获取数据字典列表
	 * @param string $table_name
	 * @param string $field_name
	 * @return array
	 */
	function set_field_dict_list($table_name, $field_name, $remark = '') {
		$model = new FieldDictModel();
		$data = $model->field("field_value as id,
							   field_mean as name,
							   seq")
					  ->where("table_name = '".$table_name."'
						and field_name = '".$field_name."'
						and status = 'a'".
						($remark == '' ? '' : " and remark = '".$remark."'"))
					  ->order('seq')
					  ->select();
		return $data;
	}
	
	/**
	 * 获取数据字典列表
	 * @param string $name 系统选项名称
	 * @return string 系统选项值
	 */
	function get_system_option($name) {
		$model = new SystemOptionModel();
		$data = $model->where("name = '".$name."'")
					  ->getField("value");
		return $data;
	}
	
	/**
	 * 获取省份列表
	 * @return array
	 */
	function get_province_list() {
		$model = new ProvinceModel();
		$data = $model->field("code, name")->select();
		return $data;
	}
	
	/**
	 * 根据省份编码获取市州列表
	 * @param string $province_code
	 * @return array
	 */
	function get_city_list($province_code) {
		$model = new CityModel();
		$data = $model->field("code, name")
					  ->where("province_code = '".$province_code."'")
					  ->select();
		return $data;
	}
	
	/**
	 * 根据市州编码获取县区列表
	 * @param string $city_code
	 * @return string
	 */
	function get_area_list($city_code) {
		$model = new AreaModel();
		$data = $model->field("code, name")
					  ->where("city_code = '".$city_code."'")
					  ->select();
		return $data;
	}
	
	/**
	 * 获取网站角色列表
	 * @param string $webid
	 */
	function get_system_role() {
		$model = new RoleModel();
		$list = $model->field("id,
							   name")
					  ->where("type = 'a'")
					  ->order('seq')
					  ->select();
		return $list;
	}
	
	/**
	 * 获取角色名称
	 * @param string $roleid
	 * @return string
	 */
	function get_role_name($roleid) {
		$model = new RoleModel();
		$name = $model->where("id = '".$roleid."'")->getField('name');
		return $name;
	}
	
	/**
	 * 删除指定地址下的文件
	 * @param string $path 文件路径
	 */
	function delFile($path) {
		try {
      		if(file_exists($path)) {
       			unlink($path);
      		}
      	} catch (Exception $e) {
      		echo $e->getMessage();
      	}
	}
	
	/**
	 * 将文件大小换算成合适的单位
	 * @param int $size
	 * @return $size
	 */
	function convertSize($size) {
		// Adapted from: http://www.php.net/manual/en/function.filesize.php  
		$mod = 1024;
		$units = explode(' ', 'B KB MB GB TB PB');
		for($i = 0; $size > $mod; $i ++) {
			$size /= $mod;
		}
		return round($size, 2).' '.$units[$i];
	}
	
	/*============权限控制代码开始============*/
	
	/**
	 * 判断用户是否为超管（改写法考虑到扩展性，所以不直接通过session判断）
	 * @param unknown $userid
	 * @return boolean
	 */
	function is_super_admin($userid) {
		$model = new UserModel();
		$user_name = $model->where("id = '".$userid."'")->getField('name');
		if($user_name == 'admin') {
			return true;
		} else {
			return false;
		}
	}
?>