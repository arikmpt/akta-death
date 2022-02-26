<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecreateDataKematianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('kecamatan')) {
            Schema::create('kecamatan', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('nama')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('kelurahan')) {
            Schema::create('kelurahan', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('nama')->nullable();
                $table->unsignedBigInteger('kecamatan_id');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('datakematian')) {
            Schema::create('datakematian', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('kecamatan_id');
                $table->unsignedBigInteger('kelurahan_id');
                $table->string('nama')->nullable();
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
