<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('foliodom');
            $table->integer('plantas');
            $table->string('muro');
            $table->string('techo');
            $table->string('piso');
            $table->string('agua');
            $table->string('drenaje');
            $table->string('bano');
            $table->string('energia');
            $table->integer('habitantes');
            $table->string('clasificacion');
            $table->string('dano_total');
            $table->string('dano_parcial');
            $table->string('dano_menor');
            $table->integer('afectacion');
            $table->string('demolida');
            $table->string('demolida_tipo');
            $table->string('limpia');
            $table->string('limpia_tipo');
            $table->string('escombros');
            $table->string('escombros_tipo');
            $table->integer('total_escombros');
            $table->string('escombros_deposito');
            $table->string('brigadista');        
            $table->integer('censo_id')->unsigned();
            $table->foreign('censo_id')->references('id')->on('censos');
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
        Schema::dropIfExists('estudios');
    }
}
