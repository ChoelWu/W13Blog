<?php
/**
 * Created by PhpStorm.
 * User: Choel
 * Date: 2019/1/8
 * Time: 9:26
 */

namespace app\action\admin;

include ACTION_PATH . '/CommonController.class.php';

use app\action\CommonController;

class ChannelController extends CommonController
{
    public function __construct()
    {
    }

    public function index()
    {
        echo 'hello world';
    }

    public function test()
    {
        echo 'test';
        $this->display('tpl/default/admin/channel/index.html');
    }
}