<?php

namespace App\Http\Middleware;

use Closure;

class CrossHttp
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
        $response = $next($request);
        $response->header('Access-Control-Allow-Origin', 'http://localhost:9528');
        $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Cookie, Accept,x-custom,Origin, X-Requested-With, Content-Type, x-token');
        $response->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, OPTIONS');
//         $response->header('Access-Control-Allow-Credentials', 'true');
        return $request;
    }
}
