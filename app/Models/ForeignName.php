<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/20
 * Time: 9:52
 */

namespace App\Models;


class ForeignName extends BaseModel
{
    protected $table = 'foreign_name';
    protected $dateFormat = 'U';
    protected $guarded = [];
}