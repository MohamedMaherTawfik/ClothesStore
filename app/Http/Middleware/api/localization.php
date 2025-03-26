<?php

namespace App\Http\Middleware\api;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->hasHeader('Accept-Language')) {
            $locale = explode(',', $request->header('Accept-Language'))[0];
            App::setLocale($locale);
        }
        return $next($request);
    }
}
