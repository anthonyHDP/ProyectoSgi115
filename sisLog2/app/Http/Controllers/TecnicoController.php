<?php

namespace sisLog2\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use sisLog2\Tecnico;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use PDF;

class TecnicoController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
    	
		if ($request)
        {
		//$query=trim($request->get('searchText'));
		//$query=trim($request->get('from_date'));
		//$query1=trim($request->get('to_date'));
		$start = $request->from_date;
  		$end = $request->to_date;
        if($end <$start){
            Session::flash('mensaje', 'la fecha de inicio debe ser menor a la fecha final');
            return back();
        }

		$anys = DB::table('tecnico')->whereBetween('fecha', [$start, $end])->where('DISPONIBILIDADTECNICO',0)->get();
		Session::flash('anys', $anys);


		$counts = DB::table('tecnico')->whereBetween('fecha', [$start, $end])->select(DB::raw('count(*) as tecnico_count, IDTIPOTECNICO'))->where('DISPONIBILIDADTECNICO',0)->groupby('IDTIPOTECNICO')->get();

        if($counts == null || $anys == null){
            Session::flash('mensaje', 'No existen registro para el analisis con la fecha especificada');
            return back();
        }
    	Session::flash('counts', $counts);



    	return view('tactico.tecnico.index',["anys"=>$anys,"counts"=>$counts,"fechaInicial"=>$start,"fechaFinal"=>$end]);
    	
    	}
    }

    
    public function create()
    {
        
    }
//
    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
    	$anys = Session::get('anys');
    	$counts = Session::get('counts');
    	$pdf = PDF::loadView('tactico.tecnico.vista',compact('anys', 'counts'));
        return $pdf->download('TecnicosDisponibles.pdf');
      	

    }

    public function edit($id)
    {
       
    }

    public function update(Request $request,$id)
    {
       
    }

    public function destroy($id)
    {
        
    }
}
