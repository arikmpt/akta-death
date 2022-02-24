<?php

namespace App\Http\Controllers;

use App\Datakematian;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use NumberToWords\NumberToWords;

class DatakematianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
           $datakematian = Datakematian::paginate(100);
       return view('admin.datakematian.index', compact('datakematian'));

    }

    public function search(Request $request)
    {
        $search =$request->get('search');
        $datakematian = Datakematian::where('kelurahan','LIKE',"%" .$search. "%")->orWhere('nik','LIKE',"%" .$search. "%")->paginate(100);
        return view('admin.datakematian.index',compact('datakematian'));
    }


        //public function cetak(Request $request)
        //{
        //$datakematian = $this->mysql->conn;
       // $sql = "SELECT * FROM datakematian";
        //if($id != null){
            //$sql .= " WHERE datakematian";
       // }
        //$query = $datakematian->query($sql) or die ($datakematian->error);
        //return $datakematian;
        //}

    public function cetakagustus()
   {
        $cetakagustus = Datakematian::get();
        return view('admin.Datakematian.cetak-agustus', compact('cetakagustus'));
    } 

public function cetaksuarti($id)
   {
        $data = Datakematian::findOrFail($id);
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('id');
        $numberTransformeren = $numberToWords->getNumberTransformer('en');

        return view('admin.Datakematian.cetak-suarti', compact('data','numberTransformer','numberTransformeren'));
    } 
//public function cetak()
   //{
        //$cetak = Datakematian::get();
        //return view('admin.Datakematian.cetak', compact('cetak'));
    //} 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datakematian = Datakematian::all();
        return view('admin.datakematian.create', compact('datakematian'));
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
            'kelurahan' => 'required',
            'nama_jenazah' => 'required',
            'nik' => 'required|unique:datakematian|max:20',
            'nokk' => 'required|unique:datakematian|max:20',
            'gambar' => 'required',

        ];

        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        $this->validate($request,$rule);

        $datakematian = Datakematian::create([
            'kelurahan' => $request->kelurahan,
            'nama_jenazah' => $request->nama_jenazah,
            'jenis_kelamin' => $request->jenis_kelamin,        
            'tanggal_kematian' => $request->tanggal_kematian,
            'anak_ke' => $request->anak_ke,
            'nik' => $request->nik,
            'nokk' => $request->nokk,
            'status_keluarga' => $request->status_keluarga,
            'gambar' => 'public/uploads/datakematian/'.$new_gambar,
        ]);
        //$datakematian->tags()->attach($request->tags);
          $gambar->move('public/uploads/datakematian/', $new_gambar);
        
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
        $datakematian = Datakematian::findorfail($id);
        return view('admin.datakematian.edit', compact('datakematian')); 
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
            'kelurahan' => 'required',
            'nama_jenazah' => 'required',
        ]);
       
       $datakematian = Datakematian::findorfail($id);
            if($request->has('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('public/uploads/datakematian/', $new_gambar); 
        }

        $datakematian_data = [
           'kelurahan' => $request->kelurahan,
            'nama_jenazah' => $request->nama_jenazah,
            'jenis_kelamin' => $request->jenis_kelamin,        
            'tanggal_kematian' => $request->tanggal_kematian,
            'anak_ke' => $request->anak_ke,
            'nik' => $request->nik,
            'nokk' => $request->nokk,
            'status_keluarga' => $request->status_keluarga,
            'gambar' => 'public/uploads/datakematian/'.$new_gambar,
            ];      

            
        
        Datakematian::whereId($id)->update($datakematian_data);
 
        
        return redirect()->route('datakematian.index')->with('success','Postingan anda berhasil diupdate'); 
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * /@return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datakematian = Datakematian::findorfail($id);
        $datakematian->delete();
        return redirect()->back()->with('success','datakematian Berhasil Dihapus (Silahkan cek trashed datakematian)');
    }
}
