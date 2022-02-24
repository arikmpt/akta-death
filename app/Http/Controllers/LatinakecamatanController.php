<?php

namespace App\Http\Controllers;

use App\Latinakecamatan;
use App\Latinakel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class LatinakecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latinakel = Latinakel::all();
        $latinakecamatan = Latinakecamatan::paginate(10);
        return view('admin.latinakecamatan.index', compact('latinakecamatan','latinakel'));
    }

    
   public function search(Request $request)
    {
        $search =$request->get('search');
        $latinakecamatan = Latinakecamatan::where('id_latinakel','LIKE',"%" .$search. "%")->orWhere('nik','LIKE',"%" .$search. "%")->paginate(10);
        return view('admin.latinakecamatan.index',compact('latinakecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $latinakel = Latinakel::all(); 
        $latinakecamatan = Latinakecamatan::all();
        return view('admin.latinakecamatan.create', compact('latinakecamatan','latinakel'));
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
            'nik' => 'required|unique:latinakecamatan|max:100',

        ]);

        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        

        $latinakecamatan = Latinakecamatan::create([
            'latinakel' => $request->latinakel,
            'nama_jenazah' => $request->nama_jenazah,
            'jenis_kelamin' => $request->jenis_kelamin,        
            'tanggal_kematian' => $request->tanggal_kematian,
            'anak_ke' => $request->anak_ke,
            'nik' => $request->nik,
            'nokk' => $request->nokk,
            'status_keluarga' => $request->status_keluarga,
            'gambar' => 'public/uploads/latinakecamatan/'.$new_gambar,
        ]);
        //$datakematian->tags()->attach($request->tags);
          $gambar->move('public/uploads/latinakecamatan/', $new_gambar);
        
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
        
         $latinakel = Latinakel::all();
        $latinakecamatan = Latinakecamatan::findorfail($id);
        return view('admin.latinakecamatan.edit', compact('latinakecamatan', 'latinakel')); 
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
            'nik' => 'required|unique:latinakecamatan|max:100',

        ]);
        
        $latinakecamatan = Latinakecamatan::find($id);

        $baratkecamatan_data = [
           'baratkel' => $request->baratkel,
            'nama_jenazah' => $request->nama_jenazah,
            'jenis_kelamin' => $request->jenis_kelamin,        
            'tanggal_kematian' => $request->tanggal_kematian,
            'anak_ke' => $request->anak_ke,
            'nik' => $request->nik,
            'nokk' => $request->nokk,
            'status_keluarga' => $request->status_keluarga,
            'gambar' => 'public/uploads/latinakecamatan/'.$new_gambar,
            ];      


        //$post->tags()->sync($request->tags);
        $latinakecamatan->update($latinakecamatan_data);
 
        
        return redirect()->route('latinakecamatan.index')->with('success','Postingan anda berhasil diupdate'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $latinakecamatan = Latinakecamatan::findorfail($id);
        $latinakecamatan->delete();

        return redirect()->back()->with('success','baratkecamatan Berhasil Dihapus');
    }
}
