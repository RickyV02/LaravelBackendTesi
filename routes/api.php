<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataRetrievalController;
use App\Http\Middleware\CheckUserSession;
use App\Http\Middleware\EnsureUserIsProfessor;
use App\Http\Middleware\EnsureStudentOwnsResource;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/signup', [AuthController::class, 'signup']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/check-session', [AuthController::class, 'checkSession']);
    
    Route::middleware(CheckUserSession::class)->group(function () {
        
        Route::get('/fetchCorsi', [DataRetrievalController::class, 'fetchCourses']);
        Route::get('/fetchLezioni', [DataRetrievalController::class, 'fetchLessons']);
        Route::get('/fetchAvvisi', [DataRetrievalController::class, 'fetchAvvisi']);
        Route::get('/fetchAllAppelli', [DataRetrievalController::class, 'fetchAllAppelli']);
        Route::get('/iscrizione/{studente_id}', [DataRetrievalController::class, 'checkIscrizione']);
        Route::get('/fetchAppelli/{corso_id}', [DataRetrievalController::class, 'fetchAppelli']);
        Route::get('/prenotazioni/{appello_id}', [DataRetrievalController::class, 'getPrenotazioniPerAppello']);
        Route::get('/fetchPrenotazioni/{studenteId}', [DataRetrievalController::class, 'fetchPrenotazioni']);
        Route::get('/download-file/{appelloId}/{type}', [DataRetrievalController::class, 'downloadFile']); 

        Route::middleware(EnsureStudentOwnsResource::class)->group(function (){
            Route::post('/iscrizioneCorso', [DataRetrievalController::class, 'iscriviStudente']);
            Route::post('/cancellazioneCorso', [DataRetrievalController::class, 'cancellaIscrizione']);
            Route::post('/caricaEsame', [DataRetrievalController::class, 'caricaEsame']); 
            Route::post('/rimuoviPrenotazione', [DataRetrievalController::class, 'rimuoviPrenotazione']);
            Route::post('/prenotaAppello', [DataRetrievalController::class, 'prenotaAppello']);
        });
        
        Route::middleware(EnsureUserIsProfessor::class)->group(function () {
            Route::post('/nuovaLezione', [DataRetrievalController::class, 'nuovaLezione']);
            Route::post('/nuovoAvviso', [DataRetrievalController::class, 'nuovoAvviso']);
            Route::post('/nuovoCorso', [DataRetrievalController::class, 'nuovoCorso']);
            Route::post('/nuovoAppello', [DataRetrievalController::class, 'nuovoAppello']);
            Route::post('/modificaAppello', [DataRetrievalController::class, 'updateDateAppello']);
            Route::post('/eliminaAppello', [DataRetrievalController::class, 'deleteAppello']);
            Route::post('/fermaEsame', [DataRetrievalController::class, 'fermaEsame']);
            Route::post('/uploadEsiti', [DataRetrievalController::class, 'uploadEsiti']);
            Route::post('/prenotati', [DataRetrievalController::class, 'getPrenotati']);
            Route::post('/downloadStudent', [DataRetrievalController::class, 'getFilesByStudente']);
            Route::post('/invia-Esame', [DataRetrievalController::class, 'inviaEsame']);
            Route::get('prenotazioni/terminate/{studenteId}', [DataRetrievalController::class, 'getRisultatiStudente']);
        });              
    });
});
