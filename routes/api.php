<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestApiRegistrationController;
use App\Http\Controllers\RestApiRankingController;
use App\Http\Controllers\RestApiMatchesController;
use App\Http\Controllers\RestApiHistoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// naprawić nazwy metod w routach
Route::get('/registration/list',[RestApiRegistrationController::class,'ListRegistrationModules']);
Route::post('/registration/new',[RestApiRegistrationController::class,'NewRegistrationModule']);
Route::put('/registration/update/{id}',[RestApiRegistrationController::class,'UpdateRegistrationModule']);
Route::delete('/registration/delete/{id}',[RestApiRegistrationController::class,'DeleteRegistrationModule']);
Route::get('/registration/find/{id}',[RestApiRegistrationController::class,'FindRegistrationModule']);

Route::get('/ranking/list',[RestApiRankingController::class,'ListRankingModules']);
Route::post('/ranking/new',[RestApiRankingController::class,'NewRankingModule']);
Route::put('/ranking/update/{id}',[RestApiRankingController::class,'UpdateRankingModule']);
Route::delete('/ranking/delete/{id}',[RestApiRankingController::class,'DeleteRankingModule']);
Route::get('/ranking/find/{id}',[RestApiRankingController::class,'FindRankingModule']);

Route::get('/matches/list',[RestApiMatchesController::class,'ListMatchesModules']);
Route::post('/matches/new',[RestApiMatchesController::class,'NewMatchesModule']);
Route::put('/matches/update/{id}',[RestApiMatchesController::class,'UpdateMatchesModule']);
Route::delete('/matches/delete/{id}',[RestApiMatchesController::class,'DeleteMatchesModule']);
Route::get('/matches/find/{id}',[RestApiMatchesController::class,'FindMatchesModule']);

Route::get('/history/list',[RestApiHistoryController::class,'ListHistoryModules']);
Route::post('/history/new',[RestApiHistoryController::class,'NewHistoryModule']);
Route::put('/history/update/{id}',[RestApiHistoryController::class,'UpdateHistoryModule']);
Route::delete('/history/delete/{id}',[RestApiHistoryController::class,'DeleteHistoryModule']);
Route::get('/history/find/{id}',[RestApiHistoryController::class,'FindHistoryModule']);