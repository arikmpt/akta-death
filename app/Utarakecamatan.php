<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utarakecamatan extends Model
{
    protected $fillable =['id_utarakel','nama_jenazah','jenis_kelamin','tanggal_kematian','anak_ke','nik','nokk','status_keluarga','gambar'];
    protected $table = 'utarakecamatan';

    public function utarakel(){
        return $this->belongsTo(\App\Utarakel::class,'id_utarakel','id');
}
}
