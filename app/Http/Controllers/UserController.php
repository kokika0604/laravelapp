<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use App\MtbPrefecture;
  use App\User;
  use Illuminate\Support\Facades\Hash;
  use Validator;
  use Illuminate\Support\Facades\Auth;
  use App\Favourite;
  use App\RestaurantPic;
  use App\Mail\RegisterMail;
  use Illuminate\Support\Facades\Mail;

  // 建立基本函数
  class UserController extends Controller
  {


      public function login(Request $request)
      {
        if($request->isMethod("get")) {

          return view("user.login");

        } else {

          $a = array(
            "email" => $request->email,
            "password" => $request->password
          );

          if (Auth::attempt($a)) {
              // Authentication passed...
              return redirect()->route("get_user_mypage");

          } else {
              return redirect()->route("get_user_login");
          }
        }

      }

      public function logout(Request $request)
      {
          Auth::logout();

          return redirect()->route("get_user_login");


      }
      public function mypage(Request $request)
      {

          $user = Auth::user();

        return view("user.mypage", array("user" => $user));

      }

      public function info(Request $request){
          $user = Auth::user();
          $mtb_prefecture = MtbPrefecture::find($user->mtb_prefecture_id);
          return view("user.info",array('user' => $user,'mtb_prefecture' =>$mtb_prefecture->value));
      }

      public function add(Request $request)
      {

        if($request->isMethod("get")) {
          $mtb_prefectures = MtbPrefecture::get();

          return view("user.add", array("mtb_prefectures" => $mtb_prefectures));
        } else {

          //validation
             // 前台显示信息规则
          $validation_rules = array(
            "name" => "required|max:10",
            "email" => "required|email|unique:users,email",
            "telephone" => "digits_between:10,11",
            "password" => "confirmed"
          );
              // 错误信息规则
          $validation_messages = array(
            "name.required" => "名前を入力して下さい。",
            "name.max" => "{:max}文字以内を入力して下さい。",
          );
            // 验证
          // $validator = Validator::make($request->all(), $validation_rules, $validation_messages);
          //   // 验证失败显示错误信息并保留书输入数据，redirect功能=header
          // if($validator->fails()) {
          //   return redirect(route("get_user_add"))->withErrors($validator)->withInput();
          // }

          $user = new User;
          $user->name = $request->name;
          $user->email = $request->email;
          $user->password = Hash::make($request->password);
          $user->phone = $request ->telephone;
          $user->postcode = $request->postcode;
          $user->mtb_prefecture_id = $request->mtb_prefecture_id;
          $user->address1 = $request->address1;
          $user->address2 = $request->address2;

          if($user->save()){

            
            Mail::to("gyh19940604@sina.com")->send(new RegisterMail($request));

            return view("user.login");

          }

        }
      }


      public function edit(Request $request)
      {
          if($request->isMethod("get")) {
            $user = Auth::user();
            $mtb_prefectures = MtbPrefecture::get();
            return view("user.edit",array("user" => $user,"mtb_prefectures" => $mtb_prefectures));
          } else {
            //validation
            $validation_rules = array(
              "name" => "required|max:10",
              "email" => "required|email",
              "telephone" => "digits_between:10,11",
              "newpassword" => "confirmed"
            );
            $validation_messages = array(
              "name.required" => "名前を入力して下さい。",
              "name.max" => "{:max}文字以内を入力して下さい。",
              "email.required"=> "emailを入力して下さい。",
              "email.email"=> "emailを正しく入力して下さい。",
              "email.unique"=> "すでに使用されているメールアドレスです。",
              "phone.digits_between"=>"電話番号を正しく入力して下さい。",
              "password.confirmed" =>"passwordを正しく入力して下さい。",
            );
            $validator = Validator::make($request->all(), $validation_rules, $validation_messages);
            if($validator->fails()) {
              return redirect(route("get_user_edit"))->withErrors($validator)->withInput();
            }
            $user = Auth::user();
            $user->name = $request->name;
            $user->email = $request->email;
            if(isset($request->oldpassword) and $user->password==Hash::make($request->oldpassword) and isset($request->newpassword)){
                 $user->password = Hash::make($request->newpassword);
             }
            $user->phone = $request->phone;
            $user->postcode = $request->postcode;
            $user->mtb_prefecture_id = $request->mtb_prefecture_id;
            $user->address1 = $request->address1;
            $user->address2 = $request->address2;
            $user->save();
            return redirect(route('get_user_info'));
          }

      }

      public function delete(Request $request)
      {

      }

      public function favourites(Request $request)
      {
          $user = Auth::user();
          $restaurants = $user->restaurantsByFavourites;

      return view("user.favourites",array("user" => $user,"restaurants" => $restaurants));
      }
  }
