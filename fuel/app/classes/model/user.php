<?php

namespace Model;

class User extends \Model {

    public static function is_login()
    {
        // echo 'ccc';die;
        return \Auth::check();
    }

    public static function getUserData() {
        $sql = \DB::select('id', 'employee_id', 'name', 'mail_address', 'phone_num', 'permission_level', 'department_code', 'comment', 'del_flg')->from('user_master')->where('del_flg', 'NO')->execute();
        $ret = $sql->as_array();
        if (!empty($ret)) {
            return $ret;
        }
        return FALSE;
    }
}

