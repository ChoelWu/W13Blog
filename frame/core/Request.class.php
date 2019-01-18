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

class Request
{
    public $host;

    public $port;

    public $clientIpAddr;

    public $httpVersion;

    public $method;

    public $pathInfo;

    public $route = [];

    /**
     * 生成請求
     */
    public function create()
    {
        $this->host = $_SERVER['HTTP_HOST'];

        $this->port = $_SERVER['SERVER_PORT'];

        $this->clientIpAddr = $_SERVER['REMOTE_ADDR'];

        $this->httpVersion = $_SERVER['SERVER_PROTOCOL'];

        $this->method = $_SERVER['REQUEST_METHOD'];

        $this->pathInfo = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : "";
    }

    /**
     * 生成路由
     */
    public function route()
    {
        $path_info = $this->pathInfo;
        if (!empty($this->pathInfo)) {
            $path_info = substr($this->pathInfo, 1, strlen($this->pathInfo) - 1);
        }
        $route = explode('/', $path_info);
        $this->route['group'] = (isset($route[0]) && !empty($route[0])) ? $route[0] : Config::get('common.default_group');
        $this->route['controller'] = (isset($route[1]) && !empty($route[1])) ? $route[1] : 'Index';
        $this->route['method'] = (isset($route[2]) && !empty($route[2])) ? $route[2] : 'index';
        $controller_namespace = 'app\action\\' . $this->route['group'] . '\\' . ucfirst($this->route['controller']) . 'Controller';
        $this->route['controller_namespace'] = $controller_namespace;
    }
}