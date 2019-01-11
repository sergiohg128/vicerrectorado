<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyectoRecord extends Model
{
    protected $connection = 'record';
    
    protected $table = 'proyecto';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    
    public function responsables(){
        return $this->hasMany('App\InvestigadorProyectoRecord','id_proyecto','id');
    }
}
