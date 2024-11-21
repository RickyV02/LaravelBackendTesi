<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureStudentOwnsResource
{
    public function handle(Request $request, Closure $next)
    {
        
        if (session('user_type') !== 'student') {
            return response()->json(['error' => 'Accesso non consentito'], 403);
        }
        
        $studentId = session('user_id');

        if ($studentId != $request->input('studente_id')) {
            return response()->json(['error' => 'Non puoi accedere a risorse di altri studenti'], 403);
        }

        return $next($request);
    }
}