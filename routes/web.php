<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\MatchesController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanelController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/panel',[PanelController::class,'index'])-> middleware('auth');

// metoda do wstawienia graczy do rankingu
Route::get('/registration/autorizeGamers', [RegistrationController::class,'autorizeGamers'])-> middleware('auth');
// metoda do czyszczenia rejestracji graczy
Route::get('/registration/deleteAll', [RegistrationController::class,'deleteAll'])-> middleware('auth');

Route::get('/registration/list',[RegistrationController::class,'index_api']);
Route::get('/registration/add',[RegistrationController::class,'create']);
Route::post('/registration/save',[RegistrationController::class,'store_api']);
Route::get('/registration/edit/{id}',[RegistrationController::class,'edit'])-> middleware('auth');
Route::post('/registration/update/{id}',[RegistrationController::class,'update_api'])-> middleware('auth');
Route::get('/registration/show/{id}',[RegistrationController::class,'show'])-> middleware('auth');
Route::post('/registration/delete/{id}', [RegistrationController::class,'destroy_api'])-> middleware('auth');

// metoda do czyszczenia rankingu
Route::get('/ranking/deleteAll', [RankingController::class,'deleteAll'])-> middleware('auth');
// metoda do wstawienia finalnego wyniku turnieju
Route::get('/ranking/sumResult', [RankingController::class,'sumResult'])-> middleware('auth');


Route::get('/ranking/list',[RankingController::class,'index_api']);
Route::get('/ranking/add',[RankingController::class,'create'])-> middleware('auth');
Route::post('/ranking/save',[RankingController::class,'store_api'])-> middleware('auth');
Route::get('/ranking/edit/{id}',[RankingController::class,'edit'])-> middleware('auth');
Route::post('/ranking/update/{id}',[RankingController::class,'update_api'])-> middleware('auth');
Route::get('/ranking/show/{id}',[RankingController::class,'show'])-> middleware('auth');
Route::post('/ranking/delete/{id}', [RankingController::class,'destroy_api'])-> middleware('auth');

// metoda do czyszczenia historii meczy
Route::get('/history/deleteAll', [HistoryController::class,'deleteAll'])-> middleware('auth');

Route::get('/history/list',[HistoryController::class,'index_api']);
Route::get('/history/add',[HistoryController::class,'create'])-> middleware('auth');
Route::post('/history/save',[HistoryController::class,'store_api'])-> middleware('auth');
Route::get('/history/edit/{id}',[HistoryController::class,'edit'])-> middleware('auth');
Route::post('/history/update/{id}',[HistoryController::class,'update_api'])-> middleware('auth');
Route::get('/history/show/{id}',[HistoryController::class,'show'])-> middleware('auth');
Route::post('/history/delete/{id}', [HistoryController::class,'destroy_api'])-> middleware('auth');

// metoda do czyszczenia aktualnych meczy
Route::get('/matches/deleteAll', [MatchesController::class,'deleteAll'])-> middleware('auth');
// metoda do losowania meczy
Route::get('/matches/matchesMaker', [MatchesController::class,'matchesMaker'])-> middleware('auth');
// metoda przesłanie meczy do tabeli historia
Route::get('/matches/setToHistory', [MatchesController::class,'setToHistory'])-> middleware('auth');

Route::get('/matches/list',[MatchesController::class,'index_api']);
Route::get('/matches/add',[MatchesController::class,'create'])-> middleware('auth');
Route::post('/matches/save',[MatchesController::class,'store_api'])-> middleware('auth');
Route::get('/matches/edit/{id}',[MatchesController::class,'edit'])-> middleware('auth');
Route::post('/matches/update/{id}',[MatchesController::class,'update_api'])-> middleware('auth');
Route::get('/matches/show/{id}',[MatchesController::class,'show'])-> middleware('auth');
Route::post('/matches/delete/{id}', [MatchesController::class,'destroy_api'])-> middleware('auth');

Route::get('/login', [HomeController::class,'authStatusChanges']);
Route::get('/logout', [HomeController::class,'authStatusChanges']);
Route::get('/register', [HomeController::class,'authStatusChanges'])-> middleware('auth');

require __DIR__.'/auth.php';
