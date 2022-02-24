<?php

namespace App\Http\Controllers;

use App\Baratkecamatan;
use App\Baratkel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class BaratkecamatanController extends Controller
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

        $baratkecamatan = Baratkecamatan::paginate(10);
        $baratkel = Baratkel::all();
        return view('admin.baratkecamatan.index', compact('baratkecamatan','baratkel'));
    }

    public function search(Request $request)
    {
        $search =$request->get('search');
        $baratkecamatan = Baratkecamatan::where('id_baratkel','LIKE',"%" .$search. "%")->orWhere('nik','LIKE',"%" .$search. "%")->paginate(10);
        return view('admin.baratkecamatan.index',compact('baratkecamatan'));
    }


//public function search(Request $request)
   // {
       //// $baratkel = Bartkel::all();
        //$search_baratkel = $request->get('baratkel');
        //$search = $request->get('search');
        // dd($request->all());
        //if (!$search_baratkel || $search_baratkel == "") {
            // dd('satu');
            //$baratkecamatan = Baratkecamatan::where('umum','LIKE',"%" .$search. "%")->paginate(100);
       // }elseif(!$search || $search == ""){
            // dd('dua');
            //$baratkecamatan = Baratkecamatan::where('id_baratkel',$search_baratkel)->paginate(100);
       // }else{
            // dd('tiga');
            //$baratkecamatan = Baratkecamatan::where('id_baratkel',$search_baratkel)->where('nik','LIKE',"%" .$search. "%")->paginate(100);
       //}
       // dd($baratkecamatan->all());
         //$baratkecamatan = Datapersonel::where('id_baratkel','LIKE',"%" .$search_pangkat. "%")->orWhere('nik','LIKE',"%" .$search. "%")->paginate(100);

        //return view('admin.baratkecamatan.index',compact('baratkecamatan','baratkel', 'search','//search_baratkel'));

   // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $baratkel = Baratkel::all(); 
        $baratkecamatan = Baratkecamatan::all();
        return view('admin.baratkecamatan.create', compact('baratkecamatan','baratkel'));
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
            'nik' => 'required|unique:baratkecamatan|max:30',

        ]);

        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        

        $baratkecamatan = Baratkecamatan::create([
            'baratkel' => $request->baratkel,
            'nama_jenazah' => $request->nama_jenazah,
            'jenis_kelamin' => $request->jenis_kelamin,        
            'tanggal_kematian' => $request->tanggal_kematian,
            'anak_ke' => $request->anak_ke,
            'nik' => $request->nik,
            'nokk' => $request->nokk,
            'status_keluarga' => $request->status_keluarga,
            'gambar' => 'public/uploads/baratkecamatan/'.$new_gambar,
        ]);
        //$datakematian->tags()->attach($request->tags);
          $gambar->move('public/uploads/baratkecamatan/', $new_gambar);
        
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
        $baratkel = Baratkel::all();
        $baratkecamatan = Baratkecamatan::findorfail($id);
        return view('admin.baratkecamatan.edit', compact('baratkecamatan', 'baratkel')); 
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
            'nik' => 'required|unique:baratkecamatan|max:100',

        ]);
        
        $baratkecamatan = Baratkecamatan::find($id);

        $baratkecamatan_data = [
           'baratkel' => $request->baratkel,
            'nama_jenazah' => $request->nama_jenazah,
            'jenis_kelamin' => $request->jenis_kelamin,        
            'tanggal_kematian' => $request->tanggal_kematian,
            'anak_ke' => $request->anak_ke,
            'nik' => $request->nik,
            'nokk' => $request->nokk,
            'status_keluarga' => $request->status_keluarga,
            'gambar' => 'public/uploads/baratkecamatan/'.$new_gambar,
            ];      


        //$post->tags()->sync($request->tags);
        $baratkecamatan->update($baratkecamatan_data);
 
        
        return redirect()->route('baratkecamatan.index')->with('success','Postingan anda berhasil diupdate'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $baratkecamatan = Baratkecamatan::findorfail($id);
        $baratkecamatan->delete();

        return redirect()->back()->with('success','baratkecamatan Berhasil Dihapus');
    }
}
