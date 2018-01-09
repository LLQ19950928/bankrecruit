<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/1/9
 * Time: 12:12
 */

namespace App\Http\Controllers\Backend;


use App\Handlers\ApiException;
use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\User;

class TestController extends Controller
{
    public function test()
    {
        $education = Education::where('school_name', 1)->get();
        foreach ($education as $e) {
            $arr[] = $e->all();
        }
        return response()->json(ApiException::success(ApiException::SUCCESS, $arr));
    }
}