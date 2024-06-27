<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;


class Authenticate extends Middleware
{
    protected $user_route = 'user.login';
    protected $owner_route = 'owner.login';

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        //認証されていない場合はリダイレクトする
        if (! $request->expectsJson()) {
            // return route('login');
            if(Route::is('owner.*')){
                return route($this->owner_route);
            }
            if(Route::is('user.*')){ //合っているか確認
                return route($this->user_route);
            }
        }
    }
}
