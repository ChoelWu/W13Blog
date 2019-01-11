<?php
/**
 * Created by PhpStorm.
 * User: Choel
 * Date: 2019/1/8
 * Time: 9:26
 */

include ACTION_PATH . '/CommonController.class.php';

class ArticleController extends CommonController
{
    /**
     * 列表显示
     * @throws SmartyException
     */
    public function index()
    {
        $sql = 'SELECT * FROM `blog_slide_pic`;';
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
            $this->display('tpl/default/admin/channel/add.html');
        } else {
            $data = $_POST;
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
            $this->display('tpl/default/admin/slide_pic/edit.html');
        } else {
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