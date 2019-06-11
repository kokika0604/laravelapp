<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MtbPrefecture extends Model
{
  protected $guarded=array('id');
  public static $rules =array(
    'value'=>'required',
    'rank'=>'required'
  );

  public function restaurants()
  {
      return $this->hasMany("App\Restaurant", "mtb_prefecture_id");
  }
}
