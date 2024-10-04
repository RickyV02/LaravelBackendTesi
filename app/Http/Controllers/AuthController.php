<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Professore;
use App\Models\Studente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 


class AuthController extends BaseController
{
    public function login(Request $request)
    {
        $credential = $request->only('email', 'password');
        $isProfessor = $request->input('is_professor');

        if ($isProfessor) {
            $user = Professore::where('email', $credential['email'])->first();
        } else {
            $user = Studente::where('email', $credential['email'])->first();
        }

        if ($user && Hash::check($credential['password'], $user->password)) {
            session()->put('user_type', $isProfessor ? 'professor' : 'student');
            session()->put('user_id', $user->id);
            session()->put('name', $user->nome);
            return response()->json(['message' => 'Login effettuato con successo'], 200); 
        }
        return response()->json(['message' => 'Credenziali non valide'], 401); 
    }

    public function signup(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|alpha',
            'cognome' => 'required|alpha',
            'email' => 'required|email|unique:studente,email',
            'password' => 'required|min:8',
            'matricola' => 'required|numeric|unique:studente,matricola',
        ]);

        
        Studente::create([
            'nome' => $validatedData['nome'],
            'cognome' => $validatedData['cognome'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'matricola' => $validatedData['matricola'],
        ]);
        return response()->json(['message' => 'Registrazione effettuata con successo'], 201); 
    }

    public function logout()
    {
        session()->flush();
        return response()->json(['message' => 'Disconnessione effettuata con successo'], 200); 
    }

    public function checkSession()
    {
        if (session()->has('user_id') && session()->has('user_type')) {
            return response()->json([
                'logged_in' => true,
                'user_type' => session('user_type'),
                'user_id' => session('user_id'),
                'name' => session('name')
            ], 200); 
        }

        return response()->json(['logged_in' => false], 200); 
    }
}
