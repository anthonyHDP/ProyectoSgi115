<?php

namespace sisLog2;

use Illuminate\Database\Eloquent\Model;

class Incapacidad extends Model
{
    //
    protected $table='incapacidad';

    protected $primaryKey='idIncapacidad';

    public $timestamps=false;

    protected $fillable = [
    
        'idMedico',
        'idPaciente',
    	
    	'causaPaciente',
        'diasIncapacidad',
        'fechaIncapacidad',
        'horaIncapacidad'
        
        
    ];

    protected $guarded =[

    ];
}
