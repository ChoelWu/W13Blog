<?php
// +----------------------------------------------------------------------
// | Created by PhpStorm.
// +----------------------------------------------------------------------
// | File: IfTag.class.php
// +----------------------------------------------------------------------
// | Date: 2019/1/21
// +----------------------------------------------------------------------
// | Author: Choel
// +----------------------------------------------------------------------

namespace frame\core\view\Tag;

class ExtendsTag extends Tag
{
    /**
     * 编译extends标签
     * @return bool|string
     */
    public function compile()
    {
        $file_name = substr($this->tagArr[0], strpos($this->tagArr[0], 'extends file=') + strlen('extends file='), strlen($this->tagArr[0]) + 1);
        return $file_name;
    }
}
