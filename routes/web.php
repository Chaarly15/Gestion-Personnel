<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\FichePosteController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\MaitreDeStageController;
use App\Http\Controllers\RegistrePresenceController;
use App\Http\Controllers\DemandeCongeController;

Route::resource('agents', AgentController::class);
Route::resource('fiche_postes', FichePosteController::class);
Route::resource('stagiaires', StagiaireController::class);
Route::resource('maitre_de_stages', MaitreDeStageController::class);
Route::resource('registre_presences', RegistrePresenceController::class);
Route::resource('demandes_conges', DemandeCongeController::class);


Route::get('/', function () {
    return view('welcome');
});
