<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Selatankecamatan extends Model
{
     protected $fillable =['id_selatankel','nama_jenazah','jenis_kelamin','tanggal_kematian','anak_ke','nik','nokk','status_keluarga','gambar'];
    protected $table = 'selatankecamatan';

    public function selatankel(){
        return $this->belongsTo(\App\Selatankel::class,'id_selatankel','id');
}
}
