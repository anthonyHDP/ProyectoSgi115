@extends ('layouts.admin')
@section ('contenido')

<hr>
<a type="button" href="{{URL::action('RecetaController@show', $receta->idReceta)}}" value="Ver Reporte" target="_blank" onClick="document.formulario.action='verPDF.php'; document.formuario.submit();"><button class="btn btn-warning">Ver Reporte</button></a></a>




<hr>
<a href="{{ url('/clinica/receta') }}"><button class="btn btn-danger">Regresar</button></a>

@endsection