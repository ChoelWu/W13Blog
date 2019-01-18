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
    public $view; // 视图对象
    public $db;

    public function __construct()
    {
//        $db_type = Config::get('db.db_type');
        //$db_config['db_host'], $db_config['db_user'], $db_config['db_pwd'], $db_config['db_name']
//        $this->db = new Db();
        $this->view = new View();
    }
}