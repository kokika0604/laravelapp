<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RestaurantTag extends Model
{
    use SoftDeletes;
    protected $table='restaurants_tags';
    protected $dates = ['deleted_at'];
}
