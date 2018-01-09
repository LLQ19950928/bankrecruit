<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/1/8
 * Time: 14:21
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BaseModel extends Model
{
    public static function findFirstById($id, $columns=['*'], $toArray=false)
    {
        try {
            $model = self::findOrFail($id, $columns);
        }catch (ModelNotFoundException $exception) {
            return false;
        }

        return $toArray ? $model->toArray() : $model;
    }

    public static function findMoreByIds(array $ids=[], $columns=['*'], $toArray=false)
    {
        try {
            $models = self::findOrFail($ids, $columns);
        }catch (ModelNotFoundException $exception) {
            return false;
        }
        $modelArr = [];
        if ($toArray) {
            foreach ($models as $model) {
                $modelArr[] = $model->toArray();
            }
        }
        return $toArray ? $modelArr : $models;
    }

    public static function findFirstByKey($key, $value, $columns=['*'], $toArray=false, $condition='=')
    {
         try {
             $model = self::where($key, $condition, $value)->firstOrFail($columns);
         }catch (ModelNotFoundException $exception) {
             return false;
         }

         return $toArray ? $model->toArray() : $model;
    }






}