<?php
/**
 * Created by PhpStorm.
 * User: Choel
 * Date: 2019/1/8
 * Time: 9:26
 */

include ACTION_PATH . '/CommonController.class.php';

class CommentController extends CommonController
{
    /**
     * 列表显示
     * @throws SmartyException
     */
    public function index()
    {
        include APP_PATH . '/function/tree.php';
        $sql = 'SELECT * FROM `blog_comment`;';
        $comment_list = $this->db->getAll($sql);
        $type = getConfig('dictionary.comment.type', '未知');
        $status = getConfig('dictionary.common.status', '未知');
        $comment_list = getCommentTree($comment_list, 0,1);
        $this->assign([
            'comment_list' => $comment_list,
            'type' => $type,
            'status' => $status
        ]);
        $this->display('tpl/default/admin/comment/index.html');
    }

    /**
     * 添加
     * @throws SmartyException
     */
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include APP_PATH . '/function/tree.php';
            $sql = 'SELECT * FROM `blog_comment`;';
            $comment_list = $this->db->getAll($sql);
            $commentTree = getCommentTree($comment_list, 0, 1);
            $type_list = getConfig('dictionary.comment.type', '未知');
            $status_list = getConfig('dictionary.common.status', '未知');
            $this->assign([
                'type_list' => $type_list,
                'status_list' => $status_list,
                'commentTree' => $commentTree
            ]);
            $this->display('tpl/default/admin/comment/add.html');
        } else {
            $data = $_POST;
            if ($_FILES["comment_cover_img"]["error"] == 0) {
                $uploadRel = $this->uploadCoverImg($_FILES['comment_cover_img']);
                if ($uploadRel) {
                    $data['comment_cover_img'] = $uploadRel;
                }
            }
            if ($data['comment_parent_id'] == 0) {
                $data['comment_level'] = '1';
            } else {
                $level = $this->db->getOne('blog_comment', 'comment_level', ['id' => $data['comment_parent_id']]);
                $data['comment_level'] = $level + 1;
            }
            $this->db->setRow('blog_comment', $data);
            header('location:index.php?g=admin&a=comment&m=index');
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
            $commentRow = $this->db->getRow('blog_comment', ['id' => $id]);
            include APP_PATH . '/function/tree.php';
            $sql = 'SELECT * FROM `blog_comment`;';
            $comment_list = $this->db->getAll($sql);
            $commentTree = getCommentTree($comment_list, 0, 1);
            $type_list = getConfig('dictionary.comment.type', '未知');
            $status_list = getConfig('dictionary.common.status', '未知');
            $this->assign([
                'type_list' => $type_list,
                'status_list' => $status_list,
                'commentTree' => $commentTree,
                'commentRow' => $commentRow
            ]);
            $this->display('tpl/default/admin/comment/edit.html');
        } else {

        }
    }

    /**
     * 删除
     */
    public function delete()
    {
        $id = $_GET['id'];
        $this->db->delete('blog_comment', ['id' => $id]);
        $commentRow = $this->db->getRow('blog_comment', ['comment_parent_id' => $id]);
        if(count($commentRow) > 0) {
            echo '存在子栏目，无法删除';
        }
        header('location:index.php?g=admin&a=comment&m=index');
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