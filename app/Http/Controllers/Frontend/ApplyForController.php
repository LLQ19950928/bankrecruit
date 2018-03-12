<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/11
 * Time: 20:43
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\Job;


class ApplyForController extends Controller
{
     public function applyInfo()
     {
         $userId = session('userId');
         $applyArr = Apply::findMoreByKey('user_id', $userId, ['*'], true);
         foreach ($applyArr as &$apply)
         {
             $job = Job::findFirstByKey('job_name', $apply['job_id'], ['company'], true);
             $apply['company'] = $job['company'];
         }
         return view('frontend/applyfor/applyinfo',
             ['data' => $applyArr ? $applyArr : []]);
     }
}