<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAfiliacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afiliaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('afiliado_id');
            $table->foreign('afiliado_id')->references('id')->on('afiliados');
            $table->unsignedBigInteger('escuela_id');
            $table->foreign('escuela_id')->references('id')->on('escuelas');
            $table->integer('numero_escuela')->nullable();
            $table->unsignedBigInteger('nivel_id');
            $table->foreign('nivel_id')->references('id')->on('niveles');
            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->string('cargo');
            $table->integer('revista'); // 1:Titular -- 2:Interino -- 3:Suplente
            $table->date('fecha_ingreso_docencia')->nullable();

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
        Schema::dropIfExists('afiliaciones');
    }
}
