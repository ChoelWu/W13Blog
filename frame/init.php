<?php
/**
 * Created by PhpStorm.
 * User: Choel
 * Date: 2019/1/8
 * Time: 10:44
 */

include CORE_PATH . '/request/Request.class.php';
use frame\core\request\Request;

$request = new Request();
$request->run();