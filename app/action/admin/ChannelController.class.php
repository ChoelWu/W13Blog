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
        $sql = 'SELECT * FROM `blog_channel`;';
        $data = $this->db->getAll($sql);
        $type = getConfig('dictionary.channel.type', '未知');
        $this->assign(['data' => $data, 'type' => $type]);
        $this->display('tpl/default/admin/channel/index.html');
    }

    public function add() {

    }

    public function edit() {

    }

    public function delete() {}
}