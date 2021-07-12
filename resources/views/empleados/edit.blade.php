@extends('layouts.app')

@section('content')


<div class="container">

<form method="POST" action="{{url('/empleados/'.$empleado->id)}}" enctype="multipart/form-data">

  {{csrf_field()}}
  {{method_field('PATCH')}}

  @include('empleados.form',['modo'=>'editar'])

  
  <!--<button type="submit">Guardar cambios</button> !-->
 
  <a class="btn btn-danger" href="{{url('/empleados')}}">Regresar</a>

</form>

</div>
@endsection