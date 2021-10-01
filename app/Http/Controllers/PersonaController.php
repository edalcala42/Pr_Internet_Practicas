<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::all();
        return view('personasIndex', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personasContacto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar datos
        $request->validate([
            'nombre' => 'required|max:255',
            'apellido_paterno' => 'required|max:255',
            'apellido_materno' => 'max:255',
            'identificador' => 'required|max:255|unique:App\Models\Persona,identificador',
            'correo'=> 'required|email|max:255',
            'telefono' => ['max:50'],
        ]);
        // Crear instancia del modelo
        $persona = new Persona();
        // Asignar propiedades del modulo (columnas)
        $persona->nombre = $request->nombre;
        $persona->apellido_materno = $request->apellido_materno ?? '';
        $persona->apellido_paterno = $request->apellido_paterno;
        $persona->identificador = $request->identificador;
        $persona->telefono = $request->telefono ?? '';
        $persona->correo = $request->correo;
        // Guardar
        $persona->save();
        // Redireccionar a Index
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        return view('personasShow', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        return view('personasContacto', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        // Validar datos
        $request->validate([
            'nombre' => 'required|max:255',
            'apellido_paterno' => 'required|max:255',
            'apellido_materno' => 'max:255',
            //'identificador' => 'required|max:255|unique:App\Models\Persona,identificador',
            'correo'=> 'required|email|max:255',
            'telefono' => ['max:50'],
        ]);
        // Asignar propiedades del modulo (columnas)
        $persona->nombre = $request->nombre;
        $persona->apellido_materno = $request->apellido_materno ?? '';
        $persona->apellido_paterno = $request->apellido_paterno;
        $persona->identificador = $request->identificador;
        $persona->telefono = $request->telefono ?? '';
        $persona->correo = $request->correo;
        // Actualizar la información
        $persona->save();
        // Redireccionar a Index
        return redirect()->route('show', $persona);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
