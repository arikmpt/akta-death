<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use NumberToWords\NumberToWords;
use App\Kecamatan;
use App\Kelurahan;

class KelurahanController extends Controller
{
    public function index(Request $request)
    {
        $data = Kelurahan::paginate(10);
        return view('admin.kelurahan.index', compact('data'));
    }

    public function search(Request $request)
    {
        $search =$request->get('search');
        $data = Kelurahan::where('nama','LIKE',"%" .$search. "%")->paginate(10);
        return view('admin.kelurahan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatans = Kecamatan::get();
        return view('admin.kelurahan.create',compact('kecamatans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule= [
            'nama' => 'required',
        ];

        $this->validate($request,$rule);

        $data = Kelurahan::create([
            'nama' => $request->nama,
            'kecamatan_id' => $request->kecamatan_id
        ]);

        return redirect()->route('kelurahan.index')->with('success','Data anda berhasil disimpan');
    }


    public function edit($id)
    {
        $data = Kelurahan::findorfail($id);
        $kecamatans = Kecamatan::get();
        return view('admin.kelurahan.edit', compact('data','kecamatans')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);
        

        $data = [
            'nama' => $request->nama,
            'kecamatan_id' => $request->kecamatan_id
        ];      

        Kelurahan::whereId($id)->update($data);

        return redirect()->route('kelurahan.index')->with('success','Postingan anda berhasil diupdate'); 
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * /@return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kelurahan::findorfail($id);
        $data->delete();
        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }
}
