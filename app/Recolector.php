<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recolector extends Model
{
    protected $table = "Recolectores";
    protected $fillable = ['nombre', 'dias'];
    protected $primaryKey = 'idRecolector';

}
