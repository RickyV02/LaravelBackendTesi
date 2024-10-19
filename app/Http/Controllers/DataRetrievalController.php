<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corso;
use App\Models\Avvisi;
use App\Models\Lezione;
use App\Models\Assegnazione; 
use Illuminate\Routing\Controller as BaseController;

class DataRetrievalController extends BaseController
{
    public function fetchCourses()
    {
        $corsi = Corso::all();
        if ($corsi->isEmpty()) {
            return response()->json(['message' => 'Nessun corso disponibile'], 404);
        }
        return response()->json($corsi, 200);
    }

    public function nuovaLezione(Request $request)
{
    $validatedData = $request->validate([
        'ordine' => 'required|numeric',
        'data' => 'required|date',
        'link' => 'required|array', 
        'argomento' => 'required',
        'canale' => 'required|string',
        'corso_id' => 'required', 
    ]);

    $date = new \DateTime($validatedData['data']);
    $formattedDate = $date->format('Y-m-d');

    Lezione::create([
        'ordine' => $validatedData['ordine'],
        'data' => $formattedDate,
        'link' => json_encode($validatedData['link']),
        'argomento' => $validatedData['argomento'],
        'canale' => $validatedData['canale'],   
        'corso_id' => $validatedData['corso_id'],
    ]);
    
    return response()->json(['message' => 'Lezione creata con successo!'], 201);
}

    

    public function nuovoAvviso(Request $request)
    {
        $validatedData = $request->validate([
            'testoAvviso' => 'required|string',
            'corso' => 'required'
        ]);

        Avvisi::create([
            'testo' => $validatedData['testoAvviso'],
            'data_pubblicazione' => now()->toDateString(),
            'corso_id' => $validatedData['corso']
        ]);

        return response()->json(['message' => 'Avviso creato con successo!'], 201);
    }

    public function fetchLessons()
    {
        $lezioni = Lezione::with('corso')->orderBy('ordine', 'asc')->get();
        if ($lezioni->isEmpty()) {
            return response()->json(['message' => 'Nessuna lezione disponibile'], 404);
        }
        return response()->json($lezioni, 200);
    }

    public function fetchAvvisi()
    {
        $avvisi = Avvisi::with('corso')->orderBy('data_pubblicazione', 'asc')->get();
        if ($avvisi->isEmpty()) {
            return response()->json(['message' => 'Nessun avviso disponibile'], 404);
        }
        return response()->json($avvisi, 200);
    }

    public function iscriviStudente(Request $request)
    {
        $validatedData = $request->validate([
            'studente_id' => 'required|exists:studente,id',
            'corso_id' => 'required|exists:corso,id',
        ]);

        Assegnazione::create([
            'studente_id' => $validatedData['studente_id'],
            'corso_id' => $validatedData['corso_id'],
        ]);

        return response()->json(['message' => 'Iscrizione al corso avvenuta con successo!'], 201);
    }

    public function cancellaIscrizione(Request $request)
    {
        $validatedData = $request->validate([
            'studente_id' => 'required|exists:studente,id',
            'corso_id' => 'required|exists:corso,id',
        ]);

        $assegnazione = Assegnazione::where('studente_id', $validatedData['studente_id'])
            ->where('corso_id', $validatedData['corso_id'])
            ->first();

        if ($assegnazione) {
            $assegnazione->delete();
            return response()->json(['message' => 'Iscrizione cancellata con successo!'], 200);
        } else {
            return response()->json(['message' => 'Iscrizione non trovata'], 404);
        }
    }

    public function checkIscrizione($studente_id)
    {
        $assegnazione = Assegnazione::where('studente_id', $studente_id)->first();
    
        if ($assegnazione) {
            $corso = Corso::find($assegnazione->corso_id);
    
            return response()->json([
                'is_iscritto' => true,
                'corso' => $corso
            ]);
        }
    
        return response()->json(['is_iscritto' => false]);
    }
}
