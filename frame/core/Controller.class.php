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

namespace frame\core;

class Controller
{
    public $view;

    public function __construct()
    {
        $db = new Db();
        $this->view = new View();
    }

    /**
     * 视图页面显示
     * @param $tpl
     */
    public function display($tpl)
    {
        $tpl = config('frame.template.tpl_dir') . DS . nameConvert($tpl, DS) . '.' . config('frame.template.tpl_ext');
        $this->view->display($tpl);
    }

    /**
     * 数据绑定到视图页面
     * @param $value1
     * @param $value2
     */
    public function assign($value1, $value2)
    {
        $this->view->assign($value1, $value2);
    }
}
