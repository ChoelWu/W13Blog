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

use frame\core\View\Compile;

class View
{
    public $data = [];
    public $file;

    public function __construct()
    {
        de_dump('View->construct function!');
    }

    /**
     * 显示模板
     * @param $filePath
     */
    public function display($filePath)
    {
        if(!empty($filePath)) {
            if(is_file($filePath)) {
                include($filePath);
            }
            $this->file = $filePath;
            if(strpos($filePath, '.')) {
                $file_path_arr = explode('.', $filePath);
                $this->file = implode(DS, $file_path_arr);
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

    public function compile()
    {
        new Compile();
    }
}