<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProyectosMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->integer('docente_titularid');
            $table->boolean('docente_colaborador');
            $table->integer('docente_colaboradorid');
            $table->boolean('alumno_colaborador');
            $table->integer('alumno_colaboradorid');
            $table->string('descripcion');
            $table->date('fecha_inicio');
            $table->date('fecha_final');

            $table->string('ci01');
            $table->string('ci02');
            $table->string('avance_parcial');
            $table->string('avance_final');
            $table->string('ficha_tecnica');
            $table->string('presentacion_final');

            $table->boolean('liberado');
            $table->string('comentarios');

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
        Schema::dropIfExists('proyectos');
    }
}
