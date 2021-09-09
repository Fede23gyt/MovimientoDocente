<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAfiliadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afiliados', function (Blueprint $table) {
            $table->id();
            $table->integer('nro_afiliado')->nullable();
            $table->date('fecha');
            $table->string('apellido');
            $table->string('nombre');
            $table->bigInteger('dni')->unique();
            $table->string('sexo',1);
            $table->string('nacionalidad');
            $table->string('domicilio');
            $table->string('localidad');
            $table->unsignedBigInteger('departamento_id');
            $table->integer('tel_fijo');
            $table->integer('tel_cel');
            $table->integer('estado');    // 0:Inactivo ---- 1:Activo
            $table->date('fecha_aceptacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('afiliados');
    }
}
