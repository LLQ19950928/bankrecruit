<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/18
 * Time: 18:17
 */

namespace App\Models;


class UserCertificate extends BaseModel
{
    protected $table = 'user_ccertificate';
    protected $dateFormat = 'U';
    protected $guarded = [];
}