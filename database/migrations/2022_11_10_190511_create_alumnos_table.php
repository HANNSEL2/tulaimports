<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('cui');
            $table->string('nombres');
            $table->string('apellidos');
            $table->bigInteger('sexo_id')->unsigned();
            $table->bigInteger('etnia_id')->unsigned();

            $table->string('telefono');
            $table->bigInteger('area_id')->unsigned();
            $table->bigInteger('distrito_id')->unsigned();
            $table->bigInteger('profesion_id')->unsigned();
            $table->bigInteger('cargo_id')->unsigned();

            $table->timestamps();

            $table->foreign('sexo_id')->references('id')->on('sexos')->cascadeOnDelete();
            $table->foreign('etnia_id')->references('id')->on('etnias')->cascadeOnDelete();
            $table->foreign('area_id')->references('id')->on('areasaluds')->cascadeOnDelete();
            $table->foreign('distrito_id')->references('id')->on('distritosaluds')->cascadeOnDelete();
            $table->foreign('profesion_id')->references('id')->on('profesiones')->cascadeOnDelete();
            $table->foreign('cargo_id')->references('id')->on('cargos')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
