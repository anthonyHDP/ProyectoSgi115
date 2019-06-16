<?php

namespace sisLog2\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use sisLog2\Medico;
use sisLog2\Paciente;
use sisLog2\Http\Requests;
use sisLog2\Examen;
use PDF;
use Illuminate\Support\Facades\Redirect;
use sisLog2\Http\Requests\ExamenFormRequest;
use DB;

class ExamenController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $pacientes=DB::table('paciente')->join('examen','examen.idPaciente','=','paciente.idPaciente')
            ->orWhere('paciente.nombre','LIKE','%'.$query.'%')
            ->orWhere('paciente.apellido','LIKE','%'.$query.'%')
            ->orWhere('paciente.sexo','LIKE','%'.$query.'%')
            ->orWhere('paciente.telefono','LIKE','%'.$query.'%')
            ->orWhere('examen.idExamen','LIKE','%'.$query.'%')
            ->orWhere('tipoExamen','LIKE','%'.$query.'%')
            ->orWhere('fechaControl','LIKE','%'.$query.'%')
            ->orWhere('horaControl','LIKE','%'.$query.'%')
            ->orWhere('resultado','LIKE','%'.$query.'%')
            ->orderBy('idExamen','desc')
            ->paginate(7);
            return view('clinica.examen.index',["pacientes"=>$pacientes,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $pacientes=Paciente::all();
        $medicos=Medico::all(); 
        $now=Carbon::now();
    	return view("clinica.examen.create",["pacientes"=>$pacientes],["medicos"=>$medicos])->with('now',$now);
    }

    public function store(ExamenFormRequest $request)
    {
    	$examen = new Examen;
    	$examen->idPaciente=$request->get('idPaciente');
        $examen->idMedico=$request->get('idMedico');
        $examen->tipoExamen=$request->get('tipoExamen');
        $examen->fechaControl=$request->get('fechaControl');
        $examen->horaControl=$request->get('horaControl');
        $examen->resultado=$request->get('resultado');
        if($examen->save()){

            return back()->with('msj','Datos Guardados');
            return redirect('clinica/paciente');
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }

    	return Redirect::to('clinica/examen');
    }

    public function show($id)
    {
    	$examen=Examen::findOrFail($id);
        $pdf = PDF::loadView("clinica.examen.vista",["examen"=>$examen]);
        return $pdf->stream($examen->nombrePaciente);
        //return view("clinica.paciente.show",["paciente"=>Paciente::findOrFail($id)]);


        
    }




    public function edit($id)

    {
        $now=Carbon::now();
        $medicos=Medico::all(); 
        $pacientes=Paciente::all();
    	return view("clinica.examen.edit",compact('medicos','pacientes'),["examen"=>Examen::findOrFail($id)])->with('now',$now);
    }

    public function update(ExamenFormRequest $request,$id)
    {
    	
        $examen=Examen::findOrFail($id);
        $examen->idPaciente=$request->get('idPaciente');
        $examen->idMedico=$request->get('idMedico');
        $examen->tipoExamen=$request->get('tipoExamen');
        $examen->fechaControl=$request->get('fechaControl');
        $examen->horaControl=$request->get('horaControl');
        $examen->resultado=$request->get('resultado');

    	if($examen->update()){

            return back()->with('msj','Datos Guardados');
            return redirect('clinica/paciente');
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }
        
    	return Redirect::to('clinica/examen');
    }

    public function destroy($id)
    {
    	$examen=Examen::findOrFail($id);
          if($examen->delete()){

            return back()->with('msj','Datos Guardados');
            return redirect('clinica/paciente');
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }


    	return Redirect::to('clinica/examen');
    }
}
