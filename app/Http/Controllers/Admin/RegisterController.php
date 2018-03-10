<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/6
 * Time: 14:31
 */

namespace App\Http\Controllers\Admin;


use App\Models\Admin;
use Illuminate\Http\Request;

class RegisterController
{
    public function display()
    {
        return view('admin/register/display');
    }


    public function register(Request $request)
    {
        $admin = Admin::create($request->post());
        if ($admin) {
            return redirect('admin/login/display');
        }
    }
}