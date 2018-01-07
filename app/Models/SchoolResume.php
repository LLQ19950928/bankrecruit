<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/6
 * Time: 21:10
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class SchoolResume extends Model
{
    protected $table = "school_resume";
    protected $dateFormat = 'U';
    protected $guarded = [];

}