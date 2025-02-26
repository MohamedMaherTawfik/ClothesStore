<?php

namespace App\Http\Middleware;

use App\Http\Controllers\admin\apiResponse;
use App\Models\blogs;
use App\Models\Cart;
use App\Models\orders;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckBelongsTo
{
    use apiResponse;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(blogs::where('user_id', Auth::user()->id)->first()){
                return $next($request);
            }
            else if(blogs::where('user_id', Auth::user()->id)->first() == 0){
                return $next($request);
            }
        }

        return $this->apiResponse(null,'UnAuthorized Acess',401);
    }
}
