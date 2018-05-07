<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/8
 * Time: 0:20
 */

namespace App\Http\Controllers\Admin;


use App\Handlers\ApiException;
use App\Http\Controllers\Controller;
use App\Logic\Backend\CateLogic;
use App\Models\Bank;
use App\Models\Job;
use Illuminate\Http\Request;

class RecruitController extends Controller
{
    public function getSchoolRecruitInfo()
    {
          $jobs = Job::where('recruit_type', 1)->whereIn('status', [1, 2])->get();
          foreach ($jobs as &$job)
          {
              $job['company'] = (Bank::findFirstById($job['company'],
                ['bank_name'], true))['bank_name'];
          }
          $data = $jobs ? $jobs->all() : [];
          return view('admin/schoolrecruit/schoolrecruit', ['data' => $data]);
    }

    public function editSchoolRecruitInfo(Request $request)
    {
        if ($request->isMethod('get')) {
            $banks = Bank::findAll(['id', 'bank_name', 'pid'], true);
            $bankArr = [];
            foreach ($banks as $k => $bank)
            {
                $bankArr[$k] = [
                    'id' => $bank['id'],
                    'bank_name' => $bank['bank_name'],
                    'pid' => $bank['pid']];
            }

            $arr = CateLogic::getCategory($bankArr, 0);
            return view('admin/schoolrecruit/editschoolrecruitinfo', ['data' => $arr]);
        } else {
            $all = $request->all();
            if ($all['status'] == 2) {
                $all['published_at'] = time();
            }
            $all['end_at'] = strtotime($all['end_at']);
            $job = Job::create($all);
            if (!$job) {
                return response()->json(ApiException::error(ApiException::FAILED));
            }else {
                return response()->json(ApiException::success(ApiException::SUCCESS));
            }

        }

    }

    public function getSocialRecruitInfo()
    {
        $jobs = Job::where('recruit_type', 2)->whereIn('status', [1, 2])->get();
        foreach ($jobs as &$job)
        {
            $job['company'] = (Bank::findFirstById($job['company'],
                ['bank_name'], true))['bank_name'];
        }
        $data = $jobs ? $jobs->all() : [];
        return view('admin/socialrecruit/socialrecruit', ['data' => $data]);
    }

    public function editSocialRecruitInfo(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin/socialrecruit/editsocialrecruit');
        } else {
            $all = $request->all();
            if ($all['status'] == 2) {
                $all['published_at'] = time();
            }
            $all['end_at'] = strtotime($all['end_at']);
            $job = Job::create($all);
            if (!$job) {
                return response()->json(ApiException::error(ApiException::FAILED));
            }else {
                return response()->json(ApiException::success(ApiException::SUCCESS));
            }

        }
    }
}