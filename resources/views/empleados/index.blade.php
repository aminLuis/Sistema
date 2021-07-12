@extends('layouts.app')

@section('content')


<div class="container">

@if(Session::has('mensaje'))

<div class="alert alert-success" role="alert">
  {{ Session::get('mensaje') }}
</div>

@endif


<br>
<a class="btn btn-success" href="{{url('empleados/create')}}">
Nuevo empleado
</a>
<br>
<br>
<table class="table table-light table-hover">

    <thead class="thead-light">
       <tr>
           <th>Foto</th>
           <th>Nombre</th>
           <th>Apellidos</th>
           <th>Correo</th>
           <th>Acción</th>
       </tr>
    </thead>

   <tbody>
     @foreach($empleados as $empleado)
       <tr>
           <td> 
              <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->foto}}" alt="" width="100"> 
           </td>
           <td> {{$empleado->nombre}} </td>
           <td> {{$empleado->apellidos}} </td>
           <td> {{$empleado->correo}} </td>
           <td>
              <a href="{{url('/empleados/'.$empleado->id.'/edit')}}">
                  <button class="btn btn-primary">Editar</button>
              </a>
              
             <form method="POST" action="{{url('/empleados/'.$empleado->id)}}" style="display:inline">
             {{csrf_field()}}
             {{method_field('DELETE')}}
                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar registro?');">
                Borrar
                </button>
             </form>
           </td>
       </tr>
      @endforeach
   </tbody>

</table>

{{$empleados ->links()}}

</div>
@endsection