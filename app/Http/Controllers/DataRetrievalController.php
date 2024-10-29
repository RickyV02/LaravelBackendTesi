<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corso;
use App\Models\Avvisi;
use App\Models\Lezione;
use App\Models\Assegnazione;
use App\Models\Appello;
use App\Models\Prenotazione;
use App\Models\TestoCompito;
use App\Models\CompitoProgettazione;
use App\Models\CompitoSQL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

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
        Log::info($request->all());
        $validatedData = $request->validate([
            'ordine' => 'required|numeric',
            'data' => 'required|date',
            'link' => 'required|array',
            'argomento' => 'required',
            'canale' => 'required|string',
            'corso_id' => 'required',
        ]);

        $formattedDate = Carbon::parse($validatedData['data'])->format('Y-m-d');

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

    public function nuovoCorso(Request $request)
    {
        $validatedData = $request->validate([
            'canale' => 'required|string|max:50',
            'anno' => 'required|date_format:Y',
        ]);

        Corso::create([
            'canale' => $validatedData['canale'],
            'anno' => $validatedData['anno']
        ]);

        return response()->json(['message' => 'Corso creato con successo!'], 201);
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
    public function inviaEsame(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fileSQL' => 'nullable|file|mimes:pdf',
            'fileERM' => 'nullable|file|mimes:pdf',
            'compitoId' => 'required|integer',
            'appelloId' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $testoCompito = TestoCompito::where('sql_id', $request->input('compitoId'))
            ->orWhere('progettazione_id', $request->input('compitoId'))
            ->first();

        if (!$testoCompito) {
            return response()->json(['error' => 'Compito non trovato.'], 404);
        }

        $appello = Appello::find($request->input('appelloId'));
        if ($appello) {
            $appello->update(['iniziato' => true]);
        }

        if ($request->hasFile('fileSQL')) {
            $fileContentSQL = file_get_contents($request->file('fileSQL')->getRealPath());
            $compitoSQL = CompitoSQL::find($testoCompito->sql_id);
            if ($compitoSQL) {
                $compitoSQL->update(['pdf' => $fileContentSQL]);
            }
        }
        if ($request->hasFile('fileERM')) {
            $fileContentERM = file_get_contents($request->file('fileERM')->getRealPath());
            $compitoProgettazione = CompitoProgettazione::find($testoCompito->progettazione_id);
            if ($compitoProgettazione) {
                $compitoProgettazione->update(['pdf' => $fileContentERM]);
            }
        }

        return response()->json(['message' => 'Esami inviati con successo.'], 200);
    }
    public function nuovoAppello(Request $request)
    {
        $validatedData = $request->validate([
            'data' => 'required|date',
            'corso_id' => 'required|exists:corso,id',
        ]);
        $validatedData['data'] = Carbon::parse($validatedData['data'])->format('Y-m-d H:i:s');
        $appello = Appello::create($validatedData);

        $compitoSQL = CompitoSQL::create(['voto' => null]);
        $compitoProgettazione = CompitoProgettazione::create(['voto' => null]);

        $testoCompito = TestoCompito::firstOrCreate([
            'sql_id' => $compitoSQL->id,
            'progettazione_id' => $compitoProgettazione->id,
        ]);

        $appello->update(['compito_id' => $testoCompito->id]);

        return response()->json([
            'success' => true,
            'message' => 'Appello aggiunto con successo',
            'testo_compito_id' => $testoCompito->id
        ]);
    }

    public function fetchAppelli($corsoId)
    {
        $appelli = Appello::where('corso_id', $corsoId)->orderBy('data', 'asc')->get();

        return response()->json($appelli);
    }

    public function fetchAllAppelli()
    {
        $appelli = Appello::with('corso:id,canale')
            ->orderBy('data', 'asc')
            ->get();

        return response()->json($appelli);
    }

    public function updateDateAppello(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'data' => 'required|date',
        ]);

        $appello = Appello::find($request->input('id'));

        $data = Carbon::parse($request->input('data'));

        $appello->data = $data->format('Y-m-d H:i:s');
        $appello->save();

        return response()->json(['message' => 'Data appello aggiornata con successo'], 200);
    }

    public function deleteAppello(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);
        $appello = Appello::find($request->input('id'));

        if ($appello) {
            if ($appello->compito_id) {
                $testoCompito = TestoCompito::find($appello->compito_id);
                if ($testoCompito) {
                    if ($testoCompito->sql_id) {
                        $compitoSql = CompitoSql::find($testoCompito->sql_id);
                        if ($compitoSql) {
                            $compitoSql->delete();
                        }
                    }

                    if ($testoCompito->progettazione_id) {
                        $compitoProgettazione = CompitoProgettazione::find($testoCompito->progettazione_id);
                        if ($compitoProgettazione) {
                            $compitoProgettazione->delete();
                        }
                    }

                    $testoCompito->delete();
                }
            }

            $appello->delete();
            return response()->json(['message' => 'Appello e compiti associati eliminati con successo'], 200);
        }

        return response()->json(['message' => 'Appello non trovato'], 404);
    }

    public function fetchPrenotazioni($studenteId)
    {
        $prenotazioni = Prenotazione::where('studente_id', $studenteId)
            ->with('appello')
            ->get();

        return response()->json($prenotazioni);
    }

    public function getPrenotati(Request $request)
    {
        $request->validate([
            'appello_id' => 'required|integer|exists:appello,id',
        ]);
        $appelloId = $request->input('appello_id');
        $prenotati = Prenotazione::where('appello_id', $appelloId)
            ->with('studente')
            ->get();
        return response()->json($prenotati, 200);
    }

    public function prenotaAppello(Request $request)
    {
        $request->validate([
            'studente_id' => 'required|exists:studente,id',
            'appello_id' => 'required|exists:appello,id',
        ]);

        $studenteId = $request->input('studente_id');
        $appelloId = $request->input('appello_id');

        $esistePrenotazione = Prenotazione::where('studente_id', $studenteId)
            ->where('appello_id', $appelloId)
            ->exists();

        if (!$esistePrenotazione) {
            $prenotazione = Prenotazione::create([
                'studente_id' => $studenteId,
                'appello_id' => $appelloId,
                'esito' => null,
            ]);

            return response()->json(['success' => 'Prenotazione effettuata.', 'prenotazione' => $prenotazione], 201);
        } else
            return response()->json(['error' => 'Prenotazione già effettuata.', 'prenotazione' => $esistePrenotazione], 201);
    }

    public function rimuoviPrenotazione(Request $request)
    {
        $studenteId = $request->input('studente_id');
        $appelloId = $request->input('appello_id');
        $prenotazione = Prenotazione::where('studente_id', $studenteId)
            ->where('appello_id', $appelloId)
            ->first();

        if ($prenotazione) {
            $prenotazione->delete();
            return response()->json(['message' => 'Prenotazione rimossa con successo.'], 200);
        }

        return response()->json(['message' => 'Prenotazione non trovata.'], 404);
    }

    public function downloadFile($appelloId, $type)
    {
        // Trova l'appello in base all'ID fornito
        $appello = Appello::find($appelloId);

        if (!$appello) {
            return response()->json(['error' => 'Appello non trovato.'], 404);
        }

        $fileContent = null;
        $fileName = '';

        // Determina quale tipo di file stai cercando di scaricare
        if ($type === 'SQL') {
            $compitoSQL = CompitoSQL::find($appello->compito_id);
            if ($compitoSQL) {
                $fileContent = $compitoSQL->pdf; // Contenuto binario del file
                $fileName = 'esame_sql.pdf'; // Nome del file per il download
            }
        } elseif ($type === 'ERM') {
            $compitoProgettazione = CompitoProgettazione::find($appello->compito_id);
            if ($compitoProgettazione) {
                $fileContent = $compitoProgettazione->pdf; // Contenuto binario del file
                $fileName = 'esame_erm.pdf'; // Nome del file per il download
            }
        }

        // Se il contenuto del file è impostato, gestisci il download
        if ($fileContent) {
            return response()->stream(function () use ($fileContent) {
                echo $fileContent; // Assicurati che fileContent sia binario e non venga convertito in stringa
            }, 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
            ]);
        }

        return response()->json(['error' => 'File non trovato.'], 404);
    }
}
