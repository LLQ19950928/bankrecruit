<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/9
 * Time: 17:21
 */

namespace App\Models;


class Apply extends BaseModel
{
    protected $table = 'apply';
    protected $guarded = [];
    protected $dateFormat = 'U';


    public function getCreatedAtAttribute($key)
    {
        return date('Y-m-d', $key);
    }

}