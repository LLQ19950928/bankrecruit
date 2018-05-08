<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/5/7
 * Time: 14:57
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\Bank;
use App\Models\Job;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function getNoticeInfo(Request $request)
    {
        $apply = Apply::findFirstByKey('user_id',
             session('userId'), ['*'], true);
        $result = [];
        if ($apply['status'] != 0) {
            $bankId = (Job::findFirstById($apply['job_id'],
                ['company'], true))['company'];
            $company = (Bank::findFirstById($bankId, ['bank_name'], true))['bank_name'];
            $notice = Notice::findFirstByKey('email_type', $apply['status'],
                ['updated_at', 'email_type'], true);
            $typeValue = '';
            switch ($notice['email_type']) {
                case 1:
                    $typeValue = '笔试通知';
                    break;
                case 2:
                    $typeValue = '面试通知';
                    break;
                case 3:
                    $typeValue = '体检通知';
                    break;
                case 4:
                    $typeValue = '录用通知';
                    break;
            }
            $result = [
                'company' => $company,
                'email_type' => $notice['email_type'],
                'type_value' => $typeValue,
                'updated_at' => date('Y-m-d', $notice['updated_at'])
            ];
        }
        return view('frontend/notice/noticeinfo', ['data' => $result]);
    }

    public function getNoticeDetail(Request $request)
    {
        $emailType = $request->get('type');
        $notice = Notice::findFirstByKey('email_type', $emailType, ['content'], true);
        return view('frontend/notice/noticedetail', ['data' => $notice['content']]);
    }
}