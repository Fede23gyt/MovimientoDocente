<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
/****** INERTIA NECSITA ESTOS *****/
use Inertia\Inertia;
use Illuminate\Support\facades\Redirect;
/**********************************/

class DepartamentoController extends Controller
{

    public function index()
    {
      $departamentos = Departamento::all();
      /* Envio para renderizar el componerte(que es una plantilla) y el arreglo de departamentos */
      return Inertia::render('Departamentos/Mostrar',['departamentos' => $departamentos]);
    }


    public function create()
    {
      /* llamamos a una plantilla parta la carga del departamento, no se le pasa nada porque es para grabar uno nuevo */
      return Inertia::render('Departamentos/FrmNuevo');

    }


    public function store(Request $request)
    {
      //Validaciones
      $request->validate([
        'nombre'=>'required'
      ]);

      Departamento::create($request->all());
      return Redirect::route('departamentos.index');

    }


    public function show(Departamento $departamento)
    {
        //
    }

    public function edit(Departamento $departamento)
    {
      return Inertia::render('Departamentos/FrmEditar',['departamento' => $departamento]);
    }

    public function update(Request $request, Departamento $departamento)
    {
      $departamento->update($request->all());
      return Redirect::route('departamentos.index');
    }

    public function destroy(Departamento $departamento)
    {
      $departamento->delete();
      return Redirect::route('departamentos.index');
    }
}
