<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// |         lanfengye <zibin_5257@163.com>
// +----------------------------------------------------------------------

class Page {
    
    // 分页栏每页显示的页数
    public $rollPage = 5;
    // 页数跳转时要带的参数
    public $parameter  ;
    // 分页URL地址
    public $url     =   '';
    // 默认列表每页显示行数
    public $listRows = 20;
    // 起始行数
    public $firstRow    ;
    // 分页总页面数
    protected $totalPages  ;
    // 总行数
    protected $totalRows  ;
    // 当前页数
    protected $nowPage    ;
    // 分页的栏的总页数
    protected $coolPages   ;
    // 分页显示定制
    protected $config  =    array('header'=>'条记录','prev'=>'上一页','next'=>'下一页','first'=>'第一页','last'=>'最后一页','theme'=>' %totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %downPage% %first%  %prePage%  %linkPage%  %nextPage% %end%');
    // 默认分页变量名
    protected $varPage;

    /**
     * 架构函数
     * @access public
     * @param array $totalRows  总的记录数
     * @param array $listRows  每页显示记录数
     * @param array $parameter  分页跳转的参数
     */
    public function __construct($totalRows,$listRows='',$parameter='',$url='') {
        $this->totalRows    =   $totalRows;
        $this->parameter    =   $parameter;
        $this->varPage      =   C('VAR_PAGE') ? C('VAR_PAGE') : 'p' ;
        if(!empty($listRows)) {
            $this->listRows =   intval($listRows);
        }
        $this->totalPages   =   ceil($this->totalRows/$this->listRows);     //总页数
        $this->coolPages    =   ceil($this->totalPages/$this->rollPage);
        $this->nowPage      =   !empty($_REQUEST[C('VAR_PAGE')])?$_REQUEST[C('VAR_PAGE')]:1;
        if($this->nowPage<1){
            $this->nowPage  =   1;
        }elseif(!empty($this->totalPages) && $this->nowPage>$this->totalPages) {
            $this->nowPage  =   $this->totalPages;
        }
        $this->firstRow     =   $this->listRows*($this->nowPage-1);
        if(!empty($url))    $this->url  =   $url; 
    }

    public function setConfig($name,$value) {
        if(isset($this->config[$name])) {
            $this->config[$name]    =   $value;
        }
    }
    
