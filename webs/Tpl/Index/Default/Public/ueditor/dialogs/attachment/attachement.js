/**
 * 媒体管理
 */
var g = $G,
    ajax = parent.baidu.editor.ajax;
var swfupload,
    filesList=[];
    /**
     * TAB切换
     * @param tabParentId  tab的父节点ID或者对象本身
     */
function changeSelected(o,id,url,fileType,original) {
	if (o.getAttribute("selected")) {
		for(var i=0,ci;ci=filesList[i++];){
         	if(id == ci.id){
         		filesList.splice(i,1);
         	}
		}
		o.removeAttribute("selected");
		o.style.cssText = "filter:alpha(Opacity=100);-moz-opacity:1;opacity: 1;border: 2px solid #fff";
     } else {
		filesList.push({id:id,url:url,type:fileType,original:original});
		o.setAttribute("selected", "true");
		o.style.cssText = "filter:alpha(Opacity=50);-moz-opacity:0.5;opacity: 0.5;border:2px solid blue;";
	}
}
//搜索媒体文件
function searchMedia() {
	//加载附件
    if(editor.options.enableMediaManage){
        ajax.request(editor.options.mediaViewURL, {  
            timeout: 10000,  
            action: "get",  
             //是否是异步请求。 true为异步请求， false为同步请求
            async: false,
            data: {
            	objid:editor.options.MEDIA_OBJID,
            	type:g('imgType').value,
                key:(g("imgSearchTxt").value == lang.searchInitInfo)?"":g("imgSearchTxt").value
            },
            onsuccess: function(xhr) {
                var tmp = eval('('+xhr.responseText+')');
                if(tmp.status == 1){
	                //当服务器没上传文件的时候
                	if(tmp.data == null){
                		g("fileManager").style.display = "";  
	                    g("fileListView").style.display = "";  
	                    g("fileListView").innerHTML = "  当前未上传过任何媒体文件！";  
                	} else {  
	                	g("fileListView").innerHTML = "";  
	                }  
	
	                for (var i = 0, len = tmp.data.length; i < len; i++) {
	                    //文件真实地址  
	                    var url = editor.options.UEDITOR_HOME_URL + tmp.data[i].path;  
							                                         
		             	var divMediainfo = document.createElement("div");
		             	divMediainfo.className = "mediainfo";
		             	divMediainfo.id = "media_"+tmp.data[i].id;
		             	var defaultImg = "icon/"+tmp.data[i].ext.substr(1)+".png";
		             	if(('.gif,.png,.jpg,.jpeg,.bmp').indexOf(tmp.data[i].ext) >=0){
		             		defaultImg = editor.options.filePath + tmp.data[i].path;  
		             	}
		             	divMediainfo.innerHTML = "	<div class='fl thumb'>"+
				             					"		<ul>"+
				             					"			<li><img src='"+defaultImg+"' onclick=\"changeSelected(this,'"+tmp.data[i].id+"','"+tmp.data[i].path+"','"+tmp.data[i].ext+"','"+tmp.data[i].name+"');\"/></li>"+
				             					"		</ul>"+
				             					"	</div>"+
				             					"	<div class='fl fileinfo'>"+
				             					"		<ul>"+
				             					"			<li>标题："+tmp.data[i].name+"</li>"+
				             					"			<li>文件大小："+tmp.data[i].size+"</li>"+
				             					"			<li>上传日期："+tmp.data[i].update_date+"</li>"+
				             					"			<li class='fr'><a href='" + editor.options.filePath + tmp.data[i].path+"' target='_blank'>预览 </a>"+
				             					"						   <a href=\"javascript:deleteMedia('" + tmp.data[i].path+"','"+tmp.data[i].id+"');\"> 永久删除</a></li>"+
				             					"		</ul>"+
				             					"	</div>";
	        			g("fileListView").appendChild(divMediainfo);
	                }
                }else{
                	alert(tmp.info);
                }
            },  
            onerror: function() {  
                g("fileListView").innerHTML = "糟糕，附件读取失败了！";  
            }  
        });  
    }
}
//删除媒体文件
function deleteMedia(file,mediaid){
	if(!confirm('您确定要删除该媒体文件吗？')) return;
	var ret = 0;
	if(editor.options.enableMediaManage){
        //上传成功之后将附件信息写入媒体库
        ajax.request(editor.options.mediaDelURL, {
            method: 'GET',
            timeout: 10000,
            //是否是异步请求。 true为异步请求， false为同步请求
            async: false,
            data: {
            	objid:editor.options.MEDIA_OBJID,
                id:mediaid
            },
            //请求成功后的回调， 该回调接受当前的XMLHttpRequest对象作为参数。
            onsuccess: function ( xhr ) {
            	var info = eval('('+xhr.responseText+')');
            	ret  = info.status;
            	if(info.status == 0){
                	alert(info.info);
            	}
            },
            //请求失败或者超时后的回调。
            onerror: function ( xhr ) {
            	alert('请求失败或者超时');
            }
        });
    }else{
    	ret = 1;
    }
	//如果启用了媒体管理功能，先删除数据库记录，然后删除附件
    if(ret == 1){
		//先删除附件
	    ajax.request(editor.options.UEDITOR_HOME_URL+"/php/fileDel.php", {
	        method: 'POST',
	        timeout: 10000,
	        //是否是异步请求。 true为异步请求， false为同步请求
	        async: false,
	        data: {
	        	file:file
	        },
	        //请求成功后的回调， 该回调接受当前的XMLHttpRequest对象作为参数。
	        onsuccess: function ( xhr ) {
	        	try{
	        	var info = eval('('+xhr.responseText+')');
	        	ret  = info.state;
	        	if(info.state == 0){
	            	alert('删除媒体文件失败');
	        	}else{	 
	        		var delDiv = g("media_"+mediaid);
	        		delDiv.parentNode.removeChild(delDiv);
	        	}
	        	}catch(e){
	        		alert(e.message);
	        	}
	        },
	        //请求失败或者超时后的回调。
	        onerror: function ( xhr ) {
	            alert('请求失败或者超时');
	        }
	    });
    }
}

