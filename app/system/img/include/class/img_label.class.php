<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::mod_class('product/product_label');

/**
 * img标签类
 */

class img_label extends product_label {

	/**
		* 初始化
		*/
	public function __construct() {
		global $_M;
		$this->construct('img', $_M['config']['met_img_list']);
	}

}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>
