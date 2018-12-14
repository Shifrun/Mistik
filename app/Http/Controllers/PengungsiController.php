<?php

namespace App\Http\Controllers;

use App\Pengungsi;
use Illuminate\Http\Request;

class PengungsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengungsi = Pengungsi::latest()->paginate(5);

        return view('pengungsi.index',compact('pengungsi'))->with('i',(request()->input('page',1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pengungsi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
          'nama_pengungsian' => 'required',
          'jumlah_pengungsi' => 'required',
          'alamat' => 'required',
          'daerah' => 'required',
          'lat' => 'required',
          'lng' => 'required'
        ]);

        Pengungsi::create($request->all());

        return redirect()->route('pengungsi.index')->with('success','Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pengungsi $pengungsi)
    {
        return view('pengungsi.show',compact('pengungsi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengungsi $pengungsi)
    {
        return view('pengungsi.edit',compact('pengungsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengungsi $pengungsi)
    {
        //
        $request->validate([
          'nama_pengungsian' => 'required',
          'jumlah_pengungsi' => 'required',
          'alamat' => 'required',
          'daerah' => 'required',
          'lat' => 'required',
          'lng' => 'required'
        ]);

        $pengungsi->update($request->all());

        return redirect()->route('pengungsi.index')->with('success','Data berhasil disunting.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengungsi $pengungsi)
    {
        //
        $pengungsi->delete();

        return redirect()->route('pengungsi.index')->with('success','Data berhasil dihapus.');
    }
}
