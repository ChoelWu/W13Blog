<?php
/**
 * Created by PhpStorm.
 * User: Choel
 * Date: 2019/1/8
 * Time: 9:26
 */

include ACTION_PATH . '/admin/MediaController.class.php';

class TrashController extends MediaController
{
    /**
     * 列表显示
     * @throws SmartyException
     */
    public function index()
    {
        $sql = 'SELECT * FROM `blog_media` WHERE `media_type`="4";';
        $trash_list = $this->db->getAll($sql);
        $this->assign([
            'trash_list' => $trash_list
        ]);
        $this->display('tpl/default/admin/trash/index.html');
    }

    public function recover()
    {
        $id = $_GET['id'];
        $media_origin_type = $this->db->getOne('blog_media', 'media_origin_type', ['id' => $id]);
        $this->db->updateRow('blog_media', ['media_type' => $media_origin_type, 'media_origin_type' => '0'], ['id' => $id]);
        header('location:index.php?g=admin&a=photo&m=index');
    }

    /**
     * 删除
     */
    public function clearTrash()
    {
        $id = $_GET['id'];
        $this->db->delete('blog_media', ['id' => $id]);
        header('location:index.php?g=admin&a=trash&m=index');
    }

    /**
     * 上传封面图片
     * @param $file
     * @return bool|string
     */
    public function uploadPhoto($file)
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