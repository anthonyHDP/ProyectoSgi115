{!! Form::open(array('url'=>'tactico/vehiculo','method'=>'GET','autocomplete'=>'of','role'=>'search')) !!}
<center>

<label class="control-label" for="date">Fecha Inicial: </label>
<input class="form-control" id="from_date" name="from_date"  value="{{$fechaInicial}}" type="date"/><br><br>

<label class="control-label" for="date">Fecha Final: </label>
<input class="form-control" id="to_date" name="to_date" value="{{$fechaFinal}}" type="date"/><br><br>
      

<button type="submit" class="btn btn-primary">Buscar</button>

 <a href="{{ url('/tactico') }}"><button class="btn btn-danger">Regresar</button></a>

<a href="{{ url('/tactico') }}"><button class="btn btn-success">Ayuda</button></a>
           

      </center> 
    </span>
  </div>
</div>

{{Form::close()}}

