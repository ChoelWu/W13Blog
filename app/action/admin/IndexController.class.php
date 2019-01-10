<?php
/**
 * Created by PhpStorm.
 * User: Choel
 * Date: 2019/1/8
 * Time: 9:26
 */

include ACTION_PATH . '/CommonController.class.php';

class IndexController extends CommonController
{
    public function index()
    {
        $sql = 'SELECT * FROM `blog_channel`;';
        $data = $this->db->getAll($sql);
        $this->assign(['data' => $data]);
        $this->display('tpl/default/admin/index/index.html');
    }

    public function home() {
        $this->display('tpl/default/admin/index/index.html');
    }

    public function getMenu()
    {
        $rel = include CONFIG_PATH . '/menu.php';
        echo json_encode($rel);
    }
}