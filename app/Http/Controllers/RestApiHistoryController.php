<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryModules;
use App\Http\Requests\History;

class RestApiHistoryController extends Controller
{
    public function ListHistoryModules(){
        $myHistoryModules = HistoryModules::all();
        $data = ["data"=>$myHistoryModules];
        return response()->json($data,200);
       }
    
       public function NewHistoryModule(History $request){
          $data = $request->validated();
          $his = new HistoryModules();
          $his -> winner = $data['winner'];
          $his -> winnerPoints = $data['winnerPoints'];
          $his -> loser = $data['loser'];
          $his -> loserPoints = $data['loserPoints'];
          $his -> save();
          return response()->json(['data'=>$his]);
       }
    
       public function DeleteHistoryModule($id){
          $his = HistoryModules::find($id);
          if($his!= null){
             $his->delete();
             return response()->json(['data'=>$his]);
          }
          else
          return response()->json(['data'=>[]]);
       }
    
       public function UpdateHistoryModule($id, History $request){
          $data = $request -> validated();
          $his = HistoryModules::find($id);
          if($his!=null){
             $his -> winner = $data['winner'];
             $his -> winnerPoints = $data['winnerPoints'];
             $his -> loser = $data['loser'];
             $his -> loserPoints = $data['loserPoints'];
             $his -> save();
             return response()->json(['data'=>$his]);
          }
          else
          return response()->json(['data'=>[]]);
       }
    
       public function FindHistoryModule($id){
          $his = HistoryModules::find($id);
          if($his!=null){
             $data = ["data"=>$his];
             return response()->json($data,200);
          }
          else
          return response()->json(['data'=>[]]);
       }
}
