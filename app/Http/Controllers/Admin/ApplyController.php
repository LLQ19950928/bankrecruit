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
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    public function applyJob(Request $request)
    {
        $post = $request->post();
        try {
            $apply = Apply::where('user_id', session('userId'))
                ->where('job_id', $post['job_id'])->firstOrFail();
        }catch (\Exception $exception) {
            $apply = false;
        }
        if ($post['is_update']) {

            $result = $apply->update($post);
        }else {
            if (!$apply) {
                $result = Apply::create($request->post());
            }else {
                return ApiException::error(ApiException::REPEAT_APPLY);
            }
        }
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
            $a['job_name'] = $jobName;
        }
        return view('admin/apply/applyinfo', ['data' => $apply ? $apply : '']);
    }
}