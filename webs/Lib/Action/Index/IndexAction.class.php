<?php
/* +----------------------------------------------------------------------
 * 作       者: liyansong <1559393325@qq.com>
 +----------------------------------------------------------------------
 * 创建日期：2021-04-09
 +----------------------------------------------------------------------
 * 文件描述：算法求解，排序嵌入
 +----------------------------------------------------------------------
 * 升级记录：
 +----------------------------------------------------------------------
 */
class IndexAction extends CommonAction {
	public function index() {
        $this->display();
	}
	public function sort()
    {
        $this->display();
    }
    public function sortResult()
    {
        $data['fileName'] = $_REQUEST['fileName'];
        $data['seriesNumber'] = (int)$_REQUEST['seriesNumber'];
        $url = 'http://127.0.0.1:5000/sort';
        $return = $this->posturl($url, $data);
        $len=count($return,COUNT_NORMAL);
        for($i=0;$i<$len;$i++)
        {
            $str[$i]=str_ireplace(array('{','\'','}','p1','p2','p3',':','pw1','pw2','pw3','w1','w2','w3'), array('', '','','','','','','','',''), $return[$i]);
            $result[$i]=explode(",",$str[$i]);
        }
        if (Null != $return)
        {
            $this->success('排序成功');
			$this->assign('result_data',$result);
            $this->display('sort');
        }
        else
        {
            $this->error('排序失败',__APP__ . '?g=Index&m=Index&a=sort');
        }
    }

    function posturl($url,$data){
        ini_set('max_execution_time',0);
        $data  = json_encode($data);
        $headerArray = array("Content-type:application/json;charset='utf-8'","Accept:application/json");
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,FALSE);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl,CURLOPT_HTTPHEADER,$headerArray);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return json_decode($output,true);
    }
    public function scatter() {
        header("Cache-Control: no-cache, must-revalidate");
        $data['fileName'] = $_REQUEST['fileName'];
        $data['seriesNumber'] =  (int)$_REQUEST['seriesNumber'];
        $url = 'http://127.0.0.1:5000/';
        $pic_url='http://127.0.0.1:5000/static/1.png';
        $return=$this->posturl($url,$data);
		$this->success('排序成功');
        $this->assign('pic_url',$pic_url);
        $this->display();
    }
    public function salve() {
        $this->display();
    }
    public function salveResult()
    {
        $data['fileName'] = $_REQUEST['fileName'];
        $data['seriesNumber'] = (int)$_REQUEST['seriesNumber'];
        $data['maxWeight'] = (int)$_REQUEST['maxWeight'];
		if (Null == $data['maxWeight'])
        {
            $this->error('背包的最大重量未填',__APP__ . '?g=Index&m=Index&a=salve');
        }
        $url_flashBack = 'http://127.0.0.1:5000/flashBack';
        $url_dp = 'http://127.0.0.1:5000/dp';
        if ($_REQUEST['salve_function'] == flashback) {
            $flashBack_result = $this->posturl($url_flashBack, $data);
            $this->assign('salveResult',$flashBack_result);
            $this->display('salve');
        } else {
            $dp_result = $this->posturl($url_dp, $data);
            $this->assign('salveResult',$dp_result);
            $this->display('salve');
        }
    }
    public function dp(){

    }
    public function check(){
	    $this->display();
    }
    public function checkResult(){
        $data['fileName'] = $_REQUEST['fileName'];
        $data['seriesNumber'] =  (int)$_REQUEST['seriesNumber'];
        $data['maxWeight'] = (int)$_REQUEST['maxWeight'];
        $data['fileType'] =$_REQUEST['fileType'];
        $data['value']=$_REQUEST['value'];
        if (Null == $data['maxWeight'])
        {
            $this->error('背包的最大重量未填',__APP__ . '?g=Index&m=Index&a=check');
        }
        if (Null == $data['value'])
        {
            $this->error('运行错误',__APP__ . '?g=Index&m=Index&a=check');
        }
		$this->success('排序成功');
        $url = 'http://brp964.natappfree.cc/upload';
        $salve_return=$this->posturl($url,$data);
        $this->assign('salve_return',$salve_return);
        $this->display('check');
    }
}
?>