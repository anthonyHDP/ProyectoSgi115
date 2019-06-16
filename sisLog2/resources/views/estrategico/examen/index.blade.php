@extends ('layouts.administrador')
@section ('contenido')
    

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Controles de Examenes Clinicos <a href="examen/create"><button class="btn btn-success">Nuevo Control</button></a></h3>
            @include('clinica.examen.search')
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
                        <th>Tipo de Examen</th>
                        <th>Resultado de Examen</th>
                        <th>Fecha de Control</th>
                        <th>Hora de Control</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach ($pacientes as $paci)
                    <tr>
                        <td>{{ $paci->idExamen}}</td>
                        <td>{{ $paci->nombre}}</td>
                        <td>{{ $paci->apellido}}</td>
                        <td>{{ $paci->sexo}}</td>
                        <td>{{ $paci->telefono}}</td>
                        <td>{{ $paci->tipoExamen}}</td>
                        <td>{{ $paci->resultado}}</td>
                        <td>{{ $paci->fechaControl}}</td>
                        <td>{{ $paci->horaControl}}</td>
                        <td>
                            <a href="{{URL::action('ExamenController@edit', $paci->idExamen)}}"><button class="btn btn-info">Editar</button></a>

                          

                           


                            <a href="" data-target="#modal-delete-{{$paci->idExamen}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('clinica.examen.modal')
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