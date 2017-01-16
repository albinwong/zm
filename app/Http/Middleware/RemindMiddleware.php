<?php

namespace App\Http\Middleware;

use Closure;

class RemindMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session('info')&&session('warning')&&session('alert')){
            return redirect('/');
        }
        return $next($request);
    }

    // //检测
    //     if(session('uid') && session('auth') == 2){
    //         return $next($request);
    //     }else{
    //         session(['redirect'=>$request->path()]);
    //         return redirect('/admin/login')->with('alert','用户不存在或权限不足');
    //     }


}
