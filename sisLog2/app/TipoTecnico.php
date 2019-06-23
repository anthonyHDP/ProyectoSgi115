<?php

namespace sisLog2;

use Illuminate\Database\Eloquent\Model;

class TipoTecnico extends Model
{
    protected $table = "tipotecnico"; 

	protected $primaryKey = 'IDTIPOTECNICO'; 

    public $timestamps=false;

    protected $fillable = [
    	'NOMBRETIPOTECNICO','DESCRIPCIONTIPOTECNICO',
    ];

    protected $guarded =[

    ];
}
