<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/1/10
 * Time: 15:29
 */

namespace App\Models;


class Certificate extends BaseModel
{
     protected $table = 'certificate';
     protected $guarded = [];
     protected $dateFormat = 'U';
}