<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('curso_id')->unsigned();
            $table->bigInteger('alumno_id')->unsigned();
            $table->string('mes');
            $table->string('anio');
            $table->foreign('curso_id')->references('id')->on('cursos')->cascadeOnDelete();
            $table->foreign('alumno_id')->references('id')->on('alumnos')->cascadeOnDelete();
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
        Schema::dropIfExists('asignaciones');
    }
}
