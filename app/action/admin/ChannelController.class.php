<?php
/**
 * Created by PhpStorm.
 * User: Choel
 * Date: 2019/1/8
 * Time: 9:26
 */

include ACTION_PATH . '/CommonController.class.php';

class ChannelController extends CommonController
{
    public function index()
    {

        $this->display('tpl/default/admin/channel/index.html');
    }

    public function view() {
        $sql = 'SELECT * FROM `blog_channel`;';
        $data = $this->db->getAll($sql);
        echo json_encode($data);
    }
}