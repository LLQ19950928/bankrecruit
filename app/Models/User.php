<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/1/3
 * Time: 18:01
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
     protected $table = "user";
     protected $dateFormat = 'U';
     protected $guarded = [];


}