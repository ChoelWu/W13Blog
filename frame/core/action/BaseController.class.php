<?php
/**
 * Created by PhpStorm.
 * User: Choel
 * Date: 2019/1/8
 * Time: 11:36
 */

class BaseController
{
    public $smarty; // 视图对象

    public function __construct()
    {
        include ROOT_PATH . '/frame/smarty/libs/Smarty.class.php';
        $this->smarty = new Smarty();
    }

    /**
     * 模板输出
     * @param $tpl
     * @throws \SmartyException
     */
    public function display($tpl)
    {
        $this->smarty->display('tpl/default/admin/channel/index.html');
    }

    /**
     * 数据绑定
     * @param $data
     * @return \Smarty_Internal_Data
     */
    public function assign($data)
    {
        return $this->smarty->assign($data);
    }
}