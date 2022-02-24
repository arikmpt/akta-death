<?php

namespace App\Http\Controllers;

use App\Selatankecamatan;
use App\Selatankel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class SelatankecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $selatankel = Selatankel::paginate(5);
        $selatankecamatan = Selatankecamatan::paginate(10);
        return view('admin.selatankecamatan.index', compact('selatankecamatan','selatankel'));
    }

     public function search(Request $request)
    {
        $search =$request->get('search');
        $selatankecamatan = Selatankecamatan::where('id_selatankel','LIKE',"%" .$search. "%")->orWhere('nik','LIKE',"%" .$search. "%")->paginate(100);
        return view('admin.selatankecamatan.index',compact('selatankecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $selatankel = Selatankel::all(); 
        $selatankecamatan = Selatankecamatan::all();
        return view('admin.selatankecamatan.create', compact('selatankecamatan','selatankel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'nik' => 'required|unique:selatankecamatan|max:100',

        ]);

        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        

        $selatankecamatan = Selatankecamatan::create([
            'selatankel' => $request->selatankel,
            'nama_jenazah' => $request->nama_jenazah,
            'jenis_kelamin' => $request->jenis_kelamin,        
            'tanggal_kematian' => $request->tanggal_kematian,
            'anak_ke' => $request->anak_ke,
            'nik' => $request->nik,
            'nokk' => $request->nokk,
            'status_keluarga' => $request->status_keluarga,
            'gambar' => 'public/uploads/selatankecamatan/'.$new_gambar,
        ]);
        //$datakematian->tags()->attach($request->tags);
          $gambar->move('public/uploads/selatankecamatan/', $new_gambar);
        
        return redirect()->back()->with('success','Postingan anda berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
         $selatankel = Latinakel::all();
        $selatankecamatan = Selatankecamatan::findorfail($id);
        return view('admin.selatankecamatan.edit', compact('selatankecamatan', 'selatankel')); 
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
            'nik' => 'required|unique:selatankecamatan|max:100',

        ]);
        
        $selatankecamatan = Selatankecamatan::find($id);

        $baratkecamatan_data = [
           'baratkel' => $request->baratkel,
            'nama_jenazah' => $request->nama_jenazah,
            'jenis_kelamin' => $request->jenis_kelamin,        
            'tanggal_kematian' => $request->tanggal_kematian,
            'anak_ke' => $request->anak_ke,
            'nik' => $request->nik,
            'nokk' => $request->nokk,
            'status_keluarga' => $request->status_keluarga,
            'gambar' => 'public/uploads/selatankecamatan/'.$new_gambar,
            ];      


        //$post->tags()->sync($request->tags);
        $selatankecamatan->update($selatankecamatan_data);
 
        
        return redirect()->route('selatankecamatan.index')->with('success','Postingan anda berhasil diupdate'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $selatankecamatan = Selatankecamatan::findorfail($id);
        $selatankecamatan->delete();

        return redirect()->back()->with('success','baratkecamatan Berhasil Dihapus');
    }
}
