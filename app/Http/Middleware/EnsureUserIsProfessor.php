<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsProfessor
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->get('user_type') === 'professor') {
            return $next($request);
        }

        return response()->json(['error' => 'Accesso riservato ai professori'], 403);
    }
}