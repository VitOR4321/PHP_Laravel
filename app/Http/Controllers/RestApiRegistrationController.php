<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrationModules;
use App\Http\Requests\Registration;

class RestApiRegistrationController extends Controller
{
    public function ListRegistrationModules(){
        $myRegistrationModules = RegistrationModules::all();
        $data = ["data"=>$myRegistrationModules];
        return response()->json($data,200);
       }
    
       public function NewRegistrationModule(Registration $request){
          $data = $request->validated();
          $reg = new RegistrationModules();
          $reg -> nick = $data['nick'];
          $reg -> index = $data['index'];
          $reg -> department = $data['department'];
          $reg -> save();
          return response()->json(['data'=>$reg]);
       }
    
       public function DeleteRegistrationModule($id){
          $reg = RegistrationModules::find($id);
          if($reg!= null){
             $reg->delete();
             return response()->json(['data'=>$reg]);
          }
          else
          return response()->json(['data'=>[]]);
       }
    
       public function UpdateRegistrationModule($id, Registration $request){
          $data = $request -> validated();
          $reg = RegistrationModules::find($id);
          if($reg!=null){
            $reg -> nick = $data['nick'];
            $reg -> index = $data['index'];
            $reg -> department = $data['department'];
            $reg -> save();
            return response()->json(['data'=>$reg]);
          }
          else
          return response()->json(['data'=>[]]);
       }
    
       public function FindRegistrationModule($id){
          $reg = RegistrationModules::find($id);
          if($reg!=null){
             $data = ["data"=>$reg];
             return response()->json($data,200);
          }
          else
          return response()->json(['data'=>[]]);
       }
}
