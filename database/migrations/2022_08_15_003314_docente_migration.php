<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocenteMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userid');
            $table->string('folio');
            $table->string('licenciatura');
            $table->boolean('maestria');
            $table->integer('maestria_cantidad');
            $table->string('maestria_nombre');
            $table->boolean('doctorado');
            $table->integer('doctorado_cantidad');
            $table->string('doctorado_nombre');
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
        Schema::dropIfExists('docentes');
    }
}
