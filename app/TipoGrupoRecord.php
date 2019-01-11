<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoGrupoRecord extends Model
{
    protected $connection = 'record';

    protected $table = 'tipo_grupo';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
}
