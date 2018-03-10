<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/3/10
 * Time: 16:01
 */

namespace App\Http\Controllers\Admin;


use App\Handlers\ApiException;
use App\Http\Controllers\Controller;
use App\Models\AboutBank;
use Illuminate\Http\Request;

class AboutBankController extends Controller
{

     public function editBankInfo(Request $request)
     {
         $aboutBank = AboutBank::findAll(['*'], true);
          if ($request->isMethod('GET')) {

              return view('admin/aboutbank/editbankinfo',
                  ['data' => $aboutBank ? $aboutBank[0] : []]);
          }else {

              if ($aboutBank) {
                  //修改银行信息
                  $post = $request->post();
                  $result = $aboutBank[0]->update([
                      'introduction' => $post['introduction'],
                      'culture' => $post['culture'],
                      'train' => $post['train']
                  ]);
                  if ($result) {
                      return ApiException::success(ApiException::SUCCESS);
                  }else {
                      return ApiException::error(ApiException::FAILED);
                  }
              }else {
                  $result = AboutBank::create($request->post());
                  if ($result) {
                      return ApiException::success(ApiException::SUCCESS);
                  }else {
                      return ApiException::error(ApiException::FAILED);
                  }
              }
          }

     }

     public function getBankInfo()
     {
          return view('admin/aboutbank/bankinfo');
     }


}