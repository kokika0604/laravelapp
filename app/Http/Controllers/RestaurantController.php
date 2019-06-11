<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MtbPrefecture;
use App\Restaurant;
use App\Category;
use App\RestaurantCategory;
use App\RestaurantTag;
use App\Tag;
use App\RestaurantPic;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
  public function login(Request $request){
    if ($request->isMethod('post')){

      $item = [
        "email" => $request->email,
        "password" => $request->password
      ];
      if (Auth::guard("restaurants")->attempt($item)) {
          // Authentication passed...
          return redirect(route("get_restaurant_mypage"));
    } else {
      $error="メールアドレスまたはパースワードが間違っています。";
      return view('restaurant.login',['error'=>$error]);
    }

    } else {
      return view('restaurant.login');
    }
  }

  public function logout(Request $request){
    Auth::guard("restaurants")->logout();

    return redirect()->route("get_restaurant_login");
  }



  public function add(Request $request){
    $items=MtbPrefecture::get();

    if ($request->isMethod('get')){
      return view('restaurant.add',['items'=>$items]);
    } else {

        if(!$request->phone){
            $phone=$request->phone1.$request->phone2.$request->phone3;
            request()->offsetSet('phone', $phone);
        }
        if(!$request->postcode){
            $postcode=$request->postcode1.$request->postcode2;
            request()->offsetSet('postcode', $postcode);
        }

        $validation_rules=[
            'email'=>'required|email|unique:restaurants,email',
            'name'=>'required|unique:restaurants,name',
            "phone"=>'required|digits:10|unique:restaurants,phone',
            "postcode"=>'required|digits:7',
            "mtb_prefecture"=>'required',
            "address1"=>'required',
            "address2"=>'required',
            "business_hour"=>'required',
            "password"=>'required|confirmed'
        ];

        $validation_messages=[
            'email.required'=>'メールアドレスを入力してください。',
            'email.email'=>'正しいメールアドレスを入力してください。',
            'email.unique'=>'すでに使用されているメールアドレスです。',
        ];


      $validator=Validator::make($request->all(),$validation_rules,$validation_messages);
      if($validator->fails()){
        return redirect(route('get_restaurant_add'))->withErrors($validator)->withInput();
      }
      $restaurant=new Restaurant;
      $restaurant->email=$request->email;
      $restaurant->name=$request->name;
      $restaurant->phone=$request->phone;
      $restaurant->postcode=$request->postcode;
      $restaurant->mtb_prefecture_id=$request->mtb_prefecture;
      $restaurant->address1=$request->address1;
      $restaurant->address2=$request->address2;
      $restaurant->business_hour=$request->business_hour;
      $restaurant->password=Hash::make($request->password);

      $restaurant->save();
      return view('restaurant.login');
    }
  }

    public function mypage(){
      $item=Auth::guard("restaurants")->user();
      return view('restaurant.mypage',['item'=>$item]);
    }


    public function info(Request $request){

        $item=Auth::guard("restaurants")->user();
        $action='';

      return view('restaurant.info',['item'=>$item,'info_action'=>$action]);
    }



    public function edit(Request $request){
      if ($request->isMethod('get')){
        $action='edit';
        $prefectures=MtbPrefecture::get();

        $category_info = Category::get_category_info();

        $tags=Tag::get();

        $item = Auth::guard("restaurants")->user();
        $rs_cs=RestaurantCategory::where('restaurant_id',$item->id)->get();
        $rs_ts=RestaurantTag::where('restaurant_id',$item->id)->get();
        return view('restaurant.info',['item'=>$item,'prefectures'=>$prefectures,'tags'=>$tags,
                    'rs_cs'=>$rs_cs,'rs_ts'=>$rs_ts, "category_info" => $category_info,'info_action'=>$action]);
    } else{

        if(!$request->phone){
            $phone=$request->phone1.$request->phone2.$request->phone3;
            request()->offsetSet('phone', $phone);
        }
        if(!$request->postcode){
            $postcode=$request->postcode1.$request->postcode2;
            request()->offsetSet('postcode', $postcode);
        }

        $validation_rules=[
          'email'=>'required|email',
          'name'=>'required',
          "phone"=>'required|digits:10',
          "postcode"=>'required|digits:7',
          "mtb_prefecture_id"=>'required',
          "address1"=>'required',
          "address2"=>'required',
          "business_hour"=>'required',
        ];

      $validation_messages=[
        'email.required'=>'メールアドレスを入力してください。',
        'email.email'=>'正しいメールアドレスを入力してください。',
        'email.unique'=>'すでに使用されているメールアドレスです。',

      ];

      $validator=Validator::make($request->all(),$validation_rules,$validation_messages);
      if($validator->fails()){
        return redirect(route('get_restaurant_info_edit'))->withErrors($validator)->withInput();
      }


      $restaurant = Auth::guard("restaurants")->user();
      $restaurant->email = $request->email;
      $restaurant->name = $request->name;
      $restaurant->phone = $request->phone;
      $restaurant->postcode = $request->postcode;
      $restaurant->mtb_prefecture_id = $request->mtb_prefecture_id;
      $restaurant->address1 = $request->address1;
      $restaurant->address2=$request->address2;
      $restaurant->business_hour=$request->business_hour;
      $restaurant->lunch_low_cost=$request->lunch_low_cost;
      $restaurant->lunch_high_cost=$request->lunch_high_cost;
      $restaurant->course_low_cost=$request->course_low_cost;
      $restaurant->course_high_cost=$request->course_high_cost;
      $restaurant->short_description=$request->short_description;
      $restaurant->long_description=$request->long_description;

      $restaurant->save();


      $restaurant->update_categories($request->category_ids);
      $restaurant->update_tags($request->tags);


      return redirect(route('get_restaurant_info'));

    }
  }








}
