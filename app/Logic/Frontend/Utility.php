<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/5/4
 * Time: 17:25
 */

namespace App\Logic\Frontend;


class Utility
{
    public static function subtext($text, $length)
    {
        if(mb_strlen($text, 'utf8') > $length)
            return mb_substr($text, 0, $length, 'utf8').'...';
        return $text;
    }
}