<?php

namespace sisLog2\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use sisLog2\Medico;
use PDF;
use sisLog2\Paciente;
use sisLog2\Http\Requests;
use sisLog2\Incapacidad;
use Illuminate\Support\Facades\Redirect;
use sisLog2\Http\Requests\IncapacidadFormRequest;
use DB;

class IncapacidadController extends Controller
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
            $pacientes=DB::table('paciente')->join('incapacidad','incapacidad.idPaciente','=','paciente.idPaciente')
            ->orWhere('paciente.nombre','LIKE','%'.$query.'%')
            ->orWhere('paciente.apellido','LIKE','%'.$query.'%')
            ->orWhere('paciente.sexo','LIKE','%'.$query.'%')
            ->orWhere('paciente.telefono','LIKE','%'.$query.'%')  
            ->orWhere('incapacidad.idIncapacidad','LIKE','%'.$query.'%')
            ->orWhere('causaPaciente','LIKE','%'.$query.'%')
            ->orWhere('diasIncapacidad','LIKE','%'.$query.'%')
            ->orWhere('fechaIncapacidad','LIKE','%'.$query.'%')
            ->orWhere('horaIncapacidad','LIKE','%'.$query.'%')
            ->orderBy('idIncapacidad','desc')
            ->paginate(7);
            return view('clinica.incapacidad.index',["pacientes"=>$pacientes,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $pacientes=Paciente::all();
        $medicos=Medico::all(); 
       
        $now=Carbon::now();
    	return view("clinica.incapacidad.create",["pacientes"=>$pacientes],["medicos"=>$medicos])->with('now',$now);



    }

    public function store(IncapacidadFormRequest $request)
    {
    	$incapacidad = new Incapacidad;
    	
        $incapacidad->idPaciente=$request->get('idPaciente');
        $incapacidad->idMedico=$request->get('idMedico');
       
        $incapacidad->causaPaciente=$request->get('causaPaciente');
        $incapacidad->diasIncapacidad=$request->get('diasIncapacidad');
        $incapacidad->fechaIncapacidad=$request->get('fechaIncapacidad');
        $incapacidad->horaIncapacidad=$request->get('horaIncapacidad');
        if($incapacidad->save()){

            return back()->with('msj','Datos Guardados');
            return redirect('clinica/paciente');
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }

    	return Redirect::to('clinica/examen');
    }

    public function show($id)
    {
        $incapacidad=Incapacidad::findOrFail($id);
        $pacientes=Paciente::all();
        $medico=Medico::all();
        $pdf = PDF::loadView("clinica.incapacidad.vista",["incapacidad"=>$incapacidad],["pacientes"=>$pacientes],["medico"=>$medico]);
        return $pdf->stream($incapacidad->nombrePaciente);
        //return view("clinica.paciente.show",["paciente"=>Paciente::findOrFail($id)]);
    }




    public function edit($id)

    {
        $now=Carbon::now();
        $medicos=Medico::all(); 
        $pacientes=Paciente::all();
    	return view("clinica.incapacidad.edit",compact('medicos','pacientes'),["incapacidad"=>Incapacidad::findOrFail($id)])->with('now',$now);
    }

    public function update(IncapacidadFormRequest $request,$id)
    {
    	$incapacidad=Incapacidad::findOrFail($id);
        
        $incapacidad->idPaciente=$request->get('idPaciente');
        $incapacidad->idMedico=$request->get('idMedico');
      
        $incapacidad->causaPaciente=$request->get('causaPaciente');
        $incapacidad->diasIncapacidad=$request->get('diasIncapacidad');
        $incapacidad->fechaIncapacidad=$request->get('fechaIncapacidad');
        $incapacidad->horaIncapacidad=$request->get('horaIncapacidad');
        if($incapacidad->update()){

            return back()->with('msj','Datos Guardados');
            return redirect('clinica/paciente');
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }
        
    	return Redirect::to('clinica/examen');
    }


    public function destroy($id)
    {
    	$incapacidad=Incapacidad::findOrFail($id);
          if($incapacidad->delete()){

            return back()->with('msj','Datos Guardados');
            return redirect('clinica/paciente');
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }


    	return Redirect::to('clinica/examen');
    }

}
