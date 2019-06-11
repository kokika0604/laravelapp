<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {

        $path=$request->path();

        if (! $request->expectsJson()) {
            if($path=='user/mypage'){
                return route('get_user_login');
            }elseif($path=='restaurant/mypage'){
                return route('get_restaurant_login');
            }
        }
    }
}
