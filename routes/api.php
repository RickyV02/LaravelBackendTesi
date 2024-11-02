<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataRetrievalController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/signup', [AuthController::class, 'signup']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/check-session', [AuthController::class, 'checkSession']);
});

Route::get('/fetchCorsi', [DataRetrievalController::class, 'fetchCourses']);
Route::get('/fetchLezioni', [DataRetrievalController::class, 'fetchLessons']);
Route::get('/fetchAvvisi', [DataRetrievalController::class, 'fetchAvvisi']);
Route::post('/nuovaLezione', [DataRetrievalController::class, 'nuovaLezione']);
Route::post('/nuovoAvviso', [DataRetrievalController::class, 'nuovoAvviso']);
Route::post('/nuovoCorso', [DataRetrievalController::class, 'nuovoCorso']);
Route::post('/iscrizioneCorso', [DataRetrievalController::class, 'iscriviStudente']);
Route::post('/cancellazioneCorso', [DataRetrievalController::class, 'cancellaIscrizione']);
Route::get('/iscrizione/{studente_id}', [DataRetrievalController::class, 'checkIscrizione']);
Route::get('/fetchAppelli/{corso_id}', [DataRetrievalController::class, 'fetchAppelli']);
Route::get('/fetchPrenotazioni/{studenteId}', [DataRetrievalController::class, 'fetchPrenotazioni']);
Route::post('/nuovoAppello', [DataRetrievalController::class, 'nuovoAppello']);
Route::post('/rimuoviPrenotazione', [DataRetrievalController::class, 'rimuoviPrenotazione']);
Route::post('/prenotaAppello', [DataRetrievalController::class, 'prenotaAppello']);
Route::get('/fetchAllAppelli', [DataRetrievalController::class, 'fetchAllAppelli']);
Route::post('/modificaAppello', [DataRetrievalController::class, 'updateDateAppello']);
Route::post('/eliminaAppello', [DataRetrievalController::class, 'deleteAppello']);
Route::post('/prenotati', [DataRetrievalController::class, 'getPrenotati']);
Route::post('/invia-Esame', [DataRetrievalController::class, 'inviaEsame']);
Route::get('/download-file/{appelloId}/{type}', [DataRetrievalController::class, 'downloadFile']);
Route::post('/fermaEsame', [DataRetrievalController::class, 'fermaEsame']);
Route::post('/caricaEsame', [DataRetrievalController::class, 'caricaEsame']);
Route::get('/prenotazioni/{appello_id}', [DataRetrievalController::class, 'getPrenotazioniPerAppello']);
Route::post('/downloadStudent', [DataRetrievalController::class, 'getFilesByStudente']);
Route::post('/uploadEsiti', [DataRetrievalController::class, 'uploadEsiti']);
Route::get('prenotazioni/terminate/{studenteId}', [DataRetrievalController::class, 'getRisultatiStudente']);