	public function show() {
        if(0 == $this->totalRows) return '';
        $p              =   $this->varPage;
        $nowCoolPage    =   ceil($this->nowPage/$this->rollPage);
        if($this->nowPage < 1){
            $this->nowPage  =   1;
        }elseif(!empty($this->totalPages) && $this->nowPage>$this->totalPages) {
            $this->nowPage  =   $this->totalPages;
        }

        // 分析分页参数
        if($this->url){
            $depr       =   C('URL_PATHINFO_DEPR');
            $url        =   rtrim(U('/'.$this->url,'',false),$depr).$depr.'__PAGE__';
        }else{
            if($this->parameter && is_string($this->parameter)) {
                parse_str($this->parameter,$parameter);
            }elseif(is_array($this->parameter)){
                $parameter      =   $this->parameter;
            }elseif(empty($this->parameter)){
                unset($_GET[C('VAR_URL_PARAMS')]);
                //$var =  !empty($_POST)?$_POST:$_GET;
                //为了兼容get传过来的参数  by  xinglou 2015-10-2 
                $var =  $_REQUEST;
                unset($var[$p]);
                unset($var['numPerPage']);
                if(empty($var)) {
                    $parameter  =   array();
                }else{
                    $parameter  =   $var;
                }
            }
            $parameter[$p]  =   '__PAGE__';
            $url            =   U('',$parameter);
        }
        if(false !== strstr($url, 'numPerPage')) {
        	$url = substr($url, 0, strpos($url, 'numPerPage') - 1);
        }
        //<script><select/></script>
		$pageStr = '<script type="text/javascript">
			function PageEnterPress(obj, e){
				var nowPage = obj.value;
				var selObj = document.getElementById("pageJumpSelect");
				var numPerPage = selObj.options[selObj.selectedIndex].value;
				var e = e || window.event;
				if(e.keyCode == 13){
					window.location.href = "'.str_replace('__PAGE__','"+nowPage+"',$url).'&numPerPage="+numPerPage;
				}
			}
			function pageJump(selObj) { //v3.0
				var numPerPage = selObj.options[selObj.selectedIndex].value;
				window.location.href = "'.str_replace('__PAGE__','1',$url).'&numPerPage="+numPerPage;
			}
		</script>';
        // 组装分页字符串
        $pageStr .= '<div class="row mbm">
						<div class="col-lg-12">
							<div class="pagination-panel">
								第 &nbsp; ';
        
        //上下翻页字符串
        $upRow          =   $this->nowPage-1;
        $downRow        =   $this->nowPage+1;
        
        if($this->nowPage != 1) {
        	$pageStr .= '<a href="'.str_replace('__PAGE__',$upRow,$url)."&numPerPage=".$_REQUEST['numPerPage'].'" class="btn btn-sm btn-blue btn-prev gw-prev"><i class="fa fa-angle-left"></i></a>';
        } else {
        	$pageStr .= '<span class="btn btn-sm btn-blue btn-prev gw-prev" style="cursor:default;"><i class="fa fa-angle-left"></i></span>';
        }
        $pageStr .= '&nbsp;&nbsp;<input type="text" maxlenght="5" value="'.$this->nowPage.'" class="pagination-panel-input form-control input-mini input-inline input-sm text-center gw-page" onkeypress="PageEnterPress(this, event)" onkeydown="PageEnterPress(this)"/>&nbsp;&nbsp;';
        if($this->nowPage != $this->totalPages) {
        	$pageStr .= '<a href="'.str_replace('__PAGE__',$downRow,$url)."&numPerPage=".$_REQUEST['numPerPage'].'" class="btn btn-sm btn-blue btn-prev gw-next"><i class="fa fa-angle-right"></i></a>';
        } else {
        	$pageStr .= '<span class="btn btn-sm btn-blue btn-prev gw-next" style="cursor:default;"><i class="fa fa-angle-right"></i></span>';
        }
        $pageStr .= '&nbsp; 页&nbsp;共 '.$this->totalPages.' 页 | ';
        $pageStr .= '每页显示 &nbsp;
					<select class="form-control input-xsmall input-sm input-inline gw-pageSize" id="pageJumpSelect" onchange="javascript:pageJump(this);">
						<option value="1" '.($_REQUEST['numPerPage'] == '1' ? 'selected="selected"' : '').'>1</option>
						<option value="2" '.($_REQUEST['numPerPage'] == '2' ? 'selected="selected"' : '').'>2</option>
						<option value="20" '.($_REQUEST['numPerPage'] == '20' ? 'selected="selected"' : '').'>20</option>
						<option value="50" '.($_REQUEST['numPerPage'] == '50' ? 'selected="selected"' : '').'>50</option>
						<option value="100" '.($_REQUEST['numPerPage'] == '100' ? 'selected="selected"' : '').'>100</option>
						<option value="200" '.($_REQUEST['numPerPage'] == '200' ? 'selected="selected"' : '').'>200</option>
						<option value="500" '.($_REQUEST['numPerPage'] == '500' ? 'selected="selected"' : '').'>500</option>
					</select>';
        $pageStr .= '&nbsp; 条记录 | 共 '.$this->totalRows.' 条记录
					</div>
				</div>
			</div>';
        return $pageStr;
	}
    /**
     * 分页显示输出
     * @access public
     */
    public function show_old() {
        if(0 == $this->totalRows) return '';
        $p              =   $this->varPage;
        $nowCoolPage    =   ceil($this->nowPage/$this->rollPage);

        // 分析分页参数
        if($this->url){
            $depr       =   C('URL_PATHINFO_DEPR');
            $url        =   rtrim(U('/'.$this->url,'',false),$depr).$depr.'__PAGE__';
        }else{
            if($this->parameter && is_string($this->parameter)) {
                parse_str($this->parameter,$parameter);
            }elseif(is_array($this->parameter)){
                $parameter      =   $this->parameter;
            }elseif(empty($this->parameter)){
                unset($_GET[C('VAR_URL_PARAMS')]);
                $var =  !empty($_POST)?$_POST:$_GET;
                if(empty($var)) {
                    $parameter  =   array();
                }else{
                    $parameter  =   $var;
                }
            }
            $parameter[$p]  =   '__PAGE__';
            $url            =   U('',$parameter);
        }
        //上下翻页字符串
        $upRow          =   $this->nowPage-1;
        $downRow        =   $this->nowPage+1;
        if ($upRow>0){
            $upPage     =   "<a href='".str_replace('__PAGE__',$upRow,$url)."'>".$this->config['prev']."</a>";
        }else{
            $upPage     =   '';
        }

        if ($downRow <= $this->totalPages){
            $downPage   =   "<a href='".str_replace('__PAGE__',$downRow,$url)."'>".$this->config['next']."</a>";
        }else{
            $downPage   =   '';
        }
        // << < > >>
        if($nowCoolPage == 1){
            $theFirst   =   '';
            $prePage    =   '';
        }else{
            $preRow     =   $this->nowPage-$this->rollPage;
            $prePage    =   "<a href='".str_replace('__PAGE__',$preRow,$url)."' >上".$this->rollPage."页</a>";
            $theFirst   =   "<a href='".str_replace('__PAGE__',1,$url)."' >".$this->config['first']."</a>";
        }
        if($nowCoolPage == $this->coolPages){
            $nextPage   =   '';
            $theEnd     =   '';
        }else{
            $nextRow    =   $this->nowPage+$this->rollPage;
            $theEndRow  =   $this->totalPages;
            $nextPage   =   "<a href='".str_replace('__PAGE__',$nextRow,$url)."' >下".$this->rollPage."页</a>";
            $theEnd     =   "<a href='".str_replace('__PAGE__',$theEndRow,$url)."' >".$this->config['last']."</a>";
        }
        // 1 2 3 4 5
        $linkPage = "";
        for($i=1;$i<=$this->rollPage;$i++){
            $page       =   ($nowCoolPage-1)*$this->rollPage+$i;
            if($page!=$this->nowPage){
                if($page<=$this->totalPages){
                    $linkPage .= "<a href='".str_replace('__PAGE__',$page,$url)."'>".$page."</a>";
                }else{
                    break;
                }
            }else{
                if($this->totalPages != 1){
                    $linkPage .= "<span class='current'>".$page."</span>";
                }
            }
        }
        $pageStr     =   str_replace(
            array('%header%','%nowPage%','%totalRow%','%totalPage%','%upPage%','%downPage%','%first%','%prePage%','%linkPage%','%nextPage%','%end%'),
            array($this->config['header'],$this->nowPage,$this->totalRows,$this->totalPages,$upPage,$downPage,$theFirst,$prePage,$linkPage,$nextPage,$theEnd),$this->config['theme']);
        return $pageStr;
    }

}
