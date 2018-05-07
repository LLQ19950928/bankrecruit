<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/9
 * Time: 17:24
 */

namespace App\Http\Controllers\Admin;


use App\Handlers\ApiException;
use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    public function applyJob(Request $request)
    {
        $post = $request->post();
        $result = Apply::create($post);
        if ($result) {
            return ApiException::success(ApiException::SUCCESS);
        }else {
            return ApiException::error(ApiException::FAILED);
        }
    }

    public function getApplyInfo()
    {
        $apply = Apply::findAll(['*'], true);
        foreach ($apply as &$a) {
            $jobName = (Job::findFirstById($a['job_id'], ['job_name'], true))['job_name'];
            $username = (User::findFirstById($a['user_id'], ['email'], true))['email'];
            $a['job_name'] = $jobName;
            $a['username'] = $username;
        }
        return view('admin/apply/applyinfo', ['data' => $apply ? $apply : '']);
    }

    public function updateApplyStatus(Request $request)
    {
         $applyId = $request->get('id');
         $status = $request->get('status');
         $apply = Apply::findFirstById($applyId, ['*']);
         $result = $apply->update(['status' => $status]);
         if ($result) {
             return ApiException::success(ApiException::SUCCESS);
         }else {
             return ApiException::error(ApiException::FAILED);
         }

    }
}