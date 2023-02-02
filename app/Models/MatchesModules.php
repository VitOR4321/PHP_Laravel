<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchesModules extends Model
{
    public $timestamps = false; 

    protected $table = 'matches';
    
    protected $primaryKey = 'id';
    
    protected $fillable = ['round','first','secound','result','endGame'];
    
    public function getAllMatches(){
        return MatchesModules::all();
       }
    
       public function findMatches($id){
        return MatchesModules::find($id);
       }
}
