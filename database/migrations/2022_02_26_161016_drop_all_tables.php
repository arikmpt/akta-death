<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('baratkecamatan');
        Schema::dropIfExists('baratkel');
        Schema::dropIfExists('kecamatan');
        Schema::dropIfExists('kelurahan');
        Schema::dropIfExists('latinakecamatan');
        Schema::dropIfExists('latinakel');
        Schema::dropIfExists('selatanecamatan');
        Schema::dropIfExists('selatankecamatan');
        Schema::dropIfExists('selatankel');
        Schema::dropIfExists('timurkecamatan');
        Schema::dropIfExists('timurkel');
        Schema::dropIfExists('utarakecamatan');
        Schema::dropIfExists('utarakel');
        Schema::dropIfExists('datakematian');
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
