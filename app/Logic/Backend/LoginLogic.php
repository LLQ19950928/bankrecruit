<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/1/12
 * Time: 11:18
 */

namespace App\Logic\Backend;



use App\Models\Admin;
use App\Models\Resume;
use App\Models\User;
use Illuminate\Http\Request;

class LoginLogic
{
    public function checkPassword(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');
        $user = User::findFirstByKey('email', $email);
        $resume = Resume::findFirstByKey('user_id', $user->id, ['id']);
        $hash = $user->password;
        if (password_verify($password, $hash)) {
            if ($resume) {
                session(['resumeId' => $resume->id]);
            }
            session(['userId' => $user->id]);
            session(['username' => $user->email]);
            return true;
        }
        return false;
    }

    public function checkAdminPassWord(Request $request)
    {
        $username = $request->post('username');
        $password = $request->post('password');
        $admin = Admin::findFirstByKey('username', $username);
        $hash = $admin->password;
        if (password_verify($password, $hash)) {
            session(['adminId' => $admin->id]);
            session(['adminName' => $admin->username]);
            return true;
        }
        return false;
    }
}