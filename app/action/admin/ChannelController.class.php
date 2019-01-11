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
    /**
     * 列表显示
     * @throws SmartyException
     */
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

    /**
     * 添加
     * @throws SmartyException
     */
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
            if ($_FILES["channel_cover_img"]["error"] == 0) {
                $uploadRel = $this->uploadCoverImg($_FILES['channel_cover_img']);
                if ($uploadRel) {
                    $data['channel_cover_img'] = $uploadRel;
                }
            }
            if ($data['channel_parent_id'] == 0) {
                $data['channel_level'] = '1';
            } else {
                $level = $this->db->getOne('blog_channel', 'channel_level', ['id' => $data['channel_parent_id']]);
                $data['channel_level'] = $level + 1;
            }
            $this->db->setRow('blog_channel', $data);
            header('location:index.php?g=admin&a=channel&m=index');
        }
    }

    /**
     * 编辑
     * @throws SmartyException
     */
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = get('id');
            $channelRow = $this->db->getRow('blog_channel', ['id' => $id]);
//            var_dump($channel);
            include APP_PATH . '/function/tree.php';
            $sql = 'SELECT * FROM `blog_channel`;';
            $channel_list = $this->db->getAll($sql);
            $channelTree = getChannelTree($channel_list, 0, 1);
            $type_list = getConfig('dictionary.channel.type', '未知');
            $status_list = getConfig('dictionary.common.status', '未知');
            $this->assign([
                'type_list' => $type_list,
                'status_list' => $status_list,
                'channelTree' => $channelTree,
                'channelRow' => $channelRow
            ]);
            $this->display('tpl/default/admin/channel/edit.html');
        } else {

        }
    }

    /**
     * 删除
     */
    public function delete()
    {
        $id = $_GET['id'];
        $this->db->delete('blog_channel', ['id' => $id]);
    }

    /**
     * 上传封面图片
     * @param $file
     * @return bool|string
     */
    public function uploadCoverImg($file)
    {
        if (file_exists($file['tmp_name'])) {
            $path = 'upload/' . $file['name'];
            $moveRel = move_uploaded_file($file['tmp_name'], $path);
            if ($moveRel) {
                return $path;
            }
        }
        return false;
    }
}