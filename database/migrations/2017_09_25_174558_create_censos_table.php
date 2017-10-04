<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCensosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('censos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('perdida');
            $table->dateTime('fecha_visita');
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->integer('estado');
            $table->integer('municipio');
            $table->integer('localidad');
            $table->string('direccion');
            $table->string('referencia1');
            $table->string('referencia2');
            $table->string('telefono_fijo');
            $table->string('telefono_movil');
            $table->integer('habitantes');
            $table->integer('pisos');
            $table->dateTime('fecha_incidencia');
            $table->string('nombre_encuestador');
            $table->string('apellido1_encuestador');
            $table->string('apellido2_encuestador');
            $table->double('coordenada_x', 15, 8);
            $table->double('coordenada_y', 15, 8);
            $table->rememberToken();
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
        Schema::dropIfExists('censos');
    }
}
