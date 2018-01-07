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
            return response()->json(ApiException::error(ApiException::PLEASE_LOGIN));
        }
        return $next($request);
    }
}
