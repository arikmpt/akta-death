<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timurkecamatan extends Model
{
    protected $fillable =['id_timurkel','nama_jenazah','jenis_kelamin','tanggal_kematian','anak_ke','nik','nokk','status_keluarga','gambar'];
    protected $table = 'timurkecamatan';

    public function timurkel(){
        return $this->belongsTo(\App\Timurkel::class,'id_timurkel','id');
}
}
