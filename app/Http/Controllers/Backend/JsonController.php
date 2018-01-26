<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/1/26
 * Time: 11:37
 */

namespace App\Http\Controllers\Backend;


use App\Handlers\ApiException;
use App\Http\Controllers\Controller;
use App\Models\Nation;
use App\Models\Polity;
use Illuminate\Support\Facades\Cache;

class JsonController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     * 获取民族信息
     */
    public function acquireNationInfo()
    {
        $cacheKey = 'nation';
        $nation = Cache::get($cacheKey);
        if (!$nation) {
            $nation = Nation::findAll(['*'], true);
            if (!$nation) {
                return response()->json(ApiException::error(ApiException::FAILED));
            }
            Cache::put($cacheKey, $nation, 3 * 60);
            return response()->json(ApiException::success(ApiException::SUCCESS, $nation));
        }
        return response()->json(ApiException::success(ApiException::SUCCESS, $nation));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * 获取政治面貌信息
     */
    public function acquirePolityInfo()
    {
        $cacheKey = 'polity';
        $polity = Cache::get($cacheKey);
        if (!$polity) {
            $polity = Polity::findAll(['*'], true);
            if (!$polity) {
                return response()->json(ApiException::error(ApiException::FAILED));
            }
            Cache::put($cacheKey, $polity, 3 * 60);
            return response()->json(ApiException::success(ApiException::SUCCESS, $polity));
        }
        return response()->json(ApiException::success(ApiException::SUCCESS, $polity));
    }
}