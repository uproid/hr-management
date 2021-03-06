<?php

namespace App\Http\Middleware\ToombaApi;

use Closure;
use Illuminate\Http\Request;

class ApiToken
{
    /**
     * Handle an incoming request. Check the API TOKEN for change datas is valid or no. API_TOKEN should be in the '.env' file;
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->api_token != env('API_TOKEN')) {
            $json = [
                'data' => null,
                'timestamp' => 0,
                'message' => ['Unauthorized or API Token is not valid!'],
                'code' => 401
            ];
            return response()->json($json, 401);
        }
        return $next($request);
    }
}
