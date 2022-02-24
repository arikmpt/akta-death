<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Latinakecamatan extends Model
{
      protected $fillable =['id_latinakel','nama_jenazah','jenis_kelamin','tanggal_kematian','anak_ke','nik','nokk','status_keluarga','gambar'];
    protected $table = 'latinakecamatan';

    public function latinakel(){
        return $this->belongsTo(\App\Latinakel::class,'id_latinakel','id');
}
}
