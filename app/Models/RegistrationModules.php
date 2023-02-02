<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationModules extends Model
{
    public $timestamps = false; 

    protected $table = 'registration';
    
    protected $primaryKey = 'id';
    
    protected $fillable = ['nick','index','department'];
    
    public function getAllRegistration(){
        return RegistrationModules::all();
       }
    
       public function findRegistration($id){
        return RegistrationModules::find($id);
       }
}
