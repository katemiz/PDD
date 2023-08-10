<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;


trait HasUpdatedBy
{
    public static function bootHasUpdatedBy():void 
    {
        static::creating(function ($model) {
            $model->updated_uid = Auth::id();
        });
    }
}
