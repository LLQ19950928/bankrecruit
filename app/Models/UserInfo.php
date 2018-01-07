<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/6
 * Time: 22:01
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'user_info';
    protected $dateFormat = 'U';
    protected $guarded = [];
}