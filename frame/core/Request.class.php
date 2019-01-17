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

    public function create()
    {
        $this->host = $_SERVER['HTTP_HOST'];

        $this->port = $_SERVER['SERVER_PORT'];

        $this->clientIpAddr = $_SERVER['REMOTE_ADDR'];

        $this->httpVersion = $_SERVER['SERVER_PROTOCOL'];

        $this->method = $_SERVER['REQUEST_METHOD'];

        $this->pathInfo = $_SERVER['PATH_INFO'];
    }

    public function pathInfo()
    {
        $path_info = $_SERVER['PATH_INFO'];
        echo $path_info;
        return $path_info;
    }
}