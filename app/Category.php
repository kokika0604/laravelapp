<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
  use SoftDeletes;
  protected $table='categories';
  protected $dates = ['deleted_at'];

  public static function get_category_info()
  {
      $category_info = array();
      $parent_categories=Category::where('parent_id',null)->get();
      foreach($parent_categories as $parent_category) {
          $one_record = array(
              "category_id" => $parent_category->id,
              "category_name" => $parent_category->name,
              "children" => array()
          );

          $children_categories = Category::where("parent_id", $parent_category->id)->get();
          foreach($children_categories as $children_category) {
              $one_record["children"][] = array(
                  "category_id" => $children_category->id,
                  "category_name" => $children_category->name,
              );
          }

          $category_info[] = $one_record;
      }

      return $category_info;
  }

  public function restaurants()
  {
      return $this->belongsToMany("App\Restaurant", "restaurants_categories", "category_id", "restaurant_id");
  }
}
