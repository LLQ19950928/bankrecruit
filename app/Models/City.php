<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/5/3
 * Time: 10:09
 */

namespace App\Models;


class City extends BaseModel
{
    protected $table = 'city';
    protected $dateFormat = 'U';
    protected $guarded = [];
}