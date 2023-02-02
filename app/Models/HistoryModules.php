<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryModules extends Model
{
    public $timestamps = false; 

    protected $table = 'history';
    
    protected $primaryKey = 'id';
    
    protected $fillable = ['winner','winnerPoints','loser','loserPoints'];
    
    public function getAllHistory(){
        return HistoryModules::all();
       }
    
       public function findHistory($id){
        return HistoryModules::find($id);
       }
}
