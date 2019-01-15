<?php
/**
 * Created by PhpStorm.
 * User: Choel
 * Date: 2019/1/8
 * Time: 9:26
 */
include ACTION_PATH . '/CommonController.class.php';

class UserInfoController extends CommonController
{
    public function index()
    {
        $user_info = getConfig('info.user');
        $this->assign([
            'user_info' => $user_info
        ]);
        $this->display('tpl/default/admin/user_info/index.html');
    }

    public function home()
    {
        $this->display('tpl/default/admin/user_info/index.html');
    }
}