<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corso;
use App\Models\Avvisi;
use App\Models\Lezione;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class DataRetrievalController extends BaseController
{
    public function fetchCourses(){
        $corsi = Corso::all();
        if ($corsi->isEmpty()) {
            return response()->json(['message' => 'Nessun corso disponibile'], 404);
        }
        return response()->json($corsi, 200);
    }

    public function nuovaLezione(Request $request)
    {
        $validatedData = $request->validate([
            'numeroLezione' => 'required|numeric',
            'data' => 'required|date',
            'linkMateriale' => 'required|url',
            'argomento' => 'required',
            'corso' => 'required',
        ]);
        $date = new \DateTime($validatedData['data']);
        $formattedDate = $date->format('Y-m-d');

        Lezione::create([
            'ordine' => $validatedData['numeroLezione'],
            'data' => $formattedDate,
            'link' => $validatedData['linkMateriale'],
            'argomento' => $validatedData['argomento'],
            'corso_id' => $validatedData['corso']
        ]);

        return response()->json(['message' => 'Lezione creata con successo!'], 201);
    }

    public function nuovoAvviso(Request $request){
        $validatedData = $request->validate([
            'testoAvviso' => 'required|string',
            'corso' => 'required'
        ]);

        Avvisi::create([
            'testo' => $validatedData['testoAvviso'],
            'data_pubblicazione' => now()->toDateString(), // Inserisce la data odierna
            'corso_id' => $validatedData['corso']
        ]);
    
        return response()->json(['message' => 'Avviso creato con successo!'], 201);
    }

    public function fetchLessons(){
        $lezioni = Lezione::orderBy('ordine', 'asc')->get();
        if ($lezioni->isEmpty()) {
            return response()->json(['message' => 'Nessun corso disponibile'], 404);
        }
        return response()->json($lezioni, 200);
    }

    public function fetchAvvisi(){
        $avvisi = Avvisi::orderBy('data_pubblicazione', 'asc')->get();
        if ($avvisi->isEmpty()) {
            return response()->json(['message' => 'Nessun corso disponibile'], 404);
        }
        return response()->json($avvisi, 200);
    }

}
