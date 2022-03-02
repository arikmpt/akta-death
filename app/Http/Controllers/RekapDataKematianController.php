<?php

namespace App\Http\Controllers;

use App\Datakematian;
use App\Kecamatan;
use App\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use NumberToWords\NumberToWords;

class RekapDataKematianController extends Controller
{
    public function index($kecamatan_id)
    {
        
        $datakematian = Datakematian::where('kecamatan_id', $kecamatan_id)->paginate(100);
        $kecamatan = Kecamatan::where('id', $kecamatan_id)->first();
        return view('admin.rekapdatakematian.index', compact('datakematian','kecamatan'));

    }

    public function search($kecamatan_id, Request $request)
    {
        $search =$request->get('search');
        $datakematian = Datakematian::where('kecamatan_id', $kecamatan_id)->orWhere(function($query) use ($search) {
            $query->where('nama','LIKE',"%" .$search. "%")->orWhere('nik','LIKE',"%" .$search. "%");
        })->paginate(100);
        $kecamatan = Kecamatan::where('id', $kecamatan_id)->first();
        return view('admin.rekapdatakematian.index',compact('datakematian','kecamatan'));
    }
}
