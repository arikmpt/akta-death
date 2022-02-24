<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baratkecamatan extends Model
{
     protected $fillable =['id_baratkel','nama_jenazah','jenis_kelamin','tanggal_kematian','anak_ke','nik','nokk','status_keluarga','gambar'];
    protected $table = 'baratkecamatan';

    public function baratkel(){
        return $this->belongsTo(\App\Baratkel::class,'id_baratkel','id');
}
}
