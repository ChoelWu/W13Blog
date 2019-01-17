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

namespace app\action;

use frame\core\Controller;
use frame\core\Config;

class CommonController extends Controller
{
    public $menu;
    public function __construct()
    {
        parent::__construct();
        $menu = $this->getMenu();
        $this->menu = $menu;
//        $this->assign(['menu_list' => $menu]);

    }

    public function getMenu()
    {
        $menu = Config::get('menu');
        return $menu;
    }
}