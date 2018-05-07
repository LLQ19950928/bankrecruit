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
use App\Logic\Backend\CateLogic;
use App\Models\Announce;
use App\Models\Bank;
use Illuminate\Http\Request;

class AnnounceController extends Controller
{
    public function getAnnounceInfo()
    {
       $announces = Announce::whereIn('status', [1, 2])->get();
        foreach ($announces as &$announce)
        {
            $announce['company'] = (Bank::findFirstById($announce['company'],
                ['bank_name'], true))['bank_name'];
        }
       $data = $announces ? $announces->all() : false;
       return view('admin/announce/announceinfo', ['data' => $data ? $data : []]);

    }

    public function editAnnounceInfo(Request $request)
    {
        if ($request->isMethod('get')) {
            $banks = Bank::findAll(['id', 'bank_name', 'pid'], true);
            $bankArr = [];
            foreach ($banks as $k => $bank)
            {
                $bankArr[$k] = [
                    'id' => $bank['id'],
                    'bank_name' => $bank['bank_name'],
                    'pid' => $bank['pid']];
            }

            $arr = CateLogic::getCategory($bankArr, 0);
            return view('admin/announce/editannounceinfo', ['data' => $arr]);
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