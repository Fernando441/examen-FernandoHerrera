<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactos;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactos = Contactos::all();
       
        return view('lista-contactos', compact('contactos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nombre' => 'required',
            'ap_paterno' => 'required',
            'ap_materno' => 'required'
        ]);



        Contactos::create([
            'nombre' => $request['nombre'],
            'ap_paterno' => $request['ap_paterno'],
            'ap_materno' =>  $request['ap_materno'],
            'fecha_nacimiento' => $request['fecha_nacimiento'],
            'ubicacion' => $request['ubicacion'],
            'telefono_casa' =>  $request['tel_casa'],
            'telefono_celular' =>  $request['celular'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);

        session()->flash('success', 'Contacto creado correctamente');

        return view('welcome');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacto = Contactos::where('id', $id)->first();

        return view('editar-contacto', compact('contacto'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $data = [
            'nombre' => $request->get('nombre', ''),
            'ap_paterno' => $request->get('ap_paterno', ""),
            'ap_materno' => $request->get('ap_materno', ""),
            'fecha_nacimiento' => $request->get('fecha_nacimiento', ""),
            'ubicacion' => $request->get('ubicacion', ""),
            'telefono_casa' => $request->get('tel_casa', ""), 
            'telefono_celular' => $request->get('celular', ""), 
            'updated_at' => date('Y-m-d')
        ];

        Contactos::where('id', $request->id)->update($data);

        session()->flash('success', 'El contacto se actualizo correctamente');

        return redirect()->route('contactos.lista');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Contactos::findOrFail($request->id)->delete();

        session()->flash('success', 'El contrato se elimino correctamente');

        return redirect()->route('contactos.lista');
    }
}