function switchTab(tabParentId, keepFocus) {
     var tabElements = $G(tabParentId).children,  
         tabHeads = tabElements[0].children,  
         tabBodys = tabElements[1].children;  
     var map = fileTypeMaps;  
     for (var i = 0, length = tabHeads.length; i < length; i++) {  
         var head = tabHeads[i];  
         domUtils.on(head, "click", function() {  
	         //head样式更改  
	         for (var k = 0, len = tabHeads.length; k < len; k++) {  
	             if (!keepFocus) tabHeads[k].className = "";  
	         }  
	         this.className = "focus";  
	         //body显隐  
	         var tabSrc = this.getAttribute("tabSrc");  
	         for (var j = 0, length = tabBodys.length; j < length; j++) {  
	             var body = tabBodys[j],  
	             id = body.getAttribute("id");  
	
	             if (id == tabSrc) {  
	                 body.style.display = "";  
	                 if (id == "fileManager") {  
						
	                     //转换到文件管理TAB时，显示DIV里的内容  
	                     g("fileManager").style.display = "";  
	                     g("fileListView").style.display = "";  
	                     //加载附件
	                     searchMedia();
	                 }  
	
	                 //当切换到本地附件上传时，隐藏遮罩用的iframe  
	                 if (id == "file") {  
	                     g("fileManager").style.display = "none";  
	                     g("fileListView").style.display = "none";  
	                 }  
	             }else {  
	                 body.style.display = "none";  
	             }  
	     	}  
         });  
    }  
}  
editor.setOpt({
    fileFieldName:"upfile"
});


function selectTxt(node) {
    if (node.select) {
        node.select();
    } else {
        var r = node.createTextRange && node.createTextRange();
        r.select();
    }
}
function addSearchListener() {
    g("imgSearchTxt").onclick = function () {
        selectTxt(this);
        this.setAttribute("hasClick", true);
        if (this.value == lang.searchInitInfo) {
            this.value = "";
        }
    };
    g("imgSearchTxt").onkeyup = function () {
        this.setAttribute("hasClick", true);
        //只触发一次
        this.onkeyup = null;
    };

    g("imgSearchBtn").onclick = function () {
        searchMedia();
    };
    domUtils.on(g("imgSearchTxt"), "keyup", function (evt) {
        if (evt.keyCode == 13) {
            searchImage();
        }
    })
}
function insertImage(imgObjs) {
    editor.fireEvent('beforeInsertImage', imgObjs);
    editor.execCommand("insertImage", imgObjs);
}
 
