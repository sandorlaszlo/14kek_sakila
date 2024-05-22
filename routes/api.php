<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FilmController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/actors', [ActorController::class, 'actors']);
Route::get('/actors/name/{firstname}', [ActorController::class, 'actorsByFirstname']);
Route::get('/actors/name/{firstname}/{lastname}', [ActorController::class, 'actorsByFullname']);
Route::get('/actors/name/firstnames/{firstname1}/{firstname2}', [ActorController::class, 'actorsByTwoFirstnames']);
Route::get('/actors/count', [ActorController::class, 'actorsCount']);
Route::get('/actors/count/all', [ActorController::class, 'actorsAllCountByFirstname']);
Route::get('/actors/count/name/{firstname}', [ActorController::class, 'actorsCountByFirstname']);

Route::get('countries/v4', [CountryController::class, 'countriesInV4']);

Route::get('/films/cost/{min}/{max}', [FilmController::class, 'filmsByCost']);
Route::get('films/actors', [FilmController::class, 'filmsWithActors']);


Route::get('/customers', [CustomerController::class, 'index']);
// Route::get('customers/{id}', [CustomerController::class,'show']);
Route::get('customers/{customer}', [CustomerController::class,'show']);
Route::post('/customers', [CustomerController::class,'store']);

Route::post('/actors', [ActorController::class,'store']);
Route::delete('/actors/{actor}', [ActorController::class,'destroy']);
Route::put('/actors/{actor}', [ActorController::class,'update']);
