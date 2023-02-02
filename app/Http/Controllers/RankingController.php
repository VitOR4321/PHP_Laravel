<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RankingModules;
use App\Models\HistoryModules;
use Illuminate\Support\Facades\Http;

class RankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_api()
    {
        /*
        $myRarnking = RankingModules::all();
        return view('ranking.list',['ranking' => $myRarnking, ]);
        */

        $myAPI_URL=config('app.url')."/public/api/ranking/list";
        $rank = Http::get($myAPI_URL);
        $myRanking = json_decode(json_encode($rank->json()['data']),FALSE);
        return view('ranking.list',['ranking' => $myRanking, ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ranking.add');
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
            'nick' => 'required',
            'points' => 'required',

        ]);

        if($validated){
            $rank = new RankingModules();
            $rank->nick = $request->nick;
            $rank->points = $request->points;
            $rank->save();
            return redirect(config('app.url').'/public/ranking/list');
        }
        */
        $myAPI_URL = config('app.url')."/public/api/ranking/new";
        $response = Http::post($myAPI_URL, $request);
        return redirect('/ranking/list');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $myRanking= RankingModules::find($id);
        if($myRanking == null){
            $error_message = "Ranking id=".$id." not found";
            return view('ranking.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
        if($myRanking->count() > 0){
            return view('ranking.show',['rank' => $myRanking,]);
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
        $myRanking= RankingModules::find($id);
        if($myRanking == null){
            $error_message = "Ranking id=".$id." not found";
            return view('ranking.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
        if($myRanking->count() > 0){
            return view('ranking.edit',['rank' => $myRanking,]);
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
            'nick' => 'required',
            'points' => 'required',

        ]);
        if($validated) {
            $rank = RankingModules::find($id);

        if($rank != null){
            $rank->nick = $request->nick;
            $rank->points = $request->points;
            $rank->save();
            return redirect(config('app.url').'/public/ranking/list');
            }
        else{
            $error_message = "Ranking id=".$id." not found";
            return view('ranking.message',['message'=>$error_message,'type_of_message'=>'Error']);
            }
        }
        */
        $myAPI_URL=config('app.url')."/public/api/ranking/update/".$id;
        $response = Http::put($myAPI_URL,$request);
        return redirect('/ranking/list');
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
        $rank = RankingModules::find($id);
        if($rank != null){
            $rank->delete();
            return redirect(config('app.url').'/public/ranking/list');
        }
        else {
            $error_message = "Ranking id=".$id." not found";
            return view('ranking.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
        */
        $myAPI_URL = config('app.url')."/public/api/ranking/delete/".$id;
        $response = Http::delete($myAPI_URL);
        return redirect('/ranking/list');

    }
    public function sumResult(){
        // dokończyć kod do zapisania i koniec
        $rank = RankingModules::get();
        $his = HistoryModules::get();
        foreach($rank as $val){
            foreach($his as $n){
                if($val->nick == $n->winner){
                    $val -> points = $val -> points + $n->winnerPoints;
                }
                elseif($val->nick == $n->losser){
                    $val -> points = $val -> points + $n->losserPoints;  
                }    
            }
            $val->save();
        }
        return redirect(config('app.url').'/public/ranking/list'); 
    }

    public function deleteAll(){
        RankingModules::truncate();
        return redirect(config('app.url').'/public/ranking/list'); 
    }
}
