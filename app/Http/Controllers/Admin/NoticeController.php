<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/5/6
 * Time: 11:44
 */

namespace App\Http\Controllers\Admin;


use App\Handlers\ApiException;
use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\Notice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;

class NoticeController extends Controller
{
     public function noticeManage(Request $request)
     {
         return view('admin/notice/noticemanage');
     }

     public function displayEmail(Request $request)
     {
         return view('admin/notice/editemail');
     }

     public function editEmail(Request $request)
     {
         $type = $request->get('type');
         $notice = Notice::findFirstByKey('email_type', $type, ['content'], true);
         return response()->json(ApiException::success(
             ApiException::SUCCESS, $notice ? $notice : []));
     }

     public function sendEmail(Request $request)
     {
         $post = $request->post();
         $notice = Notice::findFirstByKey('email_type', $post['email_type'], ['*']);
         if ($notice) {
             $notice = $notice->update($post);
         }else {
             $notice = Notice::create($post);
         }
         //发送邮件
         $apply = Apply::findMoreByKey('status', $post['type'], ['user_id'], true);
         $users = [];
         foreach ($apply as $a) {
              $users[] = (User::findFirstById($a['user_id'],
                  ['username'], true))['username'];
         }
         Mail::to($users[0]['username'])->send(new \App\Mail\Notice($notice['content']));
     }
}