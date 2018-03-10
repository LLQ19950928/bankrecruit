<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/6
 * Time: 17:02
 */

namespace App\Http\Controllers\Admin;


use App\Handlers\ApiException;
use App\Http\Controllers\Controller;
use App\Models\Announce;
use Illuminate\Http\Request;

class AnnounceController extends Controller
{
    public function getAnnounceInfo()
    {
       $announce = Announce::findAll(['*'], true);
       return view('admin/announce/announceinfo', ['data' => $announce ? $announce : []]);
    }

    public function editAnnounceInfo(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin/announce/editannounceinfo');
        } else {
            $announce = Announce::create($request->post());
            if (!$announce) {
                return response()->json(ApiException::error(ApiException::FAILED));
            }
            if ($announce->status == 1) {
                $result = $announce->update(['published_at' => time()]);
                if ($result) {
                    return response()->json(ApiException::error(ApiException::SUCCESS));
                }else {
                    return response()->json(ApiException::error(ApiException::FAILED));
                }
            }else {
                return response()->json(ApiException::error(ApiException::SUCCESS));
            }
        }
    }


}