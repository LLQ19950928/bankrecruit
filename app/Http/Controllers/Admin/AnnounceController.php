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
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 显示公告列表
     */
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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * 添加公告
     */
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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * 修改公告
     */
    public function updateAnnounceInfo(Request $request)
    {
          if ($request->isMethod('GET')) {
              $announce = Announce::findFirstById($request->get('id'), ['*'], true);
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
              $data = [
                  'announce' => $announce,
                  'bank' => $arr
              ];
              return view('admin/announce/updateannounce',
                  ['data' => $data]);
          }else {
              $announce = Announce::findFirstById($request->post('id'), ['*']);
              $post = $request->post();
              $post['end_at'] = strtotime($post['end_at']);
              $result = $announce->update($post);
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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 查看公告详情
     */
    public function getAnnounceDetail(Request $request)
    {
         $id = $request->get('id');
         $announce = Announce::findFirstById($id, ['*'], true);
         $announce['company'] = (Bank::findFirstById($announce['company'],
             ['bank_name'], true))['bank_name'];
         return view('admin/announce/announcedetail', ['data' => $announce]);
    }


}