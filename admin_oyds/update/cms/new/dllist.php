<?php
		
$dlfile = $this->dlfile();
if($this->info['action'] == 'check'){
	unlink($this->savedir."install.class.php");
	$re = $dlfile->dlfile('install.class.php', $this->savedir.'install.class.php', $this->info['checknum']);
	if($re != 1){
		jsoncallback($this->fail_data("升级错误","下载安装文件失败！"));
		die();
	}
}
require_once $this->savedir.'install.class.php';
foreach ($syslist as $key => $val) {
	if ($key == $_M['config']['metcms_v']) {
		if(file_exists($this->savedir."file/v{$val}/dllist.php")){
			require_once $this->savedir."file/v{$val}/dllist.php";
		}else{
			$re = $dlfile->dlfile("file/v{$val}/dllist.php", $this->savedir."file/v{$val}/dllist.php", $this->info['checknum']);
			if($re != 1){
				jsoncallback($this->fail_data("升级错误","下载文件列表失败！"));
				die();
			}
		}
		$sys_u = $val;
	}
}
require_once $this->savedir."file/v{$sys_u}/dllist.php";
if($this->info['action'] == 'check'){
	foreach($dllist as $key=>$val){
		$dllist[$key] = str_replace("file/v{$sys_u}/"  ,'', $val);
	}
}
?>