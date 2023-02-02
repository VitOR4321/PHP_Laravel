<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryModules;
use Illuminate\Support\Facades\Http;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_api()
    {
        /*
        $myHistory = HistoryModules::all();
        return view('history.list',['history' => $myHistory, ]);
        */
        $myAPI_URL=config('app.url')."/public/api/history/list";
        $his = Http::get($myAPI_URL);
        $myHistory = json_decode(json_encode($his->json()['data']),FALSE);
        return view('history.list',['history' => $myHistory, ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('history.add');
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
            'winner' => 'required',
            'winnerPoints' => 'required',
            'loser' => 'required',
            'loserPoints' => 'required',

        ]);

        if($validated){
            $his = new HistoryModules();
            $his->winner = $request->winner;
            $his->winnerPoints = $request->winnerPoints;
            $his->loser = $request->loser;
            $his->loserPoints = $request->loserPoints;
            $his->save();
            return redirect(config('app.url').'/public/history/list');
        }
        */

        $myAPI_URL = config('app.url')."/public/api/history/new";
        $response = Http::post($myAPI_URL, $request);
        return redirect('/history/list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $myHistory = HistoryModules::find($id);
        if($myHistory == null){
            $error_message = "History id=".$id." not found";
            return view('history.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
        if($myHistory->count() > 0){
            return view('history.show',['his' => $myHistory,]);
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
        $myHistory = HistoryModules::find($id);
        if($myHistory == null){
            $error_message = "History id=".$id." not found";
            return view('history.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
        if($myHistory->count() > 0){
            return view('history.edit',['his' => $myHistory,]);
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
            'winner' => 'required',
            'winnerPoints' => 'required',
            'loser' => 'required',
            'loserPoints' => 'required',

        ]);
        if($validated) {
            $his = HistoryModules::find($id);

        if($his != null){
            $his->winner = $request->winner;
            $his->winnerPoints = $request->winnerPoints;
            $his->loser = $request->loser;
            $his->loserPoints = $request->loserPoints;
            $his->save();
            return redirect(config('app.url').'/public/history/list');
            }
        else{
            $error_message = "History id=".$id." not found";
            return view('history.message',['message'=>$error_message,'type_of_message'=>'Error']);
            }
        }
        */

        $myAPI_URL=config('app.url')."/public/api/history/update/".$id;
        $response = Http::put($myAPI_URL,$request);
        return redirect('/history/list');

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
        $his = HistoryModules::find($id);
        if($his != null){
            $his->delete();
            return redirect(config('app.url').'/public/history/list');
        }
        else {
            $error_message = "History id=".$id." not found";
            return view('history.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
        */
        $myAPI_URL = config('app.url')."/public/api/history/delete/".$id;
        $response = Http::delete($myAPI_URL);
        return redirect('/history/list');
    }

    public function deleteAll(){
        HistoryModules::truncate();
        return redirect(config('app.url').'/public/history/list'); 
    }
}
