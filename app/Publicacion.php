<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    
    protected $table = 'publicacion';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
}
