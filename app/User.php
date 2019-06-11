<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Restaurant;

class User extends Authenticatable
{

  use SoftDeletes;
  protected $guarded=array('id');
  protected $dates = ['deleted_at'];

  public static $rules =array(
    'name'=>'required',
    'email'=>'required|email',
    'postcode'=>'regex:/^[0-9]{7}$/',
    'password'=>'required',
    "password_check"=>'required|same:password'
  );

  public function reviews(){
      return $this->hasMany("App\Review", "user_id");
  }
  public function restaurantsByFavourites(){
      return $this->belongsToMany('App\Restaurant',"favourites","user_id","restaurant_id")->whereNull('favourites.deleted_at')->withTimestamps();
  }
}
