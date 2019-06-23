<?php
use sisLog2\TipoTecnico;
?>


@extends ('layouts.admin')
@section ('contenido')
    



<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="table-responsive">
<table class="table table-striped table-bordered table-condensed table-hover">
<thead>
                       
<!DOCTYPE html>
<html lang = "es">
  <head>
    <center><title>Búsqueda simple por rangos de fechas</title></center>
    <link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css"/>
    <link rel = "stylesheet" type = "text/css" href = "css/jquery-ui.css"/>
    <meta charset = "UTF-8" name = "viewport" content = "width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  </head>
<body>
  <nav class = "navbar navbar-inverse">
    <div class = "container-fluid">
    <a href = "https://obedalvarado.pw/blog" class = "navbar-brand">SIG</a>
    </div>
  </nav>
  @if(session()->has('mensaje'))
          <div class="row">
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-hidden= "true">&times;</button>
              <strong>Notificacion</strong> {{ session()->get('mensaje') }}
            </div>
            
          </div>
        @endif
  <div class = "row-fluid">
    <div class = "col-md-3"></div>
    <div class = "col-md-6">
    <div class="panel panel-default">
      <div class="panel-body">
        <center><h3 class = "text-primary">Nombre de Reporte:Tecnicos Desocupados </h3></center>
        <hr style = "border-top:1px dotted #000;"/>
        <div class = "form-inline">

        @include('tactico.tecnico.search')
        </div>
      </div>
    </div>
    </div>
  </div>

      

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h3>Disponibles por especialidad</h3>
      <div class = "table-responsive">  
        <table class = "table table-striped table-bordered table-condensed table-hover">
          <thead>
            <tr>
                <th style = "width:25%;">Cantidad de tecnicos</th>
                <th style = "width:30%;">Especialidad</th>
 
            </tr>
          </thead>
            @foreach ($counts as $count)
            <tr>
              <?php                 
                  $tipoT=TipoTecnico::findOrFail($count->IDTIPOTECNICO);
                  ?>
                <td>{{$count->tecnico_count}}</td>
                <td>{{$tipoT->NOMBRETIPOTECNICO}}</td>
            </tr>
          
           
          @endforeach
        </table>
      </div>
</div>

      <br/><b/>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h3>Especificacion de tecnicos disponibles</h3>
      <div class = "table-responsive">  
        <table class = "table table-striped table-bordered table-condensed table-hover">
          <thead>
            <tr>
                <th style = "width:25%;">Id Tecnico</th>
              	<th style = "width:30%;">Nombre tecnico</th>
              	<th style = "width:30%;">Especialidad</th>
    
                <th>Opciones</th>
            </tr>
          </thead>
            @foreach ($anys as $any)
            <tr>
              <?php                 
                  $tipoT=TipoTecnico::findOrFail($any->IDTIPOTECNICO);
                  ?>
            	<td>{{$any->IDTECNICO}}</td>
                <td>{{$any->NOMBRETECNICO}}</td>
                <td>{{$tipoT->NOMBRETIPOTECNICO}}</td>
                <td>
                    <a type="button" href="{{URL::action('TecnicoController@show',$any->IDTECNICO)}}" value="Reporte" target="_blank" onClick="document.formulario.action='verPDF.php'; document.formuario.submit();"><button class="btn btn-success">Reporte</button></a></a>
                </td>
            </tr>
          
           
          @endforeach
        </table>
      </div>
    </div>  

       
        
       
@endsection