<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/1/12
 * Time: 11:18
 */

namespace App\Logic\Backend;



use App\Models\User;
use Illuminate\Http\Request;

class LoginLogic
{
    public function checkPassword(Request $request)
    {
        $username = $request->post('username');
        $password = $request->post('password');
        $user = User::findFirstByKey('username', $username);
        $hash = $user->password;
        if (password_verify($password, $hash)) {
            session(['userId' => $user->id]);
            session(['username' => $user->username]);
            return true;
        }
        return false;
    }
}