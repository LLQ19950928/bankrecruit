<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/6
 * Time: 21:20
 *
 * 用户简历
 */

namespace App\Http\Controllers\Backend;


use App\Handlers\ApiException;
use App\Http\Controllers\Controller;
use App\Models\SchoolResume;
use App\Models\UserInfo;
use App\Validations\ResumeValidation;
use Illuminate\Http\Request;

class ResumeController extends Controller
{

    /**
     * 编辑简历
     */
    public function editResume()
    {

    }

    /**
     * 预览简历
     */
    public function previewResume()
    {
        
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * 显示个人基本信息
     */
    public function displayUserInfo()
    {
        $schoolResume = SchoolResume::where('user_id', session('userId', 0))->first();
        $infoId = $schoolResume->info_id;
        if ($infoId) {
            $userInfo = UserInfo::find($infoId);
            $userInfoArr = $userInfo->toArray();
            return response()->json(ApiException::success('', $userInfoArr));
        }else {
            return response()->json(ApiException::success('', []));
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 编辑个人基本信息
     */
    public function editUserInfo(Request $request)
    {
        $resumeValidation = new ResumeValidation();
        $validator = $resumeValidation->validateUserInfo($request);
        if ($validator->fails()) {
            return response()->json(ApiException::error(ApiException::VALIDATION_FAILED,
                $validator->errors()->first()));
        }
        $schoolResume = SchoolResume::where('user_id', session('userId', 0))->first();
        if ($schoolResume->info_id == 0) {
            $userInfo = UserInfo::create($request->post());
            $result = $schoolResume->update(['info_id' => $userInfo->id]);
        }else {
            $result = UserInfo::where('id', $schoolResume->info_id)->update($request->post());
        }
        if ($result) {
            return response()->json(ApiException::success());
        }else {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
    }


}