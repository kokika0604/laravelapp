<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\RestaurantCategory;
use App\RestaurantTag;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;


class Restaurant extends Authenticatable
{
    use SoftDeletes;
    protected $table='restaurants';
    protected $dates = ['deleted_at'];

    public function update_categories($category_ids)
    {
        $old_categories = RestaurantCategory::where("restaurant_id", $this->id)->get();
        foreach($old_categories as $old_category) {
             $old_category->delete();
        }

        if(isset($category_ids) && is_array($category_ids) && count($category_ids)) {
            foreach($category_ids as $category_id) {
                $restaurant_category = new RestaurantCategory;
                $restaurant_category->restaurant_id = $this->id;
                $restaurant_category->category_id = $category_id;
                $restaurant_category->save();
            }
        }
    }

    public function update_tags($tag_ids)
    {
        $old_tags = RestaurantTag::query()->where("restaurant_id", $this->id)->get();
        foreach($old_tags as $old_tag) {
            $old_tag->delete();
        }

        if(isset($tag_ids) && is_array($tag_ids) && count($tag_ids)) {
            foreach($tag_ids as $tag_id) {
                $restaurant_tag = new RestaurantTag;
                $restaurant_tag->restaurant_id = $this->id;
                $restaurant_tag->tag_id = $tag_id;
                $restaurant_tag->save();
            }
        }
    }

    public function mtb_prefecture()
    {
        return $this->belongsTo("App\MtbPrefecture", "mtb_prefecture_id");
    }

    public function categories()
    {
        return $this->belongsToMany("App\Category", "restaurants_categories", "restaurant_id", "category_id")
        ->whereNull('restaurants_categories.deleted_at')
        ->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany("App\Tag", "restaurants_tags", "restaurant_id", "tag_id")
        ->whereNull('restaurants_tags.deleted_at')
        ->withTimestamps();
    }

    public function pics()
    {
        return $this->hasMany("App\RestaurantPic", "restaurant_id");
    }

    public function menus()
    {
        return $this->hasMany("App\Menu", "restaurant_id");
    }

    public function reviews()
    {
        return $this->hasMany("App\Review", "restaurant_id");
    }

    public function usersByFavourites(){
        return $this->belongsToMany('App\User',"favourites","restaurant_id","user_id")->whereNull('favourites.deleted_at')->withTimestamps();
    }



}
