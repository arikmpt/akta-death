<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Carbon;


class Datakematian extends Model
{

    protected $fillable = ['kelurahan','nama_jenazah','jenis_kelamin','tanggal_kematian','anak_ke','nik','nokk','status_keluarga','gambar'];
    protected $table = 'datakematian';


    //public function getCreateAtatribute()
    	//{
    		//return Carbon::parse($this->attributes['created_at']->transladesformat('d F Y'));

    	//}

    //public function kelurahan(){
        //return $this->belongsTo(\App\Kelurahan::class,'id_kelurahan','id');
    } 

