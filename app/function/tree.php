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

/**
 * 获取树形菜单
 * @param $menuArr
 * @param $parentId
 * @param $level
 * @return array
 */
function getChannelTree($menuArr, $parentId, $level)
{
    $result_arr = [];

    foreach ($menuArr as $menuItem) {
        if ($menuItem['channel_parent_id'] == $parentId && $menuItem['channel_level'] == $level) {
            $menuItem['children'] = getChannelTree($menuArr, $menuItem['id'], $level + 1);
            $result_arr[] = $menuItem;
        }
    }

    return $result_arr;
}