<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserSession
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('user_id') && session()->has('user_type')) {
            return $next($request);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}