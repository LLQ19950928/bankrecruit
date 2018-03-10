<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/8
 * Time: 21:10
 */

namespace App\Models;


class Job extends BaseModel
{
    protected $table = 'job';
    protected $guarded = [];
    protected $dateFormat = 'U';


    public function getPublishedAtAttribute($key)
    {
        return date('Y-m-d H:i', $key);
    }
}