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
        $status = getConfig('dictionary.common.status', '未知');
        $this->assign([
            'channel_list' => $channel_list,
            'type' => $type,
            'status' => $status
        ]);
        $this->display('tpl/default/admin/channel/index.html');
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include APP_PATH . '/function/tree.php';
            $sql = 'SELECT * FROM `blog_channel`;';
            $channel_list = $this->db->getAll($sql);
            $channelTree = getChannelTree($channel_list, 0, 1);
            $type_list = getConfig('dictionary.channel.type', '未知');
            $status_list = getConfig('dictionary.common.status', '未知');
            $this->assign([
                'type_list' => $type_list,
                'status_list' => $status_list,
                'channelTree' => $channelTree
            ]);
            $this->display('tpl/default/admin/channel/add.html');
        } else {
            $data = $_POST;
            $this->db->setRow('blog_channel', $data);
            header('location:index.php');
        }

    }

    public function edit()
    {
        include APP_PATH . '/function/tree.php';
        $sql = 'SELECT * FROM `blog_channel`;';
        $channel_list = $this->db->getAll($sql);
        $channelTree = getChannelTree($channel_list, 0, 1);
        $type_list = getConfig('dictionary.channel.type', '未知');
        $status_list = getConfig('dictionary.common.status', '未知');
        $this->assign([
            'type_list' => $type_list,
            'status_list' => $status_list,
            'channelTree' => $channelTree
        ]);
        $this->display('tpl/default/admin/channel/edit.html');
    }

    public function delete()
    {
    }
}