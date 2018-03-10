<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/6
 * Time: 10:07
 */

namespace App\Models;


class WorkExperience extends BaseModel
{
    protected $table = "work_experience";
    protected $dateFormat = 'U';
    protected $guarded = [];

    public function getWorkStyleAttribute($key)
    {
        $work = '';
        switch ($key) {
            case 1:
                $work = '正式员工';
                break;
            case 2:
                $work = '实习生';
                break;
            case 3:
                $work = '兼职人员';
                break;
        }
        return $work;
    }

}