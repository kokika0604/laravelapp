<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RestaurantCategory extends Model
{
    use SoftDeletes;
    protected $table='restaurants_categories';
    protected $dates = ['deleted_at'];
}
