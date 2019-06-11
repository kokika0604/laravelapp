<?php

namespace App\Http\Controllers;
// request 就是获取输入表单的值 例如 $name = $requst->input ('name'); 运用 request 的时候 要
 // 然后 controller 方法里面还要在扣号里面写入 Requst $request
use Illuminate\Http\Request;
// 调用数据库
use App\MtbPrefecture;
use App\Restaurant;
use App\Category;
use App\RestaurantCategory;
use App\RestaurantPic;
use App\RestaurantTag;
use App\Favourite;
use App\Tag;


// 密码加密方式hash
use Illuminate\Support\Facades\Hash;
// 验证
use Validator;
use Illuminate\Support\Facades\Auth;
// 建立基本函数
class HomepageController extends Controller
{
    public function index(Request $request) {

        $query = Restaurant::query();

        if($request->keyword) {
            $query->orWhere('name', 'LIKE', "%". $request->keyword . "%")
                  ->orWhere('short_description', 'LIKE', "%". $request->keyword . "%")
                  ->orWhere('long_description', 'LIKE', "%". $request->keyword . "%");

        }

        if($request->category_ids && is_array($request->category_ids) && count($request->category_ids) > 0) {


            //$restaurant_categories = RestaurantCategory::whereIn("category_id", $request->category_ids)->get();
            // $restaurant_ids = array();
            // foreach($restaurant_categories as $restaurant_category) {
            //     $restaurant_ids[] = $restaurant_category->restaurant_id;
            // }
            //
            // $query->whereIn("id", $restaurant_ids);

            $query->whereHas(
                'categories',
                function ($query) use ($request) {
                    $query->whereIn('categories.id', $request->category_ids);
                }
            );
        }



        $restaurants=$query->paginate(10);

        $categories=Category::get();
        $tags=Tag::get();
        return view('homepage',['restaurants'=>$restaurants,'categories'=>$categories,'tags'=>$tags]);
    }
}
