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
        return $key == 0 ? '男' : '女';
    }

    public function getNationAttribute($key)
    {
        $nation = Nation::findFirstById($key, ['nation'])->nation;
        return $nation;
    }

    public function getPoliticalStatusAttribute($key)
    {
       $policy = Polity::findFirstById($key, ['political_name'])->political_name;
       return $policy;
    }

    public function getMarryAttribute($key)
    {
        return $key == 0 ? '未婚' : '已婚';
    }

    public function getIdTypeAttribute($key)
    {
        return $key == 0 ? '身份证' : '港澳身份证';
    }
}