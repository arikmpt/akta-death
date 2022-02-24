<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtarakecamatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utarakecamatan', function (Blueprint $table) {
           $table->Increments('id');
            $table->integer('id_utarakel')->unsigned()->nullable();
            $table->string('nama_jenazah')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->date('tanggal_kematian')->nullable();
            $table->integer('anak_ke')->nullable();
            $table->string('nik')->nullable();
            $table->string('nokk')->nullable();
            $table->string('status_keluarga')->nullable();
            $table->string('gambar')->nullable();
            $table->foreign('id_utarakel')->references('id')->on('utarakel')->onDelete('cascade');
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
        Schema::dropIfExists('utarakecamatan');
    }
}
