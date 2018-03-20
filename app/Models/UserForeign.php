<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/20
 * Time: 9:53
 */

namespace App\Models;


class UserForeign extends BaseModel
{
    protected $table = 'user_foreign';
    protected $dateFormat = 'U';
    protected $guarded = [];
}