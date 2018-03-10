<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/7
 * Time: 21:12
 */

namespace App\Models;


class Announce extends BaseModel
{
    protected $table = 'announce';
    protected $guarded = [];
    protected $dateFormat = 'U';


    public function getPublishedAtAttribute($key)
    {
        return date('Y-m-d', $key);
    }


}