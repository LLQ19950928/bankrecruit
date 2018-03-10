<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/8
 * Time: 23:39
 */

namespace App\Http\Controllers\Frontend;


use App\Models\Announce;
use Illuminate\Http\Request;

class AnnounceController
{
    public function getAnnounceInfo(Request $request)
    {
        $announceArr = Announce::findMoreByKey('status', 1, ['*'], true);
        return view('frontend/announce/announceinfo',
            ['data' => $announceArr ? $announceArr : []]);
    }

    public function getAnnounceDetail(Request $request)
    {
        $id = $request->get('id');
        $announce = Announce::findFirstById($id, ['*'], true);
        return view('frontend/announce/announcedetail',
            ['announce' => $announce ? $announce : []]);
    }
}