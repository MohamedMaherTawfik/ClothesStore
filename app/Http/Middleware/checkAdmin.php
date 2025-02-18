<?php

namespace App\Http\Middleware;

use App\http\controllers\auth\apiResponse;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkAdmin
{
    use apiResponse;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       if(auth()->check() && auth()->user()->role == 'admin'){
           return $next($request);
       }
       return $this->apiResponse(null,'Unauthorised Acess',401);
    }
}
