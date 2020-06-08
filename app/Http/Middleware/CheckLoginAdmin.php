<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginAdmin
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
        if(get_data_user('admins')){
            return $next($request);//đúng thì tiếp tục thực hiện k thì về trang chủ tránh trường hợp biết đươc đường dẫn trang login
        }
        return redirect()->to('/');
        return $next($request);
    }
}
