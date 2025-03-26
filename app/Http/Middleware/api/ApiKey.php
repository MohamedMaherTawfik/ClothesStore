<?php

namespace App\Http\Middleware\api;

use App\http\controllers\api\auth\apiResponse;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKey
{
    use apiResponse;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apikey= config('app.api_key');
        if($request->header('api-key') != $apikey){
            return $this->apiResponse(null,'Invalid Api Key',401);
        }
        return $next($request);
    }
}
