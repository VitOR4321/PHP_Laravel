<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PodstawowyKontroler;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PodstawowyKontroler::class,'zwrocStroneDomowa']);
Route::get('/ksiazki', [PodstawowyKontroler::class,'zwrocListeKsiazek']);
Route::get('/kategorie', [PodstawowyKontroler::class,'zwrocListeKategorii']);
Route::get('/wydawnictwa', [PodstawowyKontroler::class,'zwrocListeWydawnictw']);
Route::get('/dodaj_ksiazke', [PodstawowyKontroler::class,'zwrocDodajKsiazke']); 
Route::post('/dodaj_ksiazke', [PodstawowyKontroler::class,'dodajKsiazke']);
Route::get('/dodaj_kategorie', [PodstawowyKontroler::class,'zwrocDodajKategorie']); 
Route::post('/dodaj_kategorie', [PodstawowyKontroler::class,'dodajKategorie']);
Route::get('/dodaj_wydawnictwo', [PodstawowyKontroler::class,'zwrocDodajWydawnictwo']); 
Route::post('/dodaj_wydawnictwo', [PodstawowyKontroler::class,'dodajWydawnictwo']);
