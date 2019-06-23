<?php

namespace sisLog2;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    protected $table = "tecnico"; 

	protected $primaryKey = 'IDTECNICO'; 

    public $timestamps=false;

    protected $fillable = [
    	'CORREOTECNICO','DIRECCIONTECNICO','DISPONIBILIDADTECNICO','IDPROYECTO','EDADTECNICO','IDTIPOTECNICO','NOMBRETECNICO', 'SEXOTECNICO', 'TELEFONOTECNICO','fecha',
    ];

    protected $guarded =[

    ];
}
