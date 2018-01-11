<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/1/11
 * Time: 11:35
 */

namespace App\Models;


class Punishment extends BaseModel
{
    protected $table = 'punishment';
    protected $dateFormat = 'U';
    protected $guarded = [];
}