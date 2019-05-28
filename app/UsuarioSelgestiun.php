<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsuarioSelgestiun extends Model
{
    protected $connection = 'selgestiun';

    protected $table = 'tb_usuario';
    protected $primaryKey = 'tb_usuario_id';
    public $timestamps = false;
    
    public function completo(){
    	return $this->tb_usuario_apellidopaterno.' '.$this->tb_usuario_apellidomaterno.' '.$this->tb_usuario_nombre;
    }

    public function buscarApellidos($apellidos){
    	$usuarios = UsuarioSelgestiun::select("tb_usuario_id")
    									->whereRaw("concat(tb_usuario_apellidopaterno,' ',tb_usuario_apellidomaterno) ilike '%".$apellidos."%'")
    									->get();
		$lista = [];
		foreach ($usuarios as $usuario) {
			$lista[] = $usuario->tb_usuario_id;
		}    									
    	return $lista;
    }
}
