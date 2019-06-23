{!! Form::open(array('url'=>'tactico/tecnico', 'method'=>'GET', 'autcomplete'=>'off', 'role'=>'search'))!!}
<div class="form-group">
	<div class="input-group">
		<!--<input type="text" class="form-control" name="searchText" placeholder="Buscar" value="">-->
		 
     <div class="col-lg-5 col-sm-2 col-md-2 col-xs-12">
        <div class="form-group"> 
        <label class="control-label" for="date">Fecha Inicial</label>
        <input class="form-control" id="from_date" name="from_date"  value="{{$fechaInicial}}" type="date"/>
      </div>
         </div>
      <div class="col-lg-5 col-sm-2 col-md-2 col-xs-12">
        <div class="form-group"> 
        <label class="control-label" for="date">Fecha Final</label>
        <input class="form-control" id="to_date" name="to_date" value="{{$fechaFinal}}" type="date"/>
        </div>
      </div>
      <div class="col-lg-5 col-sm-2 col-md-2 col-xs-12">
		  <button type="submit" class="btn btn-primary">Buscar</button>

      
      </div>     
      
	</div>

</div>
<a href="{{ url('/tactico/tecnico') }}"><button class="btn btn-danger">Regresar</button></a>
      <a href="{{ url('/clinica') }}"><button class="btn btn-success">Ayuda</button></a>
{{Form::close()}}