<?php
    /**
     * Created by dragon
     * Date: 2014-02-22
     * Time: 上午09:17
     */
    header("Content-Type: text/html; charset=utf-8");
    $file = $_POST['file'];
	try {
    	if(file_exists($path)) {
       		unlink($path);
        	echo '{"state":"1"}';   
      	}
    } catch (Exception $e) {
    	echo $e->getMessage();
        echo '{"state":"0"}';
    }
?>