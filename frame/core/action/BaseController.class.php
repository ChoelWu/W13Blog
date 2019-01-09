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
    public $db;

    public function __construct()
    {
        include ROOT_PATH . '/frame/smarty/libs/Smarty.class.php';
        include ROOT_PATH . '/frame/core/db/Mysql.class.php';
        $db_config = include CONFIG_PATH . '/db.php';
        $db_type = $db_config['db_type'];
        $this->db = new $db_type($db_config['db_host'], $db_config['db_user'], $db_config['db_pwd'], $db_config['db_name']);
        $this->smarty = new Smarty();
        $this->smarty->left_delimiter="<{";
        $this->smarty->right_delimiter="}>";
    }

    /**
     * 模板输出
     * @param $tpl
     * @throws \SmartyException
     */
    public function display($tpl)
    {
        return $this->smarty->display($tpl);
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