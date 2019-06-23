<?php

namespace sisLog2;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = "vehiculo"; 

	protected $primaryKey = 'IDVEHICULO'; 

    public $timestamps=false;

    protected $fillable = [
    	'ANIOVEHICULO','DESCRIPCIONDESPERFECTO','fechadefectuoso','IDTECNICO','MARCAVEHICULO','MODELOVEHICULO','TIPOCOMBUSTIBLE', 'TIPODESPERFECTO', 'TIPOVEHICULO', 'VECHICULODEFECTUOSO',
    ];

    protected $guarded =[

    ];
}
