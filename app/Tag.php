<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function restaurants()
    {
        return $this->belongsToMany("App\Restaurant", "restaurants_tags", "tag_id", "restaurant_id");
    }
}
