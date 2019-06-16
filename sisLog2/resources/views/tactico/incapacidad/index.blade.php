@extends ('layouts.administrador')
@section ('contenido')
    

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Incapacidades <a href="incapacidad/create"><button class="btn btn-success">Nueva Incapacidad</button></a></h3>
            @include('clinica.incapacidad.search')
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Sexo</th>
                        <th>Telefono</th>
                        <th>Causa de la incapacidad</th>
                        <th>Dias de Incapacidad</th>
                        <th>Fecha de Incapacidad</th>
                        <th>Hora de Incapacidad</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach ($pacientes as $paci)
                    <tr>
                        <td>{{ $paci->idIncapacidad}}</td>
                        <td>{{ $paci->nombre}}</td>
                        <td>{{ $paci->apellido}}</td>
                        <td>{{ $paci->sexo}}</td>
                        <td>{{ $paci->telefono}}</td>
                        <td>{{ $paci->causaPaciente}}</td>
                        <td>{{ $paci->diasIncapacidad}}</td>
                        <td>{{ $paci->fechaIncapacidad}}</td>
                        <td>{{ $paci->horaIncapacidad}}</td>
                        <td>
                            <a href="{{URL::action('IncapacidadController@edit', $paci->idIncapacidad)}}"><button class="btn btn-info">Editar</button></a>
                           
                            <a type="button" href="{{URL::action('IncapacidadController@show', $paci->idIncapacidad)}}" value="Reporte" target="_blank" onClick="document.formulario.action='verPDF.php'; document.formuario.submit();"><button class="btn btn-warning">Reporte</button></a></a>


                            <a href="" data-target="#modal-delete-{{$paci->idIncapacidad}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('clinica.incapacidad.modal')
                    @endforeach
                </table>
            </div>
            {{$pacientes->render()}}
            <hr>
            &nbsp
            <a href="{{ url('/clinica') }}"><button class="btn btn-danger">Regresar</button></a>
        </div>
    </div>
    


@endsection

@if(session()->has('msj'))
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Clinica Medica Betel</title>
</head>
<body>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        swal("Procesamiento", "Ejecutado Exitosamente", "success");
         

        //Puedes colocar warning, error, success y por último info.
    </script>
</body>
</html>
@endif

@if(session()->has('errormsj'))
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Clinica Medica Betel</title>
</head>
<body>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        swal("Error", "En el Procesamiento", "warning");
         

        //Puedes colocar warning, error, success y por último info.
    </script>
</body>
</html>
@endif