<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/1/12
 * Time: 14:59
 */

namespace App\Http\Controllers\Admin;


use App\Validations\AnnounceValidation;
use Illuminate\Http\Request;

class AnnounceController
{

    public function editAnnounce(Request $request)
    {
        $announceValidation = new AnnounceValidation();
        $validator =$announceValidation->validateAnnounce($request);
        
    }
}