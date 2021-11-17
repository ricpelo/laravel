<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emple', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamp('fecha_alt')->nullable();
            $table->decimal('salario', 6, 2);
            $table->foreignId('depart_id')->constrained('depart');
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
        Schema::dropIfExists('emple');
    }
}
