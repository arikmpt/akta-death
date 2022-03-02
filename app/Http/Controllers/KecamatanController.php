<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use NumberToWords\NumberToWords;
use App\Kecamatan;

class KecamatanController extends Controller
{
    public function index(Request $request)
    {
        $data = Kecamatan::paginate(10);
        return view('admin.kecamatan.index', compact('data'));
    }

    public function search(Request $request)
    {
        $search =$request->get('search');
        $data = Kecamatan::where('nama','LIKE',"%" .$search. "%")->paginate(10);
        return view('admin.kecamatan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kecamatan.create');
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

        $data = Kecamatan::create([
            'nama' => $request->nama
        ]);

        return redirect()->route('kecamatan.index')->with('success','Data anda berhasil disimpan');
    }


    public function edit($id)
    {
        $data = Kecamatan::findorfail($id);
        return view('admin.kecamatan.edit', compact('data')); 
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
        ];      

        Kecamatan::whereId($id)->update($data);

        return redirect()->route('kecamatan.index')->with('success','Postingan anda berhasil diupdate'); 
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * /@return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kecamatan::findorfail($id);
        $data->delete();
        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }
}
