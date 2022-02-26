<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Kecamatan extends Model
{

    protected $fillable = ['nama'];
    protected $table = 'kecamatan';

} 

