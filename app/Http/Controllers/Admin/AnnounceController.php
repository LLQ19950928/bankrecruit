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
       $announce = Announce::where('status');

       return view('admin/announce/announceinfo', ['data' => $announce ? $announce : []]);
    }

    public function editAnnounceInfo(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin/announce/editannounceinfo');
        } else {
            $all = $request->all();
            $all['end_at'] = strtotime($all['end_at']);
            if ($all['status'] == 2) {
                $all['published_at'] = time();
            }
            $announce = Announce::create($all);
            if (!$announce) {
                return response()->json(ApiException::error(ApiException::FAILED));
            }else {
                return response()->json(ApiException::error(ApiException::SUCCESS));
            }
        }
    }

    public function updateAnnounceInfo(Request $request)
    {
          if ($request->isMethod('GET')) {
              $announce = Announce::findFirstById($request->get('id'), ['*'], true);
              return view('admin/announce/updateannounce',
                  ['data' => $announce ? $announce : []]);
          }else {
              $announce = Announce::findFirstById($request->post('id'), ['*']);
              $result = $announce->update($request->post());
              if ($result) {
                  return response()->json(ApiException::error(ApiException::SUCCESS));
              }else {
                  return response()->json(ApiException::error(ApiException::FAILED));
              }
          }
    }

    public function updateAnnounceStatus(Request $request)
    {
        $post = $request->post();
        $announce = Announce::findFirstById($post['id'], ['*']);
        $result = $announce->update($post);
        if ($result) {
            return response()->json(ApiException::error(ApiException::SUCCESS));
        }else {
            return response()->json(ApiException::error(ApiException::FAILED));
        }
    }


}