<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrationModules;
use App\Models\RankingModules;
use Illuminate\Support\Facades\Http;

class RegistrationController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_api()
    {
        /*
        $myRegistration = RegistrationModules::all();
        return view('registration.list',['registration' => $myRegistration, ]);
        */
        $myAPI_URL=config('app.url')."/public/api/registration/list";
        $regis = Http::get($myAPI_URL);
        $myRegistration = json_decode(json_encode($regis->json()['data']),FALSE);
        return view('registration.list',['registration' => $myRegistration, ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registration.add');
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
            'nick' => 'required|min:3|max:50|unique:registration',
            'index' => 'required|min:6|max:7|unique:registration|regex:/^[s]{1}[0-9]{5,6}$/',
            'department' => 'required',

        ]);

        if($validated){
            $regis = new RegistrationModules();
            $regis->nick = $request->nick;
            $regis->index = $request->index;
            $regis->department = $request->department;
            $regis->save();

            $rank = new RankingModules();
            $rank->nick = $request->nick;
            $rank->points = 0;
            $rank->save();
            return redirect(config('app.url').'/public/registration/add');
        }
        */
        $myAPI_URL = config('app.url')."/public/api/registration/new";
        $response = Http::post($myAPI_URL, $request);
        return redirect('/registration/add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $myRegistration = RegistrationModules::find($id);
        if($myRegistration == null){
            $error_message = "Registration id=".$id." not found";
            return view('registration.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
        if($myRegistration->count() > 0){
            return view('registration.show',['regis' => $myRegistration,]);
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
        $myRegistration = RegistrationModules::find($id);
        if($myRegistration == null){
            $error_message = "Registration id=".$id." not found";
            return view('registration.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
        if($myRegistration->count() > 0){
            return view('registration.edit',['regis' => $myRegistration,]);
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
            'nick' => 'required|min:3|max:50',
            'index' => 'required|min:6|max:7|regex:/^[s]{1}[0-9]{5,6}$/',
            'department' => 'required',

        ]);
        if($validated) {
            $regis = RegistrationModules::find($id);

        if($regis != null){
            $regis->nick = $request->nick;
            $regis->index = $request->index;
            $regis->department = $request->department;
            $regis->save();
            return redirect(config('app.url').'/public/registration/list');
            }
        else{
            $error_message = "Registration id=".$id." not found";
            return view('registration.message',['message'=>$error_message,'type_of_message'=>'Error']);
            }
        }
        */
        $myAPI_URL=config('app.url')."/public/api/registration/update/".$id;
        $response = Http::put($myAPI_URL,$request);
        return redirect('/registration/list');
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
        $regis = RegistrationModules::find($id);
        if($regis != null){
            $regis->delete();
            return redirect(config('app.url').'/public/registration/list');
        }
        else {
            $error_message = "Registration id=".$id." not found";
            return view('registration.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
        */
        $myAPI_URL = config('app.url')."/public/api/registration/delete/".$id;
        $response = Http::delete($myAPI_URL);
        return redirect('/registration/list');
    }

    public function autorizeGamers()
    {
        $regis = RegistrationModules::get();
        //$rank = RankingModules::get();
        foreach($regis as $key => $val){
            // sprawdzenie czy nie ma już takiego gracza
            /*
            $sameNick = false;
            foreach($rank as $key => $n){
                $registrationNick = $val->nick;
                $rankingNick = $n->nick;
                if(preg_match($registrationNick, $rankingNick)==1){
                    $sameNick = true;
                }
            }
            if($sameNick == false){
                $rank = new RankingModules();
                $rank->nick = $val->nick;
                $rank->points = 0;
                $rank->save();
            } 
            */ 
            $rank = new RankingModules();
            $rank->nick = $val->nick;
            $rank->points = 0;
            $rank->save();  
        }
        return redirect(config('app.url').'/public/ranking/list');
    }
    public function deleteAll(){
        RegistrationModules::truncate();
        return redirect(config('app.url').'/public/registration/list'); 
    }

}
