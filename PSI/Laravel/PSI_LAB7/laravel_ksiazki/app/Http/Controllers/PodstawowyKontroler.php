<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PodstawowyKontroler extends Controller
{
 public function zwrocStroneDomowa()
 {
 return view('domowa');
 }

 public function zwrocListeKsiazek() 
{ 
  $ksiazkiZBazy = DB::table('ksiazka')->leftJoin('kategoria', 
     'ksiazka.idkat', '=', 'kategoria.id') -> get(); 
  return   view('lista_ksiazek', ['ksiazka' => $ksiazkiZBazy,]); 
}
 public function zwrocListeKategorii() 
{ 
  //$kategorieZBazy = DB::table('kategoria')->leftJoin('kategoria','ksiazka.idkat', '=', 'kategoria.id') -> get(); 
  $kategorieZBazy = DB::table('kategoria')->get();
  return  view('lista_kategorii', ['ksiazka' => $kategorieZBazy,]); 
}
 public function zwrocListeWydawnictw() 
{ 
  $wydawnictwaZBazy = DB::table('wydawnictwo')->get();
  return  view('lista_wydawnictw', ['wydawnictwa' => $wydawnictwaZBazy,]); 
}
public function zwrocDodajKsiazke() 
{ 
  $kategorieZBazy = DB::table('kategoria')-> get(); 
  $wydawnictwaZBazy = DB::table('wydawnictwo')-> get(); 
  return   view('dodaj_ksiazke', ['kategorie' => $kategorieZBazy,'wydawnictwa' => $wydawnictwaZBazy,]);
  //return   view('dodaj_ksiazke', ['wydawnictwa' => $wydawnictwaZBazy,]);
}

public function zwrocDodajKategorie() 
{ 
  $kategorieZBazy = DB::table('kategoria')-> get(); 
  return  view('dodaj_kategorie', ['kategoria' => $kategorieZBazy,]); 
} 

public function zwrocDodajWydawnictwo() 
{ 
  $wydawnictwaZBazy = DB::table('wydawnictwo')-> get(); 
  return   view('dodaj_wydawnictwo', ['wydawnictwo' => $wydawnictwaZBazy,]); 
} 
 
public function dodajKsiazke(Request $request) 
{ 
  $tytulZFormularza = $request->tytul; 
  $idKategoriiZFormularza = $request->idkat; 
  DB::table('ksiazka')->insert([ 
    'tytul' => $tytulZFormularza, 
    'idkat' => intval($idKategoriiZFormularza), 
    'idwyd' => intval(0), 
  ]); 
  return  redirect('/ksiazki'); 
}

public function dodajKategorie(Request $request) 
{ 
  $opisZFormularza = $request  ->opis; 
  DB::table('kategoria')->insert([ 
    'opis' => $opisZFormularza, 
  ]); 
  return redirect('/kategorie'); 
}

public function dodajWydawnictwo(Request $request) 
{ 
  $nazwaNowegoWydawnictwa = $request  ->nazwa; 
  $miastoNowegoWydawnictwa = $request  ->miasto; 
  $panstwoNowegoWydawnictwa = $request  ->panstwo; 
  $adresNowegoWydawnictwa = $miastoNowegoWydawnictwa.", ".$panstwoNowegoWydawnictwa;
  DB::table('wydawnictwo')->insert([ 
    'nazwa' => $nazwaNowegoWydawnictwa,
    'adres' => $adresNowegoWydawnictwa,
  ]); 
  return  redirect('/wydawnictwa'); 
}

public function zmienStanUwierzytelnienia()
{
 if(auth()->check()){
 $user = auth()->user();
 Auth::logout();
 return view('wylogowano');
 }
 else{
 return redirect('/register');
 }
}

public function zwrocUsunKsiazke() 
{ 
  $ksiazkiZBazy = DB::table('ksiazka') -> get(); 
return   view('usun_ksiazke', ['ksiazka' => $ksiazkiZBazy,]); 
}

public function usunKsiazke($id) 
{
  DB::delete('DELETE FROM ksiazka WHERE id = ?', [$id]);
   echo ("Książka została poprawnie usunięta!");
   return redirect('/ksiazki');
}

public function zwrocUsunKategorie() 
{ 
  $kategorieZBazy = DB::table('kategoria')-> get(); 
  return view('usun_kategorie', ['kategoria' => $kategorieZBazy,]); 
}

public function usunKategorie($id) 
{
  DB::delete('DELETE FROM ksiazka WHERE idkat = ?', [$id]);
  DB::delete('DELETE FROM kategoria WHERE id = ?', [$id]);
   echo ("Kategoria została poprawnie usunięte!");
   return redirect('/kategorie');
}

public function zwrocUsunWydawnictwo() 
{ 
  $wydawnictwaZBazy = DB::table('wydawnictwo')-> get(); 
  return   view('usun_wydawnictwo', ['wydawnictwo' => $wydawnictwaZBazy,]); 
}

public function usunWydawnictwo($id) 
{
  DB::delete('DELETE FROM ksiazka WHERE idwyd = ?', [$id]);
  DB::delete('DELETE FROM wydawnictwo WHERE id = ?', [$id]);
   echo ("Wydawnictwo zostało poprawnie usunięte!");
   return redirect('/wydawnictwa');
}
 
}