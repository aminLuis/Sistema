<?php

namespace App\Http\Controllers;

use App\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $datos['empleados']=empleados::paginate(1);

        return view('empleados.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $campos = [
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'correo' => 'required|string|max:100',
            'foto' => 'required|max:10000|mimes:jpeg,png,jpg'
        ];

        $mensaje = ['required'=>'El campo :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        $datosEmpleado = request()->except('_token');
       
        if($request->hasFile('foto')){
            $datosEmpleado['foto']=$request->file('foto')->store('uploads','public');
        }

        empleados::insert($datosEmpleado);

        //return response()->json($datosEmpleado);

        return redirect('empleados')->with('mensaje','Empleado registrado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $empleado = empleados::findOrFail($id);
      return view('empleados.edit',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campos = [
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'correo' => 'required|string|max:100',
        ];

        if($request->hasFile('foto')){
           $campos+=['foto' => 'required|max:10000|mimes:jpeg,png,jpg'];
        }

        $mensaje = ['required'=>'El campo :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);


        $datosEmpleado = request()->except(['_token','_method']);

        if($request->hasFile('foto')){

            $empleado = empleados::findOrFail($id);
            Storage::delete('public/'.$empleado->foto);
            $datosEmpleado['foto']=$request->file('foto')->store('uploads','public');
        }

        empleados::where('id','=',$id)->update($datosEmpleado);

        //$empleado = empleados::findOrFail($id);
        //return view('empleados.edit',compact('empleado'));

        return redirect('empleados')->with('mensaje','Datos empleado actualizados con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $empleado = empleados::findOrFail($id);
        
        if(Storage::delete('public/'.$empleado->foto)){
            empleados::destroy($id);
        }

        return redirect('empleados')->with('mensaje','Empleado eliminado con exito.');
    }
}
