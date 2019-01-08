<?php
/**
 * Created by PhpStorm.
 * User: Choel
 * Date: 2019/1/8
 * Time: 9:26
 */

class ChannelController
{
    public $smarty;
    public function __construct()
    {
        include ROOT_PATH . '/smarty/libs/Smarty.class.php';
        $this->smarty = new Smarty();
    }

    public $a = '123';
    public function index() {
        echo 'hello world';
    }

    public function test() {
        echo 'test';
        $this->smarty('admin/channel/index');
    }
}