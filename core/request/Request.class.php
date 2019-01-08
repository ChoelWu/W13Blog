<?php
/**
 * Created by PhpStorm.
 * User: Choel
 * Date: 2019/1/8
 * Time: 10:28
 */

class Request
{
    public $group;
    public $action;
    public $method;
    public $action_controller;
    public $action_controller_path;

    public function __construct()
    {
        // 获得http请求传入的分组、控制器、方法名
        $group = trim($_GET['g']);
        $action = trim($_GET['a']);
        $method = trim($_GET['m']);

        // 对分组、控制器、方法名进行标准化处理
        $this->group = empty($group) ? 'Index' : ucfirst(strtolower($group));
        $this->action = empty($action) ? 'index' : strtolower($action);
        $this->method = empty($method) ? 'index' : strtolower($method);

        // 完整控制器名
        $this->action_controller = ucfirst($this->action) . 'Controller';

        // 控制器路径
        $this->action_controller_path = ACTION_PATH . '/' . strtolower($this->group) . '/' . $this->action_controller . '.class.php';
    }

    public function run()
    {
        //
        self::getRequest();
    }

    /**
     *
     * @return bool
     */
    function getRequest()
    {
        // 是否存在分组
        if (!is_dir('action/' . strtolower($this->group))) {
            echo '控制器文件' . ucfirst($this->action) . 'Controller.class.php不存在';
            return false;
        }

        // 检查是否存在控制器文件
        if (!file_exists($this->action_controller_path)) {
            echo '控制器文件' . ucfirst($this->action) . 'Controller.class.php不存在';
            return false;
        }

        // 检查类中是否存在方法
        require($this->action_controller_path);
        $actionObj = new $this->action_controller;
        if (!method_exists($actionObj, $this->method)) {
            echo '控制器文件' . ucfirst($this->action) . 'Controller.class.php中' . $this->method . '方法不存在';
            return false;
        }
        $method = $this->method;
        $actionObj->$method();
    }
}