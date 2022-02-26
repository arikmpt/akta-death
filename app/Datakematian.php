<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


class Datakematian extends Model
{

    protected $fillable = ['kecamatan_id','kelurahan_id','nama','jenis_kelamin','tanggal_kematian','anak_ke','nik','nokk','status_keluarga','gambar'];
    protected $table = 'datakematian';

} 

