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

class ArticleController extends CommonController
{
    /**
     * 列表显示
     * @throws SmartyException
     */
    public function index()
    {
        $sql = 'SELECT a.*, b.channel_name FROM `blog_article` as a, `blog_channel` as b WHERE a.channel_id=b.id;';
        $article_list = $this->db->getAll($sql);
        $status = config('dictionary.common.status', '未知');
        $is_top = config('dictionary.article.is_top', '未知');
        $is_secret = config('dictionary.article.is_secret', '未知');
        $type = config('dictionary.article.type', '未知');
        $this->assign([
            'article_list' => $article_list,
            'is_top' => $is_top,
            'is_secret' => $is_secret,
            'status' => $status,
            'type' => $type
        ]);
        $this->display('tpl/default/admin/article/index.html');
    }

    /**
     * 添加
     * @throws SmartyException
     */
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $status_list = config('dictionary.common.status', '未知');
            $is_top_list = config('dictionary.article.is_top', '未知');
            $type_list = config('dictionary.article.type', '未知');
            $category_list = config('dictionary.article.category', '未知');
            $is_secret_list = config('dictionary.article.is_secret', '未知');
            $channel_sql = 'SELECT * FROM `blog_channel` ORDER BY `channel_level` ASC, `channel_index` ASC;';
            $channel_list = $this->db->getAll($channel_sql);
            include APP_PATH . '/function/tree.php';
            $channel_list = getChannelTree($channel_list, 0,1);
            $this->assign([
                'status_list' => $status_list,
                'is_top_list' => $is_top_list,
                'type_list' => $type_list,
                'category_list' => $category_list,
                'is_secret_list' => $is_secret_list,
                'channel_list' => $channel_list
            ]);
            $this->display('tpl/default/admin/article/add.html');
        } else {
            $data = $_POST;
            if ($_FILES['article_cover_img']['error'] == 0) {
                $uploadRel = $this->uploadArticleCoverImg($_FILES['article_cover_img']);
                if ($uploadRel) {
                    $data['article_cover_img'] = $uploadRel;
                }
            }
            $this->db->setRow('blog_article', $data);
            header('location:index.php?g=admin&a=article&m=index');
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
            $article = $this->db->getRow('blog_article',['id' => $id]);
            $status_list = config('dictionary.common.status', '未知');
            $is_top_list = config('dictionary.article.is_top', '未知');
            $type_list = config('dictionary.article.type', '未知');
            $category_list = config('dictionary.article.category', '未知');
            $is_secret_list = config('dictionary.article.is_secret', '未知');
            $channel_sql = 'SELECT * FROM `blog_channel` ORDER BY `channel_level` ASC, `channel_index` ASC;';
            $channel_list = $this->db->getAll($channel_sql);
            include APP_PATH . '/function/tree.php';
            $channel_list = getChannelTree($channel_list, 0,1);
            $this->assign([
                'article' => $article,
                'status_list' => $status_list,
                'is_top_list' => $is_top_list,
                'type_list' => $type_list,
                'category_list' => $category_list,
                'is_secret_list' => $is_secret_list,
                'channel_list' => $channel_list
            ]);
            $this->display('tpl/default/admin/article/edit.html');
        } else {
            header('location:index.php?g=admin&a=article&m=index');
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

    /**
     * 上传封面图片
     * @param $file
     * @return bool|string
     */
    public function uploadArticleCoverImg($file)
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