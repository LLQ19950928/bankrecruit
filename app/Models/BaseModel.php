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
        return $toArray ? $models->all() : $models;
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


    public static function findMoreByKey($key, $value, $columns=['*'], $toArray=false)
    {
        $models = self::where($key, $value)->get($columns);

        if ($models) {

            return $toArray ? $models->all() : $models;
        }

        return false;

    }

    public static function findAll($columns=['*'], $toArray=false)
    {
        $models = self::all($columns);
        if ($models) {

            return $toArray ? $models->all() : $models;
        }
        return false;
    }



}