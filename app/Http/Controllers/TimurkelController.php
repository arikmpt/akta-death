<?php

namespace App\Http\Controllers;


use App\Timurkel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TimurkelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timurkel = Timurkel::paginate(30);
        return view('admin.timurkel.index', compact('timurkel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.timurkel.create');
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

        $timurkel = Timurkel::create([
            'timurkel' => $request->timurkel

        ]);

        return redirect()->back()->with('success','timurkel Berhasil Disimpan');
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
        $timurkel = Timurkel::findorfail($id);
        return view('admin.timurkel.edit', compact('timurkel'));
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
         $timurkel = [
            'timurkel' => $request->timurkel,
        ];

        Timurkel::whereId($id)->update($timurkel);

        return redirect()->route('timurkel.index')->with('success','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timurkel = Timurkel::findorfail($id);
        $timurkel->delete();

        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }
}
