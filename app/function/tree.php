<?php
/**
 * Created by PhpStorm.
 * User: Choel
 * Date: 2019/1/10
 * Time: 16:54
 */

function getChannelTree($rawChannelArr) {
    $tree = ['0' => 0];
    $level = 0;
    while(true) {
        $level ++;
        foreach($rawChannelArr as $rawChannel) {
            if($rawChannel['level'] == $level) {
                $tree[] = $rawChannel;
            }
        }
    }
}