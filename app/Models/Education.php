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
         return (HEducation::findFirstById($key))->name;
    }

    public function getAcquireDegreeAttribute($key)
    {
         return (HDegree::findFirstById($key))->name;
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
         return (SchoolName::findFirstById($key))->school_name;
    }

    public function getTrainTypeAttribute($key)
    {
         return (TrainType::findFirstById($key))->type;
    }

    public function getEducationTypeAttribute($key)
    {
        return (EducationType::findFirstById($key))->type;
    }

    public function getSchoolLocationAttribute($key)
    {
        return (SchoolLocation::findFirstById($key, ['location_name']))->location_name;
    }
}