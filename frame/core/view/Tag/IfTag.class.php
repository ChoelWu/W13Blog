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

class IfTag extends Tag
{
    /**
     * 编译if标签
     * @return string
     */
    public function compile()
    {
        $echoStr = '<php> if (';
        $ifCondition = substr($this->tagArr[0], strpos($this->tagArr[0], 'if condition=') + strlen('if condition='), strlen($this->tagArr[0]) - 1);
        $echoStr .= trim($ifCondition, substr($ifCondition, 0, 1)) . ') { echo "' . $this->htmlArr[0] . '" }';
        foreach ($this->tagArr as $key => $tag) {
            if (strpos($tag, 'elseif condition=') !== false) {
                $elseifCondition = substr($tag, strpos($tag, 'elseif condition=') + strlen('elseif condition='), strlen($tag) - 1);
                $echoStr .= ' else if (' . trim($elseifCondition, substr($elseifCondition, 0, 1)) . ') { echo "' . $this->htmlArr[$key] . '" }';
            } else if (strpos($tag, 'else') !== false) {
                $echoStr .= ' else { ' . 'echo "' . $this->htmlArr[$key] . '" }';
            }
        }
        $echoStr = '</php>';

        return $echoStr;
    }
}
