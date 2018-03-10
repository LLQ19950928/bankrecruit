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

    public function getEducationAttribute($key)
    {
         $edu = '';
         switch ($key) {
             case 1:
                 $edu = '大专';
                 break;
             case 2:
                 $edu = '本科';
                 break;
             case 3:
                 $edu = '硕士研究生';
                 break;
             case 4:
                 $edu = '博士研究生';
                 break;
             case 5:
                 $edu = '无';
                 break;
         }
         return $edu;
    }

    public function getDegreeAttribute($key)
    {
        $degree = '';
        switch ($key) {
            case 1:
                $degree = '学士';
                break;
            case 2:
                $degree = '硕士';
                break;
            case 3:
                $degree = '博士';
                break;
            case 4:
                $degree = '无';
                break;
        }
        return $degree;
    }

    public function getStudyStyleAttribute($key)
    {
        $study = '';
        switch ($key) {
            case 1:
                $study = '全日制';
                break;
            case 2:
                $study = '非全日制';
                break;
        }
        return $study;
    }

    public function getRankAttribute($key)
    {
        $rank = '';
        switch ($key) {
            case 1:
                $rank = '前10%';
                break;
            case 2:
                $rank = '前20%';
                break;
            case 3:
                $rank = '前30%';
                break;
            case 4:
                $rank = '前50%';
                break;
            case 5:
                $rank = '其它';
                break;
        }
        return $rank;
    }

}