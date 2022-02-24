<?php

namespace App\Http\Controllers;


use App\Selatankel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SelatankelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $selatankel = Selatankel::paginate(10);
        return view('admin.selatankel.index', compact('selatankel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.selatankel.create');
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
        ]);

        $selatankel = Selatankel::create([
            'selatankel' => $request->selatankel

        ]);

        return redirect()->back()->with('success','selatankel Berhasil Disimpan');
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
        $selatankel = Selatankel::findorfail($id);
        return view('admin.selatankel.edit', compact('selatankel'));
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
            
        ]);
         $selatankel = [
            'selatankel' => $request->selatankel,
        ];

        Selatankel::whereId($id)->update($selatankel);

        return redirect()->route('selatankel.index')->with('success','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $selatankel = Selatankel::findorfail($id);
        $selatankel->delete();

        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }
}
