<?php

namespace App\Http\Controllers;

use App\Timurkecamatan;
use App\Timurkel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class TimurkecamatanController extends Controller
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

        $timurkel = Timurkel::all();
        $timurkecamatan = Timurkecamatan::paginate(10);
        return view('admin.timurkecamatan.index', compact('timurkecamatan','timurkel'));
    }

     public function search(Request $request)
    {
        $search =$request->get('search');
        $timurkecamatan = Timurkecamatan::where('id_timurkel','LIKE',"%" .$search. "%")->orWhere('nik','LIKE',"%" .$search. "%")->paginate(100);
        return view('admin.timurkecamatan.index',compact('timurkecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $timurkel = Timurkel::all(); 
        $timurkecamatan = Timurkecamatan::all();
        return view('admin.timurkecamatan.create', compact('timurkecamatan','timurkel'));
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
            'nik' => 'required|unique:timurkecamatan|max:100',

        ]);

        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        

        $timurkecamatan = Timurkecamatan::create([
            'timurkel' => $request->timurkel,
            'nama_jenazah' => $request->nama_jenazah,
            'jenis_kelamin' => $request->jenis_kelamin,        
            'tanggal_kematian' => $request->tanggal_kematian,
            'anak_ke' => $request->anak_ke,
            'nik' => $request->nik,
            'nokk' => $request->nokk,
            'status_keluarga' => $request->status_keluarga,
            'gambar' => 'public/uploads/timurkecamatan/'.$new_gambar,
        ]);
        //$datakematian->tags()->attach($request->tags);
          $gambar->move('public/uploads/timurkecamatan/', $new_gambar);
        
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
        $timurkel = Timurkel::all();
        $timurkecamatan = Timurkecamatan::findorfail($id);
        return view('admin.timurkecamatan.edit', compact('timurkecamatan', 'timurkel')); 
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
            'nik' => 'required|unique:timurkecamatan|max:100',

        ]);
        
        $timurkecamatan = Timurkecamatan::find($id);

        $timurkecamatan_data = [
           'timurkel' => $request->timurkel,
            'nama_jenazah' => $request->nama_jenazah,
            'jenis_kelamin' => $request->jenis_kelamin,        
            'tanggal_kematian' => $request->tanggal_kematian,
            'anak_ke' => $request->anak_ke,
            'nik' => $request->nik,
            'nokk' => $request->nokk,
            'status_keluarga' => $request->status_keluarga,
            'gambar' => 'public/uploads/timurkecamatan/'.$new_gambar,
            ];      


        //$post->tags()->sync($request->tags);
        $timurkecamatan->update($timurkecamatan_data);
 
        
        return redirect()->route('timurkecamatan.index')->with('success','Postingan anda berhasil diupdate'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timurkecamatan = Timurkecamatan::findorfail($id);
        $timurkecamatan->delete();

        return redirect()->back()->with('success','timurkecamatan Berhasil Dihapus');
    }
}
