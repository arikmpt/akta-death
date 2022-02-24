<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatakematianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datakematian', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('kelurahan')->nullable();
            $table->string('nama jenazah')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->date('tanggal_kematian')->nullable();
            $table->string('anak_ke')->nullable();
            $table->string('nik')->nullable();
            $table->string('nokk')->nullable();
            $table->string('status_keluarga')->nullable();
            $table->string('gambar')->nullable();
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
        Schema::dropIfExists('datakematian');
    }
}
