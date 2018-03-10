<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/9
 * Time: 17:21
 */

namespace App\Models;


class Apply extends BaseModel
{
    protected $table = 'apply';
    protected $guarded = [];
    protected $dateFormat = 'U';

    public function getUserIdAttribute($key)
    {
         $user = User::findFirstById($key, ['email'], true);
         return $user['email'];
    }

    public function getJobIdAttribute($key)
    {
         $job = Job::findFirstById($key, ['job_name'], true);
         return $job['job_name'];
    }

    public function getCreatedAtAttribute($key)
    {
        return date('Y-m-d H:i', $key);
    }

    public function getStatusAttribute($key)
    {
        $status = '';
        switch ($key) {
            case 0:
                $status = '待审核';
                break;
            case 1:
                $status = '通知笔试';
                break;
            case 2:
                $status = '通知面试';
                break;
            case 3:
                $status = '录用';
                break;
        }
        return $status;
    }
}