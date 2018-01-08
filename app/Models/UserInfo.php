<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/6
 * Time: 22:01
 */

namespace App\Models;



class UserInfo extends BaseModel
{
    protected $table = 'user_info';
    protected $dateFormat = 'U';
    protected $guarded = [];
}