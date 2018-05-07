<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/5/7
 * Time: 17:44
 */

namespace App\Models;


class Bank extends BaseModel
{
    protected $table = 'bank';
    protected $guarded = [];
    protected $dateFormat = 'U';
}