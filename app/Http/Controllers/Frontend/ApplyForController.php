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
use App\Models\Bank;
use App\Models\Job;


class ApplyForController extends Controller
{
     public function applyInfo()
     {
         $userId = session('userId');
         $applyArr = Apply::findFirstByKey('user_id', $userId, ['*'], true);
         if ($applyArr) {
             $job = Job::findFirstById($applyArr['job_id'], ['job_name', 'company'], true);
             $applyArr['company'] = (Bank::findFirstById($job['company'], ['*'], true))['bank_name'];
             $applyArr['job_name'] = $job['job_name'];
         }
         return view('frontend/applyfor/applyinfo',
             ['data' => $applyArr ? $applyArr : []]);
     }
}