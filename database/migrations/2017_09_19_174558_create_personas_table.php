<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('rfc');
            $table->string('curp');
            $table->string('calle');
            $table->string('num_exterior');
            $table->string('num_interior');
            $table->string('colonia');
            $table->string('codigo_postal', 10);
            $table->string('delegacion_municipio');
            $table->string('localidad');
            $table->string('estado_civil');
            $table->string('sexo');
            $table->string('nacionalidad');
            $table->string('telefono_fijo', 14);
            $table->string('telefono_movil', 14);
            $table->string('escolaridad');
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
        Schema::dropIfExists('personas');
    }
}
