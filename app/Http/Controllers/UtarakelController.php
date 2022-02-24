<?php

namespace App\Http\Controllers;


use App\Utarakel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UtarakelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utarakel = Utarakel::paginate(9);
        return view('admin.utarakel.index', compact('utarakel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.utarakel.create');
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

        $utarakel = Utarakel::create([
            'utarakel' => $request->utarakel

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
        $utarakel = Utarakel::findorfail($id);
        return view('admin.utarakel.edit', compact('utarakel'));
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
         $utarakel = [
            'utarakel' => $request->utarakel,
        ];

        Utarakel::whereId($id)->update($utarakel);

        return redirect()->route('utarakel.index')->with('success','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $utarakel = Utarakel::findorfail($id);
        $utarakel->delete();

        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }
}
