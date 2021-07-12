@extends('layouts.app')

@section('content')


<div class="container">

@if(count($errors)>0)

<div class="alert alert-danger" role="alert">
 
     <ul>
         @foreach($errors->all() as $error)

           <li> {{$error}} </li>

         @endforeach
     </ul>

</div>

@endif

  <form method="POST" action="{{url('/empleados')}}" enctype="multipart/form-data">
  {{csrf_field()}}
    
    @include('empleados.form',['modo'=>'crear'])
  
    
    <a class="btn btn-danger" href="{{url('/empleados')}}">Regresar</a>

  </form>


</div>
@endsection