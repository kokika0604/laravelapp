<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index(Request $request){

        $item=Auth::guard("restaurants")->user();
        $ratings=Review::where('restaurant_id',$item->id)->where('deleted_at',null)->get();
        $avg_rating=$ratings->avg('rating');
        $count_ratings=$ratings->count();
        $count_reviews=Review::where('restaurant_id',$item->id)->where('deleted_at',null)->whereNotNull('review')->get()->count();

        $reviews=Review::where('restaurant_id',$item->id)->where('deleted_at',null)->whereNotNull('review')
                        ->orderBy('created_at','desc')->paginate(3);
        if ($request->order=='highRating'){
            $reviews=Review::where('restaurant_id',$item->id)->where('deleted_at',null)->whereNotNull('review')->
                            orderBy('rating','desc')->orderBy('created_at','desc')->paginate(3);
        }
        if ($request->order=='lowRating'){
            $reviews=Review::where('restaurant_id',$item->id)->where('deleted_at',null)->whereNotNull('review')->
                            orderBy('rating','asc')->orderBy('created_at','desc')->paginate(3);
        }



        return view('restaurant.review',['item'=>$item,'avg_rating'=>$avg_rating,'count_ratings'=>$count_ratings,
                                        'reviews'=>$reviews,'count_reviews'=>$count_reviews,'order'=>$request->order]);


    }
}
