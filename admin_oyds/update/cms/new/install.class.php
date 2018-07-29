<?php

defined('IN_MET') or exit('No permission');

$_M['syslist'] = array();
$_M['sysnews'] = '5.3.17';
$_M['syslist']['5.3.0'] = '5.3.1';
$_M['syslist']['5.3.1'] = '5.3.2';
$_M['syslist']['5.3.2'] = '5.3.3';
$_M['syslist']['5.3.3'] = '5.3.4';
$_M['syslist']['5.3.4'] = '5.3.5';
$_M['syslist']['5.3.5'] = '5.3.6';
$_M['syslist']['5.3.6'] = '5.3.7';
$_M['syslist']['5.3.7'] = '5.3.8';
$_M['syslist']['5.3.8'] = '5.3.9';
$_M['syslist']['5.3.9'] = '5.3.10';
$_M['syslist']['5.3.11'] = '5.3.12';
$_M['syslist']['5.3.10'] = '5.3.11';
$_M['syslist']['5.3.12'] = '5.3.13';
$_M['syslist']['5.3.13'] = '5.3.14';
$_M['syslist']['5.3.14'] = '5.3.15';
$_M['syslist']['5.3.15'] = '5.3.16';
$_M['syslist']['5.3.16'] = '5.3.17';
$_M['syslist']['5.3.17'] = '5.3.18';
$_M['syslist']['5.3.18'] = '5.3.19';
$_M['syslist']['5.3.19'] = '6.0.0';
// if($_M['config']['met_weburl'] == 'http://localhost/metv5/'){

       $_M['sysnews'] = '6.1.0';
       $_M['syslist']['6.0.0'] = '6.1.0';
 // }
$syslist = $_M['syslist'];
class install {
	public $syslist;
	public $step;
	public $html;
	function __construct() {
		global $_M;
		$this->syslist = $_M['syslist'];
		$this->sysnews = $_M['sysnews'];
	}
	public function dosql() {
		global $_M;
		foreach ($this->syslist as $keysyslist => $valsyslist) {
			if ($keysyslist == $_M['config']['metcms_v']) {
				$authinfo=DB::get_one("SELECT * FROM {$_M['config']['tablepre']}otherinfo where id=1");
				$url=DB::get_one("SELECT * FROM {$_M['config']['tablepre']}config where name='met_weburl'");
				$met_host='api.metinfo.cn';
				$met_file='/dl/record_dl.php';
				if(!($authinfo['authcode']&&$authinfo['authpass'])){
				$post_data = array('cmd'=>'sys','url'=>$url['value'],'code'=>$authinfo['authcode'],'key'=>$authinfo['authpass'],'ver'=>"$keysyslist");
				$curlHandle = curl_init();
				curl_setopt($curlHandle, CURLOPT_URL,$met_host.$met_file);
				curl_setopt($curlHandle, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
				curl_setopt($curlHandle, CURLOPT_REFERER, $_M['config']['met_weburl']);
				curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($curlHandle, CURLOPT_POST, 1);
				curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $post_data);
				$result = curl_exec($curlHandle);
				curl_close($curlHandle);
				}
				require_once $this->requirefile("file/v{$valsyslist}/install.class.php");
				if($return) {
					return $return;
				}
				$query = "SELECT * FROM {$_M['table']['config']} WHERE name='metcms_v'";
				$value = DB::get_one($query);

				if($this->sysnews != $value['value']){
					if(file_exists(PATH_WEB."{$_M['config']['met_adminfile']}/update/cms/auto.lock")){
						$this->step = 0;
						return 'next';
					}else{
						return 'recheck';
					}
				}
			}
		}
		deldir(PATH_WEB."{$_M['config']['met_adminfile']}/update/cms/");
		return 'complete';
	}
	public function getfile() {
		global $_M;
		foreach ($this->syslist as $key => $val) {
			if ($key == $_M['config']['metcms_v']) {
				return "file/v{$val}/file/";
			}
		}
		return 'notcopy';
	}
	public function html() {
		global $_M;
		if($this->html){
			$re = $this->html;
			//$this->html = '';
			return $re;
		}else{
			return "升级到MetInfo{$this->syslist[$_M['config']['metcms_v']]}完成";
		}
	}

	public function requirefile($file) {
		$dir = dirname(__FILE__);
		return $dir.'/'.$file;
	}

	public function config_insert($name, $value, $lang = '') {
		global $_M;
		if($lang == 'metinfo'){
			$query = "SELECT * FROM {$_M['table']['config']} WHERE name='{$name}' AND lang='metinfo'";
			if(!DB::get_one($query)){
				$query = "INSERT INTO {$_M['table']['config']} SET name='{$name}',value='{$value}',mobile_value='',columnid=0,flashid=0,lang='metinfo'";
				DB::query($query);
			}
		}else{
			foreach($_M['langlist']['web'] as $key=>$val){
				$query = "SELECT * FROM {$_M['table']['config']} WHERE name='{$name}' AND lang='{$val['mark']}'";
				if(!DB::get_one($query)){
					$query = "INSERT INTO {$_M['table']['config']} SET name='{$name}',value='{$value}',mobile_value='',columnid=0,flashid=0,lang='{$val['mark']}'";
					DB::query($query);
				}
			}
		}

	}

	public function config_upate($name, $value, $lang) {
		global $_M;
		$query = "UPDATE {$_M['table']['config']} SET value='{$value}' WHERE name='{$name}' AND lang='{$lang}'";
		DB::query($query);
	}

	public function config_del($name) {
		global $_M;
		$query = "DELETE FROM {$_M['table']['config']} WHERE name='{$name}'";
		DB::query($query);
	}

	public function lang_insert($ver) {
		global $_M;
		foreach($_M['langlist']['web'] as $key=>$val){
			if($val['synchronous'])$lang = $val['synchronous'];
			if($val['mark'])$lang = $val['mark'];
			if($val['synchronous'])
			$tablepre = $_M['config']['tablepre'];
			require $this->requirefile("file/v{$ver}/lang/{$lang}.php");
		}
	}
}

?>
