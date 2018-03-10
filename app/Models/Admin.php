<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/6
 * Time: 15:17
 */

namespace App\Models;


class Admin extends BaseModel
{
    protected $table = 'admin';
    protected $guarded = [];
    protected $dateFormat = 'U';

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = password_hash($password, PASSWORD_BCRYPT);
    }
}