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

namespace frame\core;

use frame\core\view\Template;

class View
{
    public $template;
    public $data = [];
    public $file;

    public function __construct()
    {
        $this->template = new Template();
        de_dump('View->construct function!');
    }

    /**
     * 显示模板
     * @param $filePath
     */
    public function display($filePath)
    {
        if (!empty($filePath)) {
            if (is_file($filePath)) {
                $this->file = $filePath;
            }
            $tpl_cache = $this->template->getTplCache($filePath);
            if (!$tpl_cache) {
                ob_start();
                ob_clean();
                $compiled_file = $this->template->compileFile($filePath);
                de_dump($compiled_file);
                $this->template->setTplCache($compiled_file, ob_get_contents());
                ob_end_flush();
            } else {
                readfile($tpl_cache);
            }
        }
    }

    /**
     * 数据绑定
     * @param $value1
     * @param null $value2
     */
    public function assign($value1, $value2 = null)
    {
        if (is_array($value1)) {
            $this->data = array_merge($this->data, $value1);
        }
        if (is_string($value1)) {
            $this->data[$value1] = $value2;
        }
    }
}
