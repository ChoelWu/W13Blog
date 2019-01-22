<?php
// +----------------------------------------------------------------------
// | Created by PhpStorm.
// +----------------------------------------------------------------------
// | File: Template.class.php
// +----------------------------------------------------------------------
// | Date: 2019/1/18
// +----------------------------------------------------------------------
// | Author: Choel
// +----------------------------------------------------------------------

namespace frame\core\view;

class Template
{
    public $compile;

    public function __construct()
    {
        $this->compile = new Compile();
    }

    /**
     * 获取模板缓存
     * @param $filePath
     * @return bool|string
     */
    public function getTplCache($filePath)
    {
        $file_name = basename($filePath);
        $cache_name = md5($file_name);
        $cache_dir_name = empty(config('template.compile_dir')) ? config('frame.template.compile_dir') : config('template.compile_dir');
        $cache_path = $cache_dir_name . DS . $cache_name;
        if (is_file($cache_path)) {
            return $cache_path;
        }
        return false;
    }

    /**
     * 设置模板缓存
     * @param $filePath
     * @param $content
     */
    public function setTplCache($filePath, $content)
    {
        file_put_contents($filePath, $content);
    }

    /**
     * 编译文件
     * @param $filePath
     * @return string|string[]|null
     */
    public function compileFile($filePath)
    {
        de_dump(__NAMESPACE__ . __CLASS__ . '>>compileFile');
        if (is_file($filePath)) {
            $content = file_get_contents($filePath);
            $compile_content = $this->compile->compile($content);
            return $compile_content;
        }
    }
}
