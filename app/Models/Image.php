<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Image extends Model
/** 
*@property string $title
*@property string $image
*@property string $image_name
*@property string $position
*@property string $status
*@property string $created_at
*@property string $update_at
*@property string $delete_at
*/
{   
    /**
     *@var array
     */

     protected $fillable=['title','image','image_name','position','status','created_at','update_at','delete_at',];
}
