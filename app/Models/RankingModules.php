<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RankingModules extends Model
{
    public $timestamps = false; 

    protected $table = 'ranking';
    
    protected $primaryKey = 'id';
    
    protected $fillable = ['nick','points'];
    
    public function getAllRanking(){
        return RankingModules::all();
       }
    
       public function findRanking($id){
        return RankingModules::find($id);
       }
}
