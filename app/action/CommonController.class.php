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

include CORE_PATH . '/action/BaseController.class.php';

class CommonController extends BaseController
{
    public $menu;
    public function __construct()
    {
        parent::__construct();
        $menu = $this->getMenu();
        $this->menu = $menu;
        $this->assign(['menu_list' => $menu]);

    }

    public function getMenu()
    {
        $menu = getConfig('menu');
        return $menu;
    }
}