<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RankingModules;
use App\Http\Requests\Ranking;

class RestApiRankingController extends Controller
{
    public function ListRankingModules(){
        $myRankingModules = RankingModules::all();
        $data = ["data"=>$myRankingModules];
        return response()->json($data,200);
       }
    
       public function NewRankingModule(Ranking $request){
          $data = $request->validated();
          $rank = new RankingModules();
          $rank -> nick = $data['nick'];
          $rank -> points = $data['points'];
          $rank -> save();
          return response()->json(['data'=>$rank]);
       }
    
       public function DeleteRankingModule($id){
          $rank = RankingModules::find($id);
          if($rank!= null){
             $rank->delete();
             return response()->json(['data'=>$rank]);
          }
          else
          return response()->json(['data'=>[]]);
       }
    
       public function UpdateRankingModule($id, Ranking $request){
          $data = $request -> validated();
          $rank = RankingModules::find($id);
          if($rank!=null){
             $rank -> nick = $data['nick'];
             $rank -> points = $data['points'];
             $rank -> save();
             return response()->json(['data'=>$rank]);
          }
          else
          return response()->json(['data'=>[]]);
       }
    
       public function FindRankingModule($id){
          $rank = RankingModules::find($id);
          if($rank!=null){
             $data = ["data"=>$rank];
             return response()->json($data,200);
          }
          else
          return response()->json(['data'=>[]]);
       }
}
