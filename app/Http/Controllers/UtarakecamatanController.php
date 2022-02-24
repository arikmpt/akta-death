<?php

namespace App\Http\Controllers;

use App\Utarakecamatan;
use App\utarakel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class UtarakecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $baratkel = Baratkel::paginate(10);
        //return view('admin.baratkel.index', compact('baratkel'));

        $utarakel = Utarakel::all();
        $utarakecamatan = Utarakecamatan::paginate(10);
        return view('admin.utarakecamatan.index', compact('utarakecamatan','utarakel'));
    }

     public function search(Request $request)
    {
        $search =$request->get('search');
        $utarakecamatan = Utarakecamatan::where('id_utarakel','LIKE',"%" .$search. "%")->orWhere('nik','LIKE',"%" .$search. "%")->paginate(100);
        return view('admin.utarakecamatan.index',compact('utarakecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $utarakel = Utarakel::all(); 
        $utarakecamatan = Utarakecamatan::all();
        return view('admin.utarakecamatan.create', compact('utarakecamatan','utarakel'));
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
            'nik' => 'required|unique:utarakecamatan|max:100',

        ]);

        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        

        $utarakecamatan = Utarakecamatan::create([
            'utarakel' => $request->utarakel,
            'nama_jenazah' => $request->nama_jenazah,
            'jenis_kelamin' => $request->jenis_kelamin,        
            'tanggal_kematian' => $request->tanggal_kematian,
            'anak_ke' => $request->anak_ke,
            'nik' => $request->nik,
            'nokk' => $request->nokk,
            'status_keluarga' => $request->status_keluarga,
            'gambar' => 'public/uploads/utarakecamatan/'.$new_gambar,
        ]);
        //$datakematian->tags()->attach($request->tags);
          $gambar->move('public/uploads/utarakecamatan/', $new_gambar);
        
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
        $utarakel =Utarakel::all();
        $utarakecamatan = Utarakecamatan::findorfail($id);
        return view('admin.utarakecamatan.edit', compact('utarakecamatan', 'utarakel')); 
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
            'nik' => 'required|unique:utarakecamatan|max:100',

        ]);
        
        $timurkecamatan = Utarakecamatan::find($id);

        $utarakecamatan_data = [
           'utarakel' => $request->utarakel,
            'nama_jenazah' => $request->nama_jenazah,
            'jenis_kelamin' => $request->jenis_kelamin,        
            'tanggal_kematian' => $request->tanggal_kematian,
            'anak_ke' => $request->anak_ke,
            'nik' => $request->nik,
            'nokk' => $request->nokk,
            'status_keluarga' => $request->status_keluarga,
            'gambar' => 'public/uploads/utarakecamatan/'.$new_gambar,
            ];      


        //$post->tags()->sync($request->tags);
        $utarakecamatan->update($utarakecamatan_data);
 
        
        return redirect()->route('utarakecamatan.index')->with('success','Postingan anda berhasil diupdate'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $utarakecamatan = Utarakecamatan::findorfail($id);
        $utarakecamatan->delete();

        return redirect()->back()->with('success','utarakecamatan Berhasil Dihapus');
    }
}
