<?php
/**
 * Created by PhpStorm.
 * User: Choel
 * Date: 2019/1/14
 * Time: 17:53
 */
include ACTION_PATH . '/CommonController.class.php';
class ArticleController extends CommonController
{
    public function index() {
        $this->display('tpl/default/index/index.html');
    }
}