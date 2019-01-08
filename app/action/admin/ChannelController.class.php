<?php
/**
 * Created by PhpStorm.
 * User: Choel
 * Date: 2019/1/8
 * Time: 9:26
 */

include ACTION_PATH . '/CommonController.class.php';

class ChannelController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo 'hello world';
    }

    public function test()
    {
        $this->display('tpl/default/admin/article/index.html');
    }
}