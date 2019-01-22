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

class BlockTag extends Tag
{
    /**
     * 编译block标签
     * @return bool|string
     */
    public function compile()
    {
        $name = substr($this->tagArr[0], strpos($this->tagArr[0], 'block name=') + strlen('block name='), strlen($this->tagArr[0]) + 1);
        return $name;
    }
}
