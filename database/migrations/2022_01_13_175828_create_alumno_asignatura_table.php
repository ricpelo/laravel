<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoAsignaturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_asignatura', function (Blueprint $table) {
            $table->foreignId('alumno_id')->constrained();
            $table->foreignId('asignatura_id')->constrained();
            $table->timestamps();
            $table->primary(['alumno_id', 'asignatura_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno_asignatura');
    }
}
