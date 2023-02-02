<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MatchesModules;
use App\Http\Requests\Matches;

class RestApiMatchesController extends Controller
{
    public function ListMatchesModules(){
        $myMatchesModules = MatchesModules::all();
        $data = ["data"=>$myMatchesModules];
        return response()->json($data,200);
       }
    
       public function NewMatchesModule(Matches $request){
          $data = $request->validated();
          $match = new MatchesModules();
          $match -> round = $data['round'];
          $match -> firstNick = $data['firstNick'];
          $match -> secoundNick = $data['secoundNick'];
          $match -> result = $data['result'];
          $match -> endGame = $data['endGame'];
          $match -> save();
          return response()->json(['data'=>$match]);
       }
    
       public function DeleteMatchesModule($id){
          $match = MatchesModules::find($id);
          if($match!= null){
             $match->delete();
             return response()->json(['data'=>$match]);
          }
          else
          return response()->json(['data'=>[]]);
       }
    
       public function UpdateMatchesModule($id, Matches $request){
          $data = $request -> validated();
          $match = MatchesModules::find($id);
          if($match!=null){
             $match -> round = $data['round'];
             $match -> firstNick = $data['firstNick'];
             $match -> secoundNick = $data['secoundNick'];
             $match -> result = $data['result'];
             $match -> endGame = $data['endGame'];
             $match -> save();
             return response()->json(['data'=>$match]);
          }
          else
          return response()->json(['data'=>[]]);
       }
    
       public function FindMatchesModule($id){
          $match = MatchesModules::find($id);
          if($match!=null){
             $data = ["data"=>$match];
             return response()->json($data,200);
          }
          else
          return response()->json(['data'=>[]]);
       }
}
