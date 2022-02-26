<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Kelurahan extends Model
{

    protected $fillable = ['nama','kecamatan_id'];
    protected $table = 'kelurahan';

} 

