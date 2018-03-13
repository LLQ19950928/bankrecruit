<?php

namespace App\Http\Middleware;

use App\Handlers\ApiException;
use Closure;

class ResumeMiddleware
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
        if (!$request->session()->get('userId')) {
            return redirect('http://bank.recruit.cn/frontend/login/display');
        }

        return $next($request);
    }
}
