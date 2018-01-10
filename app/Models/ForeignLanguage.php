<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/1/10
 * Time: 15:11
 */

namespace App\Models;


class ForeignLanguage extends BaseModel
{
    public $table = 'language';
    public $guarded = [];
    public $dateFormat = 'U';

    public function getTypeIdAttribute($key)
    {
          $type = LanguageType::findFirstById($key);
          return $type ? $type->language_name : '';
    }

    public function getCertificateLevelIdAttribute($key)
    {
          $certificate = Certificate::findFirstById($key);
          return $certificate ? $certificate->name : '';
    }

    public function getAcquireDateAttribute($key)
    {
          return date('Y-m-d', $key);
    }
}