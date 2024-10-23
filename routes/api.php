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
