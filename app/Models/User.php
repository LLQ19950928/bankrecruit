<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 2018/1/3
 * Time: 18:01
 */

namespace App\Models;



use Illuminate\Database\Eloquent\ModelNotFoundException;

class User extends BaseModel
{
     protected $table = "user";
     protected $dateFormat = 'U';
     protected $guarded = [];

     public function setPasswordAttribute($password)
     {
         $this->attributes['password'] = password_hash($password, PASSWORD_BCRYPT);
     }

     public function getHighestEducationAttribute($key)
     {
         try{
             $result = HEducation::findOrFail($key);
             return $result->name;
         }catch (ModelNotFoundException $e) {
             return '';
         }
     }

     public function getHighestDegreeAttribute($key)
     {
        try{
            $result = HDegree::findOrFail($key);
            return $result->name;
        }catch (ModelNotFoundException $e) {
            return '';
        }
     }
}