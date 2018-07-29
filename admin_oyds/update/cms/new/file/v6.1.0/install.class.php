<?php

switch ($this->step) {
    case 1:
        $this->html = "更新数据字段...";

        $update_database = load::mod_class('update/update_database', 'new');
        $update_database->update_system('6.1.0');
        $query = "UPDATE {$_M['table']['config']} SET value = '6.1.0' WHERE name = 'metcms_v'";
        DB::query($query);
        deldir(PATH_WEB.'cache',1);
        $return = 'complete';
        break;
}
return $return;


