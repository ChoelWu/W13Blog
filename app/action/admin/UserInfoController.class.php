<?php
// +----------------------------------------------------------------------
// | Created by PhpStorm.
// +----------------------------------------------------------------------
// | File: base.php
// +----------------------------------------------------------------------
// | Date: 2019/1/17
// +----------------------------------------------------------------------
// | Author: Choel
// +----------------------------------------------------------------------

namespace app\action\admin;

use app\action\CommonController;

class UserInfoController extends CommonController
{
    public function index()
    {
        $user_info = config('info.user');
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