<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/1/11
 * Time: 11:34
 */

namespace App\Models;


class Bonus extends BaseModel
{
     protected $table = 'bonus';
     protected $guarded = [];
     protected $dateFormat = 'U';

     public function getBonusTypeAttribute($key)
     {
         return $key == 1 ? '校内' : '校外';
     }

}