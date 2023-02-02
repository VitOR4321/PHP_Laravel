<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MatchesModules;
use App\Models\RegistrationModules;
use App\Models\HistoryModules;
use Illuminate\Support\Facades\Http;

class MatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_api()
    {
        /*
        $myMatches = MatchesModules::all();
        return view('matches.list',['matches' => $myMatches, ]);
        */

        $myAPI_URL=config('app.url')."/public/api/matches/list";
        $match = Http::get($myAPI_URL);
        $myMatches = json_decode(json_encode($match->json()['data']),FALSE);
        return view('matches.list',['matches' => $myMatches, ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matches.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_api(Request $request)
    {
        /*
        $validated = $request->validate([
            'round' => 'required',
            'firstNick' => 'required',
            'secoundNick' => 'required',
            'result' => 'required',
            'endGame' =>'required',
        ]);

        if($validated){
            $match = new MatchesModules();
            $match->round= $request->round;
            $match->firstNick = $request->firstNick;
            $match->secoundNick = $request->secoundNick;
            $match->result= $request->result;
            $match->endGame = $request->endGame;
            $match->save();
            return redirect(config('app.url').'/public/matches/list');
        }
        */
        $myAPI_URL = config('app.url')."/public/api/matches/new";
        $response = Http::post($myAPI_URL, $request);
        return redirect('/matches/list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $myMatches = MatchesModules::find($id);
        if($myMatches == null){
            $error_message = "Match id=".$id." not found";
            return view('matches.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
        if($myMatches->count() > 0){
            return view('matches.show',['match' =>$myMatches,]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $myMatches = MatchesModules::find($id);
        if($myMatches == null){
            $error_message = "Match id=".$id." not found";
            return view('matches.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
        if($myMatches->count() > 0){
            return view('matches.edit',['match' =>$myMatches,]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_api(Request $request, $id)
    {
        /*
        $validated = $request->validate([
            'round' => 'required',
            'firstNick' => 'required',
            'secoundNick' => 'required',
            'result' => 'required',
            'endGame' =>'required',

        ]);
        if($validated) {
            $match = MatchesModules::find($id);
            if($match->result == 'brak' && $match->endGame == 0){
                $match->round= $request->round;
                    $match->firstNick = $request->firstNick;
                    $match->secoundNick = $request->secoundNick;
                    $match->result= $request->result;
                    $match->endGame = $request->endGame;
                    $match->save();
                    return redirect(config('app.url').'/public/matches/list');
        
            }
            else if($match->result != 'brak' && $match->endGame == 1){
                        $his = new HistoryModules();
                        if($match->result == $match->firstNick){
                            $his->winner = $match->firstNick;
                            $his->winnerPoints = 2;
                            $his->loser = $match->secoundNick;
                            $his->loserPoints = 0;
                        }
                        else if($match->result == $match->secoundNick){
                            $his->winner = $match->secoundNick;
                            $his->winnerPoints = 2;
                            $his->loser = $match->firstNick;
                            $his->loserPoints = 0;
                        }
                        else if($match->result == 'remis'){
                            $his->winner = $match->firstNick;
                            $his->winnerPoints = 1;
                            $his->loser = $match->secoundNick;
                            $his->loserPoints = 1;
                        }
                        $his->save();
                        $match->delete();
                        return redirect(config('app.url').'/public/matches/list');
            }
            else{
                    $error_message = "Match id=".$id." not found";
                    return view('matches.message',['message'=>$error_message,'type_of_message'=>'Error']);
            }
        }
        */
        $myAPI_URL=config('app.url')."/public/api/matches/update/".$id;
        $response = Http::put($myAPI_URL,$request);
        return redirect('/matches/list');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_api($id)
    {
        /*
        $match = MatchesModules::find($id);
        if($match != null){
            $match->delete();
            return redirect(config('app.url').'/public/matches/list');
        }
        else {
            $error_message = "Match id=".$id." not found";
            return view('matches.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
        */
        $myAPI_URL = config('app.url')."/public/api/matches/delete/".$id;
        $response = Http::delete($myAPI_URL);
        return redirect('/matches/list');
    }

    // zmienna do wstawienia która jest runda rozgrywek
    public $tournamentRound = 1;

    public function matchesMaker(){

        $regis = RegistrationModules::get();
        $nicksTable = array();
        foreach($regis as $val){
            array_push($nicksTable, $val->nick);
        }
        while(sizeof($nicksTable)!=0){
            if($nicksTable != null){
                if(sizeof($nicksTable)==1){
                    $match = new MatchesModules();
                    $match->round = $this->tournamentRound;
                    $match->firstNick = $nicksTable[0];
                    $match->secoundNick = 'brak';
                    $match->result = "";
                    $match->endGame = false;
                    $match->save();
                    unset($nicksTable[0]);
                    $nicksTable = array_values($nicksTable);
                }
                else{
                    $first = rand(0,sizeof($nicksTable)-1);
                    $secound = rand(0,sizeof($nicksTable)-1);
                    if($first != $secound){
                    $match = new MatchesModules();
                    $match->round = $this->tournamentRound;
                    $match->firstNick = $nicksTable[$first];
                    $match->secoundNick = $nicksTable[$secound];
                    $match->result = "";
                    $match->endGame = false;
                    $match->save();
                    unset($nicksTable[$first]);
                    unset($nicksTable[$secound]);
                    $nicksTable = array_values($nicksTable);
                    }
                }
        }
    }
    $this->tournamentRound = $this->tournamentRound + 1;
    return redirect(config('app.url').'/public/matches/list'); 
}

    public function setToHistory(){
        $match = MatchesModules::get();
        // dodać warunek który usuwa jeden rekord w tabeli
        foreach($match as $val){
            if($val->endGame == true){
                $his = new HistoryModules();
                if($val -> result == $val -> firstNick){
                    $his->winner = $val -> firstNick;
                    $his->winnerPoints = 2;
                    $his->loser = $val -> secoundNick;
                    $his->loserPoints = 0;
                    $his->save();
                }
                elseif($val -> result == $val -> secoundNick){
                    $his->winner = $val -> secoundNick;
                    $his->winnerPoints = 2;
                    $his->loser = $val -> firstNick;
                    $his->loserPoints = 0;
                    $his->save();
                }
                elseif($val -> result == "remis"){
                    $his->winner = $val -> firstNick;
                    $his->winnerPoints = 1;
                    $his->loser = $val -> secoundNick;
                    $his->loserPoints = 1;
                    $his->save();
                }  
            }
        }
        MatchesModules::truncate();
        return redirect(config('app.url').'/public/matches/list'); 
    }

    public function deleteAll(){
        MatchesModules::truncate();
        $this->tournamentRound = 1;
        return redirect(config('app.url').'/public/matches/list'); 
    }
}
