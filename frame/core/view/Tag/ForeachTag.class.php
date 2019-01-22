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
    /**
     * 编译foreach循环标签
     * @return string
     */
    public function compile()
    {
        $foreachStartArr = explode(" ", $this->tagArr[0]);
        $list_str = '';
        $key_str = '';
        $value_str = '';

        foreach ($foreachStartArr as $foreachStart) {
            $foreachItemArr = explode("=", $foreachStart);
            if ($foreachItemArr[0] == 'list') {
                $list_str = '$' . $foreachItemArr[1] . ' as ';
            }

            if ($foreachItemArr[0] == 'value') {
                $value_str = '$' . $foreachItemArr[1];

            }

            if ($foreachItemArr[0] == 'key') {
                $key_str = '$' . $foreachItemArr[1] . '=>';

            }
        }

        $echoStr = '<?php foreach (' . $list_str . $key_str . $value_str . ') {' . $this->htmlArr[0] . '} ?>';
        return $echoStr;
    }
}
