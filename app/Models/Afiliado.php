<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afiliado extends Model
{
    use HasFactory;
    protected $table = 'afiliados';

    protected $fillable = ['nro_afiliado','fecha_carga','fecha_form','apellido','nombre','dni',
      'sexo','nacionalidad','domicilio','localidad','departamento_id','tel_fijo','te_cel',
      'estado','fecha_aceptacion'];


    public function Departamento(){
      return $this->belongsTo('App\Models\Departamento', 'departamento_id' , 'id' );
  }
}
