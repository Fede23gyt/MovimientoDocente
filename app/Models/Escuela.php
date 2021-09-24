<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Escuela extends Model
{
    use HasFactory;
    protected $table = 'escuelas';
    protected $fillable = ['numero','nombre','departamento_id'];

  public function Departamento(){
    return $this->belongsTo('App\Models\Departamento', 'departamento_id' , 'id' );
    }
}
