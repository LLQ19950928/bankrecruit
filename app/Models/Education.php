<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/1/8
 * Time: 11:35
 */

namespace App\Models;



class Education extends BaseModel
{
     protected $table = 'education';
     protected $dateFormat = 'U';
     protected $guarded = [];

    public function getAcquireEducationAttribute($key)
    {
         return (HEducation::findById($key))->name;
    }

    public function getAcquireDegreeAttribute($key)
    {
         return (HDegree::findById($key))->name;
    }

    public function getEntranceTimeAttribute($key)
    {
         return date('Y-m-d', $key);
    }

    public function getGraduationTimeAttribute($key)
    {
         return date('Y-m-d', $key);
    }

    public function getSchoolNameAttribute($key)
    {
         return (SchoolName::findById($key))->school_name;
    }

    public function getTrainTypeAttribute($key)
    {
         return (TrainType::findById($key))->type;
    }

    public function getEducationTypeAttribute($key)
    {
        return (EducationType::findById($key))->type;
    }
}