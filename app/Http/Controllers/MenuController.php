<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Menu;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index(){
        $item=Auth::guard("restaurants")->user();
        return view('restaurant.menu',['item'=>$item]);
    }

    public function add(Request $request){
        $item=Auth::guard("restaurants")->user();
        if ($request->isMethod('get')){
            $action='add';
            return view('restaurant.menu',['item'=>$item,'action'=>$action]);
        } else{
            $existed_name=$existed_name_tmp=null;
            if (isset($item->menus)){
                foreach($item->menus as $menu){
                    $existed_name_tmp=$existed_name_tmp.",".$menu->name;
                }
                $existed_name=substr($existed_name_tmp,1);
            }
            $validation_rules=[
                'pic'=>'image',
                'name'=>"required|not_in:$existed_name",
                'price'=>'required|integer|min:0',
            ];
            $validation_messages=[
                'name.required'=>'料理名を入力してください。',
                'name.not_in'=>'料理がすでに存在しています。',
                'price.required'=>'価格を入力してください。',
                'price.integer'=>'正しい価格を入力してください。',
                'price.min'=>'正しい価格を入力してください。',
                'pic.image'=>'画像ファイルではありません。',

            ];
            $validator=Validator::make($request->all(),$validation_rules,$validation_messages);
            if($validator->fails()){
              return redirect(route('get_restaurant_menu_add'))->withErrors($validator)->withInput();
            }
            $menu=new Menu;
            $menu->pic=null;
            if (isset($request->pic)){
                // $imgname = substr(md5(mt_rand()), 0, 7).".".$request->file('pic')->getClientOriginalExtension();
                // $request->file('pic')->move(base_path() . "/public/pics/$item->id/menu/", $imgname);
                // $menu->pic='/'."pics/$item->id/menu/".$imgname;
                $path=Storage::putFile("public/pics/$item->id/menu", $request->file('pic'));
                $menu->pic=substr($path,6);
            }
            $menu->name=$request->name;
            $menu->price=$request->price;
            $menu->tax_excluded_flg=isset($request->tax_included)?'0':'1';
            $menu->description=$request->description;
            $menu->restaurant_id=$item->id;

            $menu->save();
            return redirect(route('get_restaurant_menu'));
          }
        }

    public function edit(Request $request){
        $item=Auth::guard("restaurants")->user();
        if ($request->isMethod('get')){
            $action='edit';
            return view('restaurant.menu',['item'=>$item,'action'=>$action,'request'=>$request]);
        } else {
            $existed_name=$existed_name_tmp=null;
                foreach($item->menus as $menu){
                    if($menu->name!==$request->name){
                    $existed_name_tmp=$existed_name_tmp.",".$menu->name;
                }
                $existed_name=substr($existed_name_tmp,1);

            $validation_rules=[
                'pic'=>'image',
                'name'=>"required|not_in:$existed_name",
                'price'=>'required|integer|min:0',
            ];
            $validation_messages=[
                'name.required'=>'料理名を入力してください。',
                'name.not_in'=>'料理がすでに存在しています。',
                'price.required'=>'価格を入力してください。',
                'price.integer'=>'正しい価格を入力してください。',
                'price.min'=>'正しい価格を入力してください。',
                'pic.image'=>'画像ファイルではありません。'
            ];
            $validator=Validator::make($request->all(),$validation_rules,$validation_messages);
            if($validator->fails()){
              return redirect(route('get_restaurant_menu_edit',['id'=>$request->id]))->withErrors($validator)->withInput();
            }

            $menu=Menu::find($request->id);
            if (isset($request->pic)){
                // $imgname = substr(md5(mt_rand()), 0, 7).".".$request->file('pic')->getClientOriginalExtension();
                // $request->file('pic')->move(base_path() . "/public/pics/$item->id/menu/", $imgname);
                // $menu->pic='/'."pics/$item->id/menu/".$imgname;
                $path=Storage::putFile("public/pics/$item->id/menu", $request->file('pic'));
                $menu->pic=substr($path,6);
            }
            $menu->name=$request->name;
            $menu->price=$request->price;
            $menu->tax_excluded_flg=$request->tax_excluded_flg;
            $menu->description=$request->description;


            $menu->save();
            return redirect(route('get_restaurant_menu'));
            }
        }
    }

    public function delete(Request $request){
        $menu=Menu::find($request->id);
        $menu->delete();
        return redirect(route('get_restaurant_menu'));

    }
}
