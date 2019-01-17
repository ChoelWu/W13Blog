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

namespace app\action\admin;

class VideoController extends MediaController
{
    /**
     * 列表显示
     * @throws SmartyException
     */
    public function index()
    {
        $sql = 'SELECT * FROM `blog_media` WHERE `media_type`="2";';
        $video_list = $this->db->getAll($sql);
        $this->assign([
            'video_list' => $video_list
        ]);
        $this->display('tpl/default/admin/video/index.html');
    }

    /**
     * 添加
     * @throws SmartyException
     */
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->display('tpl/default/admin/video/add.html');
        } else {
            if ($_FILES['media_path']['error'] == 0) {
                $uploadRel = $this->uploadVideo($_FILES['media_path']);
                if ($uploadRel) {
                    $data['media_path'] = $uploadRel;
                }
            }
            $file_extension_arr = explode('.', $_FILES['media_path']['name']);
            $file_extension_arr_size = count($file_extension_arr);
            $data['media_extension'] = $file_extension_arr[$file_extension_arr_size - 1];
            $data['media_type'] = '2';
            $this->db->setRow('blog_media', $data);
            header('location:index.php?g=admin&a=video&m=index');
        }
    }

    /**
     * 删除
     */
    public function delete()
    {
        $id = $_GET['id'];
        $this->db->updateRow('blog_media', ['media_type' => '4', 'media_origin_type' => '2'], ['id' => $id]);
        header('location:index.php?g=admin&a=video&m=index');
    }

    /**
     * 上传封面图片
     * @param $file
     * @return bool|string
     */
    public function uploadVideo($file)
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