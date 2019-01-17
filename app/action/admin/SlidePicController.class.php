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

use app\action\CommonController;

class SlidePicController extends CommonController
{
    /**
     * 列表显示
     * @throws SmartyException
     */
    public function index()
    {
        $sql = 'SELECT a.*, b.channel_name FROM `blog_slide_pic` as a, `blog_channel` as b WHERE a.channel_id=b.id;';
        $slide_pic_list = $this->db->getAll($sql);
        $status = getConfig('dictionary.common.status', '未知');
        $is_top = getConfig('dictionary.slide_pic.is_top', '未知');
        $this->assign([
            'slide_pic_list' => $slide_pic_list,
            'is_top' => $is_top,
            'status' => $status
        ]);
        $this->display('tpl/default/admin/slide_pic/index.html');
    }

    /**
     * 添加
     * @throws SmartyException
     */
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $status_list = getConfig('dictionary.common.status', '未知');
            $is_top_list = getConfig('dictionary.slide_pic.is_top', '未知');

            $channel_sql = 'SELECT * FROM `blog_channel` ORDER BY `channel_level` ASC, `channel_index` ASC;';
            $channel_list = $this->db->getAll($channel_sql);
            include APP_PATH . '/function/tree.php';
            $channel_list = getChannelTree($channel_list, 0,1);
            $this->assign([
                'status_list' => $status_list,
                'is_top_list' => $is_top_list,
                'channel_list' => $channel_list
            ]);
            $this->display('tpl/default/admin/slide_pic/add.html');
        } else {
            $data = $_POST;
            if ($_FILES['slide_pic_img']['error'] == 0) {
                $uploadRel = $this->uploadSlidePicImg($_FILES['slide_pic_img']);
                if ($uploadRel) {
                    $data['slide_pic_img'] = $uploadRel;
                }
            }
            $this->db->setRow('blog_slide_pic', $data);
            header('location:index.php?g=admin&a=slide_pic&m=index');
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
            $slide_pic_row = $this->db->getRow('blog_slide_pic',['id' => $id]);
            $status_list = getConfig('dictionary.common.status', '未知');
            $is_top_list = getConfig('dictionary.slide_pic.is_top', '未知');

            $channel_sql = 'SELECT * FROM `blog_channel` ORDER BY `channel_level` ASC, `channel_index` ASC;';
            $channel_list = $this->db->getAll($channel_sql);
            include APP_PATH . '/function/tree.php';
            $channel_list = getChannelTree($channel_list, 0,1);
            $this->assign([
                'status_list' => $status_list,
                'is_top_list' => $is_top_list,
                'channel_list' => $channel_list,
                'slide_pic_row' => $slide_pic_row
            ]);
            $this->display('tpl/default/admin/slide_pic/edit.html');
        } else {
            $data = $_POST;
            header('location:index.php?g=admin&a=slide_pic&m=index');
        }
    }

    /**
     * 删除
     */
    public function delete()
    {
        $id = $_GET['id'];
        $this->db->delete('blog_slide_pic', ['id' => $id]);
        header('location:index.php?g=admin&a=slide_pic&m=index');
    }

    /**
     * 上传封面图片
     * @param $file
     * @return bool|string
     */
    public function uploadSlidePicImg($file)
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