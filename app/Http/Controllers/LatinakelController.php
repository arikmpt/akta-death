<?php

namespace App\Http\Controllers;


use App\latinakel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LatinakelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latinakel = latinakel::paginate(10);
        return view('admin.latinakel.index', compact('latinakel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.latinakel.create');
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

        $latinakel = latinakel::create([
            'latinakel' => $request->latinakel

        ]);

        return redirect()->back()->with('success','latinakel Berhasil Disimpan');
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
        $latinakel = Latinakel::findorfail($id);
        return view('admin.latinakel.edit', compact('latinakel'));
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
         $latinakel = [
            'latinakel' => $request->latinakel,
        ];

        Latinakel::whereId($id)->update($latinakel);

        return redirect()->route('latinakel.index')->with('success','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $latinakel = Latinakel::findorfail($id);
        $latinakel->delete();

        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }
}
