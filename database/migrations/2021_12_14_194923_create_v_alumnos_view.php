<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateVAlumnosView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            <<<EOT
            CREATE VIEW v_alumnos AS
            SELECT alumno_id AS id, nombre, ce_id, MAX(nota) AS nota
            FROM notas JOIN alumnos a ON alumno_id = a.id
            GROUP BY alumno_id, nombre, ce_id;
            EOT
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS v_alumnos');
    }
}
