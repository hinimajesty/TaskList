<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ValidateAccessTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $privateKey = env('PRIVATE_ACCESS_KEY'); 
        $publicKey = request('access_token');

        if ( Hash::check( $publicKey , $privateKey)) 
        {   
            return $next($request);
        } 

        return response()->json([
            'status' => 401, 
            'data' => [], 
            'message' => 'Failed auth'
        ],401);
    }
}
