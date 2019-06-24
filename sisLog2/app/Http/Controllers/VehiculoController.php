<?php

namespace sisLog2\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use sisLog2\Vehiculo;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use Validator;
use PDF;

class VehiculoController extends Controller
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

		$anys = DB::table('vehiculo')->whereBetween('fechadefectuoso', [$start, $end])->get();
		Session::flash('anys', $anys);
    	
    	return view('tactico.vehiculo.index',["anys"=>$anys,"fechaInicial"=>$start,"fechaFinal"=>$end]);
    	
    	}
    }

    
    public function create()
    {
        
    }
//
    public function store(Request $request)
    {
        
    }

    public function show()
    {
    	$anys = Session::get('anys');
    	$pdf = PDF::loadView('tactico.vehiculo.vista2',compact('anys'));
        return $pdf->download('Vehiculo.pdf');
      	

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
