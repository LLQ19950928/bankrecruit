<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/5/3
 * Time: 14:38
 */

namespace App\Models;


class Project extends BaseModel
{
    protected $table = 'project';
    protected $dateFormat = 'U';
    protected $guarded = [];
}