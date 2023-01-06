<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PodstawowyKontroler;
use Illuminate\Support\Facades\Route;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/', [PodstawowyKontroler::class,'zwrocStroneDomowa']);
Route::get('/ksiazki', [PodstawowyKontroler::class,'zwrocListeKsiazek']);
Route::get('/kategorie', [PodstawowyKontroler::class,'zwrocListeKategorii']);
Route::get('/wydawnictwa', [PodstawowyKontroler::class,'zwrocListeWydawnictw']);

Route::get('/dodaj_ksiazke', [PodstawowyKontroler::class, 'zwrocDodajKsiazke' ]) -> middleware('auth');
Route::post('/dodaj_ksiazke', [PodstawowyKontroler::class,'dodajKsiazke']) -> middleware('auth');
Route::get('/dodaj_kategorie', [PodstawowyKontroler::class, 'zwrocDodajKategorie' ]) -> middleware('auth');
Route::post('/dodaj_kategorie', [PodstawowyKontroler::class,'dodajKategorie']) -> middleware('auth');
Route::get('/dodaj_wydawnictwo', [PodstawowyKontroler::class, 'zwrocDodajWydawnictwo' ]) -> middleware('auth');
Route::post('/dodaj_wydawnictwo', [PodstawowyKontroler::class,'dodajWydawnictwo']) -> middleware('auth');

Route::get('/usun_ksiazke', [PodstawowyKontroler::class, 'zwrocUsunKsiazke' ])->name('listaKsiazek') -> middleware('auth');
Route::delete('/usun_ksiazke/{idks}', [PodstawowyKontroler::class,'usunKsiazke'])->name('ksiazki.usun')-> middleware('auth');

Route::get('/usun_kategorie', [PodstawowyKontroler::class, 'zwrocUsunKategorie' ])->name('listaKategorii')-> middleware('auth');
Route::delete('/user_kategorie/{id}', [PodstawowyKontroler::class, 'usunKategorie'])->name('kategorie.usun')-> middleware('auth');

Route::get('/usun_wydawnictwo', [PodstawowyKontroler::class, 'zwrocUsunWydawnictwo' ])->name('listaWydawnictw') -> middleware('auth');
Route::delete('/usun_wydawnictwo/{idwyd}', [PodstawowyKontroler::class, 'usunWydawnictwo'])->name('wydawnictwa.usun')-> middleware('auth');



    Route::get('/loguj', [PodstawowyKontroler::class,'zmienStanUwierzytelnienia']);
Route::get('/wyloguj', [PodstawowyKontroler::class,'zmienStanUwierzytelnienia']);

require __DIR__.'/auth.php';
