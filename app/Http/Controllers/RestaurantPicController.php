<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\RestaurantPic;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RestaurantPicController extends Controller
{
    // public function index(){
    //     $item=Auth::guard("restaurants")->user();
    //     return view('restaurant.pic',['item'=>$item]);
    // }

    public function add(Request $request){
        $item=Auth::guard("restaurants")->user();
        if ($request->isMethod('get')){
            $info_action='';
            $pic_action='add';
            return view('restaurant.info',['item'=>$item,'info_action'=>$info_action,'pic_action'=>$pic_action]);
        } else{
            $validation_rules=[
                'pic'=>'required|image',
                'rank'=>'required'
            ];
            $validation_messages=[
                'pic.required'=>'画像をアップロードしてください。',
                'pic.image'=>'画像ファイルではありません。',
                'rank.required'=>'ランクを選んでください。'
            ];
            $validator=Validator::make($request->all(),$validation_rules,$validation_messages);
            if($validator->fails()){
              return redirect(route('get_restaurant_pic_add'))->withErrors($validator)->withInput();
            }
            $pic=new RestaurantPic;
            // $imgname = substr(md5(mt_rand()), 0, 7).".".$request->file('pic')->getClientOriginalExtension();
            //$request->file('pic')->move(base_path() . "/public/pics/$item->id/restaurant/", $imgname);
            // $pic->pic='/'."pics/$item->id/restaurant/".$imgname;
            $path=Storage::putFile("public/pics/$item->id/restaurant", $request->file('pic'));
            $pic->pic=substr($path,6);
            $pic->rank=$request->rank;
            $pic->main_flg=$request->main_flg;
            $pic->restaurant_id=$item->id;

            $pic->save();
            return redirect(route('get_restaurant_info'));
          }
        }

    public function edit(Request $request){
        $item=Auth::guard("restaurants")->user();
        if ($request->isMethod('get')){
            $info_action='';
            $pic_action='edit';
            return view('restaurant.info',['item'=>$item,'info_action'=>$info_action,'pic_action'=>$pic_action,'request'=>$request]);
        } else {
            $validation_rules=[
                'pic'=>'image',
                'rank'=>'required'
            ];
            $validation_messages=[
                'pic.image'=>'画像ファイルではありません。',
                'rank.required'=>'ランクを選んでください。'
            ];
            $validator=Validator::make($request->all(),$validation_rules,$validation_messages);
            if($validator->fails()){
              return redirect(route('get_restaurant_pic_edit',['id'=>$request->id]))->withErrors($validator)->withInput();
            }

            $pic=RestaurantPic::find($request->id);
            if (isset($request->pic)){
                // $imgname = substr(md5(mt_rand()), 0, 7).".".$request->file('pic')->getClientOriginalExtension();
                // $request->file('pic')->move(base_path() . "/public/pics/$item->id/restaurant/", $imgname);
                // $pic->pic='/'."pics/$item->id/restaurant/".$imgname;
                $path=Storage::putFile("public/pics/$item->id/restaurant", $request->file('pic'));
                $pic->pic=substr($path,6);
            }
            $pic->rank=$request->rank;
            $pic->main_flg=$request->main_flg;
            $pic->restaurant_id=$item->id;

            $pic->save();
            return redirect(route('get_restaurant_info'));
        }


    }

    public function delete(Request $request){
        $pic=RestaurantPic::find($request->id);
        $pic->delete();
        return redirect(route('get_restaurant_info'));

    }
}