window.onload = function () {
    var settings = {
        upload_url:editor.options.fileUrl,           //附件上传服务器地址
        file_post_name:editor.options.fileFieldName,      //向后台提交的表单名
        flash_url:"../../third-party/swfupload/swfupload.swf",
        flash9_url:"../../third-party/swfupload/swfupload_fp9.swf",
        post_params:{"PHPSESSID":"<?php echo session_id(); ?>","fileNameFormat": editor.options.fileNameFormat,"objid":editor.options.MEDIA_OBJID}, //解决session丢失问题
        file_size_limit:"1000 MB",                                 //文件大小限制，此处仅是前端flash选择时候的限制，具体还需要和后端结合判断
        file_types:"*.*",                                         //允许的扩展名，多个扩展名之间用分号隔开，支持*通配符
        file_types_description:"All Files",                      //扩展名描述
        file_upload_limit:100,                                   //单次可同时上传的文件数目
        file_queue_limit:10,                                      //队列中可同时上传的文件数目
        custom_settings:{                                         //自定义设置，用户可在此向服务器传递自定义变量
            progressTarget:"fsUploadProgress",
            startUploadId:"startUpload"
        },
        debug:false,

        // 按钮设置
        button_image_url:"../../themes/default/images/filescan.png",
        button_width:"100",
        button_height:"25",
        button_placeholder_id:"spanButtonPlaceHolder",
        button_text:'<span class="theFont">'+lang.browseFiles+'</span>',
        button_text_style:".theFont { font-size:14px;}",
        button_text_left_padding:10,
        button_text_top_padding:4,

        // 所有回调函数 in handlersplugin.js
        swfupload_preload_handler:preLoad,
        swfupload_load_failed_handler:loadFailed,
        file_queued_handler:fileQueued,
        file_queue_error_handler:fileQueueError,
        //选择文件完成回调
        file_dialog_complete_handler:function(numFilesSelected, numFilesQueued) {
            var me = this;        //此处的this是swfupload对象
            if (numFilesQueued > 0) {
                dialog.buttons[0].setDisabled(true);
                var start = $G(this.customSettings.startUploadId);
                start.style.display = "";
                start.onclick = function(){
                    me.startUpload();
                    start.style.display = "none";
                }
            }
        },
        upload_start_handler:uploadStart,
        upload_progress_handler:uploadProgress,
        upload_error_handler:uploadError,
        upload_success_handler:function (file, serverData) {
            try{
                var info = eval("("+serverData+")");
            } catch(e) {
            	alert("服务器返回数据错误！");
            }
            var progress = new FileProgress(file, this.customSettings.progressTarget);
            if(info.state=="SUCCESS"){
                progress.setComplete();
                progress.setStatus("<span style='color: #0b0;font-weight: bold'>"+lang.uploadSuccess+"</span>");
                filesList.push({id:'upload',url:info.url,type:info.fileType,original:info.original});
                progress.toggleCancel(true,this,lang.delSuccessFile);
                if(editor.options.enableMediaManage){
                    //上传成功之后将附件信息写入媒体库
                    ajax.request(editor.options.mediaAddURL, {
                        method: 'GET',
                        timeout: 10000,
                        //是否是异步请求。 true为异步请求， false为同步请求
                        async: false,
                        data: {
                        	objid:editor.options.MEDIA_OBJID,
                            name:info.original,
                            path:info.url,
                            min_path:'test',
                            ext:info.fileType,
                            size:info.size
                        },
                        //请求成功后的回调， 该回调接受当前的XMLHttpRequest对象作为参数。
                        onsuccess: function ( xhr ) {
                        	var ret = eval('('+xhr.responseText+')');
                        	if(ret.status == 0){
                            	alert(ret.info);
                        	}
                        },
                        //请求失败或者超时后的回调。
                        onerror: function ( xhr ) {
                        	alert('请求失败或者超时');
                        }
                    });
                }
            }else{
                progress.setError();
                progress.setStatus(info.state);
                progress.toggleCancel(true,this,lang.delFailSaveFile);
            }

        },
        //上传完成回调
        upload_complete_handler:uploadComplete,
        //队列完成回调
        queue_complete_handler:function(numFilesUploaded){
            dialog.buttons[0].setDisabled(false);
            var status = $G("divStatus");
            var num = status.innerHTML.match(/\d+/g);
            status.innerHTML = ((num && num[0] ?parseInt(num[0]):0) + numFilesUploaded) +lang.statusPrompt;
        }
    };
    swfupload = new SWFUpload( settings );
    //点击OK按钮
    dialog.onok = function(){
        var map = fileTypeMaps,
            str="";
        for(var i=0,ci;ci=filesList[i++];){
        	//如果是图片
        	if(('.gif,.png,.jpg,.jpeg,.bmp').indexOf(ci.type) >= 0){
        		imgObj = {};
        		imgObj.src = editor.options.filePath + ci.url;
                imgObj._src = editor.options.filePath + ci.url;
                imgObj.width = "400";
                imgObj.height = "400";
                imgObj.floatStyle = "center";
                imgObj.title = ci.name;
                imgObj.style = "width:100px;height:100px;";
                insertImage(imgObj);
        	}else if(('.flv,.mp4').indexOf(ci.type) >= 0){//如果是视频                	
        		var width = "400",
                    height = "400",
                    url= editor.options.filePath + ci.url;
                if(!url) return false;
                editor.execCommand('insertvideo', {
                    url: url,
                    width: width,
                    height: height,
                    align: "center",
                    type: "localVideo"
                }, null); 
        	}else if(('.mp3').indexOf(ci.type) >= 0){//如果是音频
        		try{
                    editor.execCommand('music', {
                        url:editor.options.filePath + ci.url,
                        width:400,
                        height:95
                    }); 
            	}catch(e){
            		alert(e.message);
            	}  
                
        	}else{//其他附件
                var src = editor.options.UEDITOR_HOME_URL + "dialogs/attachment/fileTypeImages/"+(map[ci.type]||"icon_default.png");
                str += "<p style='line-height: 16px;'><img src='"+ src + "' _src='"+src+"' />" +
                       "<a href='"+editor.options.filePath + ci.url+"'>" + ci.original + "</a></p>";
        	}
        }
        editor.execCommand("insertHTML",str);
        swfupload.destroy();
    };
    dialog.oncancel = function(){
        swfupload.destroy();
    }
    switchTab("fileTab");  
    addSearchListener(); 
};
