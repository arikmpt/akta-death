<?php

namespace App\Http\Controllers;


use App\Baratkel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BaratkelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baratkel = Baratkel::paginate(30);
        return view('admin.baratkel.index', compact('baratkel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.baratkel.create');
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

        $baratkel = Baratkel::create([
            'baratkel' => $request->baratkel

        ]);

        return redirect()->back()->with('success','baratkel Berhasil Disimpan');
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
        $baratkel = Baratkel::findorfail($id);
        return view('admin.baratkel.edit', compact('baratkel'));
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
         $baratkel = [
            'baratkel' => $request->baratkel,
        ];

        Baratkel::whereId($id)->update($baratkel);

        return redirect()->route('baratkel.index')->with('success','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $baratkel = Baratkel::findorfail($id);
        $baratkel->delete();

        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }
}
