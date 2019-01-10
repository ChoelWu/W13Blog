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
        $channel_list = $this->db->getAll($sql);
        $type = getConfig('dictionary.channel.type', '未知');
        $this->assign(['channel_list' => $channel_list, 'type' => $type]);
        $this->display('tpl/default/admin/channel/index.html');
    }

    public function add()
    {
        $sql = 'SELECT * FROM `blog_channel`;';
        $channel_list = $this->db->getAll($sql);
        $type_list = getConfig('dictionary.channel.type', '未知');
        $status_list = getConfig('dictionary.common.status', '未知');
        $this->assign([
            'type_list' => $type_list,
            'status_list' => $status_list,
            'channel_list' => $channel_list
        ]);
        $this->display('tpl/default/admin/channel/add.html');
    }

    public function edit()
    {

    }

    public function delete()
    {
    }
}