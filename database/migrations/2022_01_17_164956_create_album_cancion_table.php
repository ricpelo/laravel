<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Grammars\Grammar;
use Illuminate\Support\Facades\Schema;

class CreateAlbumCancionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_cancion', function (Blueprint $table) {
            Grammar::macro('typeInterval', function () {
                return 'interval';
            });

            $table->foreignId('album_id')->constrained('albumes');
            $table->foreignId('cancion_id')->constrained('canciones');
            $table->addColumn('interval', 'duracion');
            $table->primary(['album_id', 'cancion_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('album_cancion');
    }
}
