<?php 

namespace App\Traits;

use App\Utils\DateUtil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Builder;
trait HasUUID
{
    public static function bootHasUUID()
    { 
        static::creating(function ($model) {
            $model->uuid = (string) \Illuminate\Support\Str::uuid();
        });   
       
    }

  
}
