<?php
// +----------------------------------------------------------------------
// | Created by PhpStorm.
// +----------------------------------------------------------------------
// | File: Tag.class.php
// +----------------------------------------------------------------------
// | Date: 2019/1/21
// +----------------------------------------------------------------------
// | Author: Choel
// +----------------------------------------------------------------------

namespace frame\core\view\Tag;

class Tag
{
    public $tagArr;
    public $echoArr;

    public function __construct($tagArr, $echoArr)
    {
        $this->tagArr = $tagArr;
        $this->echoArr = $echoArr;
    }

    public function compile()
    {
        $ifArr = explode('=', $this->tagArr);
        if ($ifArr[0] == 'condition') {
            $ifQuery = trim($ifArr[1]);
            $quot = substr($ifQuery, 0, 1);
            $ifQuery = trim($quot, $ifQuery);
        }
    }
}

