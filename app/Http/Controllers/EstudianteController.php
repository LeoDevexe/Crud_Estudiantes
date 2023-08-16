<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /** 
     * 
     * 
     *@return \Illuminate\Http\Response
     */
    public function index()
    {

        $estudiantes = Estudiante::paginate(20);

        return view('pages.tables', compact('estudiantes'));
    }


    /** 
     * 
     *@return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages.add-estudiantes');
    }

    /** 
     * 
     *@param \Illuminate\Http\Request $request
     *@return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validacion = $request->validate([
            'cedula' => 'required|max:10',
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'edad' => 'numeric|max:2'
        ], ['required' => 'Este campo es requerido', 'numeric' => 'Este campo requiere de numeros', 'cedula.max' => 'Solo se permite 10 caracteres', 'edad.max' => 'Solo se permite 2 caracteres']);
        $estudiante = new Estudiante();
        $estudiante->cedula = $request->input('cedula');
        $estudiante->nombres = $request->input('nombres');
        $estudiante->apellidos = $request->input('apellidos');
        $estudiante->email = $request->input('email');
        $estudiante->edad = $request->input('edad');

        $estudiante->save();
        return back();
    }

    /**
     * Remove the specified resource from storage
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $estudiante = Estudiante::find($id);
        $estudiante->delete();

        return back();
    }
    /**
     * Remove the specified resource from storage
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $estudiante = Estudiante::find($id);

        return view('pages.edit-estudiantes', compact('estudiante'));
    }
    /** Remove the specified resource from storage
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        $estudiante = Estudiante::find($id);
        $estudiante->cedula = $request->input('cedula');
        $estudiante->nombres = $request->input('nombres');
        $estudiante->apellidos = $request->input('apellidos');
        $estudiante->email = $request->input('email');
        $estudiante->edad = $request->input('edad');

        $estudiante->save();

        return back();
    }
}
