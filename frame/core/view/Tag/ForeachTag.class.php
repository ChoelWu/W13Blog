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

class ForeachTag extends Tag
{
    public function compile()
    {
        $echoStr = '<?php foreach (';
        $foreachStartArr = explode(' ', $this->tagArr[0]);
        foreach($foreachStartArr as $foreachStart) {
            if(strpos($foreachStart, '=')) {
                if(strpos($foreachStart, 'list')) {
                    $list = explode('=', $foreachStart);
                    $echoStr .= '$' . $list[1];
                }

                if(strpos($foreachStart, 'value')) {
                    $value = explode('=', $foreachStart);
                    $echoStr .= ' as ' . $value[1];
                }

                if(strpos($foreachStart, 'key')) {
                    $key = explode('=', $foreachStart);
                    $echoStr .= '$' . $key[1];
                }
            }
        }
    }
}

// <{foreach list=menu_list key=menu_key value=menu}>
// <{/foreach}>