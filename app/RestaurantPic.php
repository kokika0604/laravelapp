<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RestaurantPic extends Model
{
    use SoftDeletes;
    protected $table='restaurant_pics';
    protected $dates = ['deleted_at'];

    public function restaurant()
    {
        return $this->belongsTo("App\Restaurant", "restaurant_id");
    }
}
