<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/1/8
 * Time: 14:21
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public static function findById($id, $toArray=false)
    {
        $model = self::find($id);
        return $toArray ? $model->toArray() : $model;
    }

    public static function findByIds(array $ids=[], $toArray=false)
    {
        $models = self::find($ids);
        $modelArr = [];
        if ($toArray) {
            foreach ($models as $model) {
                $modelArr[] = $model->toArray();
            }
        }
        return $toArray ? $modelArr : $models;
    }

    public static function findByKey($key, $value, $toArray=false, $condition='=')
    {
         $model = self::where($key, $condition, $value)->first();
         return $toArray ? $model->toArray() : $model;
    }


}