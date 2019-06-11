<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function restaurant()
    {
        return $this->belongsTo("App\Restaurant", "restaurant_id");
    }

    public function user()
    {
        return $this->belongsTo("App\User", "user_id");
    }
}
