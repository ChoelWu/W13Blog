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

include ACTION_PATH . '/CommonController.class.php';

class BlogInfoController extends CommonController
{
    public function index()
    {
        $blog_info = getConfig('info.blog');
        $this->assign([
            'blog_info' => $blog_info
        ]);
        $this->display('tpl/default/admin/blog_info/index.html');
    }

    public function home()
    {
        $this->display('tpl/default/admin/blog_info/index.html');
    }
}