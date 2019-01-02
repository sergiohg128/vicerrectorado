<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    
    protected $table = 'usuario';
    protected $primaryKey = 'id';
    public $timestamps = false;
    

    public function oficina(){
    	return Oficina::find($this->id_oficina);
    }
}
