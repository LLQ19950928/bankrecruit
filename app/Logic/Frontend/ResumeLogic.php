<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/1/12
 * Time: 11:28
 */

namespace App\Logic\Frontend;


use App\Handlers\ApiException;
use App\Models\Bonus;
use App\Models\Credit;
use App\Models\Education;
use App\Models\EducationType;
use App\Models\FamilyMember;
use App\Models\ForeignLanguage;
use App\Models\HDegree;
use App\Models\HEducation;
use App\Models\Punishment;
use App\Models\SchoolLocation;
use App\Models\Resume;
use App\Models\TrainType;
use App\Models\User;
use App\Models\UserInfo;

class ResumeLogic
{
     public function acquireEducationInfo(&$data)
     {
         //获取学历数据
         $educationData = HEducation::findAll(['*'], true);
         if (!$educationData) {
             return response()->json(ApiException::error(ApiException::FAILED));
         }
         $data['edu'] = $educationData;
         //获取学位数据
         $degreeData = HDegree::findAll(['*'], true);
         if (!$degreeData) {
             return response()->json(ApiException::error(ApiException::FAILED));
         }
         $data['degree'] = $degreeData;
         //获取学校属地
         $locationData = SchoolLocation::findAll(['*'], true);
         if (!$locationData) {
             return response()->json(ApiException::error(ApiException::FAILED));
         }
         $data['location'] = $locationData;

         //获取培养方式信息
         $trainData = TrainType::findAll(['*'], true);
         if (!$trainData) {
             return response()->json(ApiException::error(ApiException::FAILED));
         }
         $data['train'] = $trainData;
         //获取教育类型
         $eduType = EducationType::findAll(['*'], true);
         if (!$eduType) {
             return response()->json(ApiException::error(ApiException::FAILED));
         }
         $data['eduType'] = $eduType;
     }

    public function acquireResumeInfo()
    {
        $userId = session('userId');
        $schoolResume = Resume::findFirstByKey('user_id', $userId, ['*']);
        //获取个人基本信息
        $userInfo = UserInfo::findFirstById($schoolResume->info_id, ['*'], true);
        //获取教育背景
        $education = Education::findMoreByKey('resume_id', $schoolResume->id, ['*'], true);
        //获取最高学历
        $user = User::findFirstById($userId, ['highest_education', 'highest_degree'], true);
        //获取外语能力
        $foreignLanguage = ForeignLanguage::findMoreByKey('resume_id', $schoolResume->id, ['*'], true);
        //获取学分绩点
        $credit = Credit::findFirstById($schoolResume->credit_id, ['*'], true);
        //获取家庭成员信息
        $familyMember = FamilyMember::findMoreByKey('resume_id', $schoolResume->id, ['*'], true);
        //获取奖惩情况
        $bonus = Bonus::findMoreByKey('resume_id', $schoolResume->id, ['*'], true);
        $punishment = Punishment::findMoreByKey('resume_id', $schoolResume->id, ['*'], true);

        $data = [
            'userInfo' => $userInfo ? $userInfo : [],
            'education' => $education ? $education : [],
            'user' => $user ? $user : [],
            'foreignLanguage' => $foreignLanguage ? $foreignLanguage : [],
            'credit' => $credit ? $credit : [],
            'familyMember' => $familyMember ? $familyMember : [],
            'bonus' => $bonus ? $bonus : [],
            'punishment' => $punishment ? $punishment : []
        ];
        return $data;
    }
}