<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/5/7
 * Time: 17:47
 */

namespace App\Logic\Backend;


class CateLogic
{
    public static function getCategory($data, $pId)
    {
        $tree = '';
        foreach($data as $k => $v)
        {
            if($v['pid'] == $pId)
            {        //父亲找到儿子
                $v['pid'] = CateLogic::getCategory($data, $v['id']);
                $tree[] = $v;
            }
        }
        return $tree;
    }
}