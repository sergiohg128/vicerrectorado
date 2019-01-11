<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestigadorProyectoRecord extends Model
{
    protected $connection = 'record';
    
    protected $table = 'investigador_proyecto';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function completo(){
        $investigador = UsuarioSelgestiun::find($this->id_investigador);
    	return $investigador->tb_usuario_apellidopaterno.' '.$investigador->tb_usuario_apellidomaterno.' '.$investigador->tb_usuario_nombre;
    }
}
