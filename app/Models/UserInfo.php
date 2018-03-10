<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/6
 * Time: 22:01
 */

namespace App\Models;



class UserInfo extends BaseModel
{
    protected $table = 'user_info';
    protected $dateFormat = 'U';
    protected $guarded = [];


    public function getGenderAttribute($key)
    {
        return $key == 1 ? '男' : '女';
    }

    public function getNationAttribute($key)
    {
        $nation = Nation::findFirstById($key, ['nation'])->nation;
        return $nation;
    }

    public function getPoliticalStatusAttribute($key)
    {
        $polity = '';
        switch ($key) {
            case 1:
                $polity = '中共党员';
                break;
            case 2:
                $polity = '共青团员';
                break;
            case 3:
                $polity = '民主党派';
                break;
            case 4:
                $polity = '群众';
                break;
        }
        return $polity;
    }

    public function getMarryAttribute($key)
    {
        $marry = '';
        switch ($key) {
            case 1:
                $marry = '未婚';
                break;
            case 2:
                $marry = '已婚';
                break;
            case 3:
                $marry = '离异';
                break;
            case 4:
                $marry = '其它';
                break;
        }
        return $marry;
    }

    public function getIdTypeAttribute($key)
    {
        $idType = '';
        switch ($key) {
            case 1:
                $idType = '身份证';
                break;
            case 2:
                $idType = '护照';
                break;
            case 3:
                $idType = '军官证';
                break;
            case 4:
                $idType = '港澳通行证';
                break;
            case 5:
                $idType = '台胞通行证';
                break;
            case 6:
                $idType = '其它';
                break;
        }
        return $idType;
    }

    public function getHealthyStatusAttribute($key)
    {
        $healthy = '';
        switch ($key) {
            case 1:
                $healthy = '健康';
                break;
            case 2:
                $healthy = '良好';
                break;
            case 3:
                $healthy = '较差';
                break;
        }
        return $healthy;
    }
}