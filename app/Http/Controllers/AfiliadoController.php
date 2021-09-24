<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Escuela;
use App\Models\Departamento;

/****** INERTIA NECESITA ESTOS *****/
use Inertia\Inertia;
use Illuminate\Support\facades\Redirect;

class AfiliadoController extends Controller
{
  public function index()
    {
      $escuelas = Escuela::all();
      /* Envio para renderizar el componerte(que es una plantilla) y el arreglo de departamentos */
      //$escuelas = Escuela::all()->Departamentos();
      $escuelas = Escuela::with('Departamento')->get();
      return Inertia::render('Escuelas/Mostrar',['escuelas' => $escuelas]);
    }


    public function create()
    {
      /* llamamos a una plantilla parta la carga del departamento, no se le pasa nada porque es para grabar uno nuevo */
      $list_departamentos = Departamento::all();
      return Inertia::render('Escuelas/FrmNuevo',['list_departamentos' => $list_departamentos]);

    }


    public function store(Request $request)
    {
      //Validaciones
      $request->validate([

        'nombre'=>'required',
        'departamento_id'=>'required'
      ]);
      Escuela::create($request->all());
      return Redirect::route('escuelas.index');
    }

    public function edit(Escuela $escuela)
    {
      //$escuela = Escuela::with('Departamento')-get();
      return Inertia::render('Escuelas/FrmEditar',['escuela' => $escuela]);
    }

    public function update(Request $request, Escuela $escuela)
    {
      $escuela->update($request->all());
      return Redirect::route('escuela.index');
    }

    public function destroy(Escuela $escuela)
    {
      $escuela->delete();
      return Redirect::route('escuela.index');
    }

}
