 

  <div class="form-group">
  
    <label for="nombre" class="control-label">{{'Nombre'}}</label>
    <input class="form-control {{$errors->has('nombre')?'is-invalid':''}}" type="text" name="nombre" 
    value="{{ isset($empleado->nombre)?$empleado->nombre:old('nombre') }}">
    {!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}

  </div>

  
 
  <div class="form-group">
  
    <label for="apellidos" class="control-label">{{'Apellidos'}}</label>
    <input class="form-control {{$errors->has('apellidos')?'is-invalid':''}}" type="text" name="apellidos" 
    value="{{ isset($empleado->apellidos)?$empleado->apellidos:'' }}">
    {!! $errors->first('apellidos','<div class="invalid-feedback">:message</div>') !!}


  </div>
  

  <div class="form-group">
  
    <label for="correo" class="control-label">{{'Correo'}}</label>
    <input class="form-control {{$errors->has('correo')?'is-invalid':''}}" type="email" name="correo" 
    value="{{ isset($empleado->correo)?$empleado->correo:'' }}">
    {!! $errors->first('correo','<div class="invalid-feedback">:message</div>') !!}

  </div> 
  

  <div class="form-group">
 
    <label for="foto" class="control-label">{{'Foto'}}</label>
    @if(isset($empleado->foto))
    <br>
    <img class="img-thumbnail" src="{{ asset('storage').'/'.$empleado->foto}}" alt="" width="200"> 
    <br>
    @endif
  
  </div> 
 
  
  <div class="form-group">
 
    <input class="{{$errors->has('foto')?'is-invalid':''}}" type="file" name="foto">
    {!! $errors->first('foto','<div class="invalid-feedback">:message</div>') !!}
  
  </div>
  

  
  <!--<button value=" {{$modo=='crear'?'Agregar':'Modificar'}} "></button> !-->
  <input class="btn btn-success" type="submit" value=" {{$modo=='crear'?'Agregar':'Modificar'}} ">
 
