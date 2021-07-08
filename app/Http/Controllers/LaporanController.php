<?php

namespace App\Http\Controllers;

use DB;
use App\Laporan;
use App\Kategori;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $laporan = laporan::latest()->paginate(5);
        $laporan = DB::table('laporans')
                      ->join('pengungsis','laporans.lokasi','=','pengungsis.id')
                      ->select('laporans.*','pengungsis.nama_pengungsian as lokasi_pengungsian')
                      ->paginate('5');

        return view('laporan.index',compact('laporan'))->with('i',(request()->input('page',1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        return view('laporan.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
        $request->validate([
          'nama_pelapor' => 'required',
          'kontak' => 'required',
          'lokasi' => 'required',
          'kategori_kebutuhan' => 'required',
          'stok_kebutuhan' => 'required',
          'kategori_logistik' => 'required',
          'catatan' => 'required',
        ]);

        Laporan::create($request->all());

        return redirect()->route('laporan.index')->with('success','Data berhasil ditambahkan.');
    }

    public function store2(Request $request){
        //
        $request->validate([
          'nama_pelapor' => 'required',
          'kontak' => 'required',
          'lokasi' => 'required',
          'kategori_kebutuhan' => 'required',
          'stok_kebutuhan' => 'required',
            'kategori_logistik' => 'required',
          'catatan' => 'required',
        ]);

        Laporan::create($request->all());
        // echo $request;
        // die;
        return redirect()->action('MasterController@laporan')->with('success','Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        return view('laporan.show',compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        $kategori = Kategori::all();
        return view('laporan.edit',compact('laporan','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
        $request->validate([
          'nama_pelapor' => 'required',
          'kontak' => 'required',
          'lokasi' => 'required',
          'stok_kebutuhan' => 'required',
          'kategori_kebutuhan' => 'required',
            'kategori_logistik' => 'required',
          'catatan' => 'required',
        ]);

        $laporan->update($request->all());

        return redirect()->route('laporan.index')->with('success','Data berhasil disunting.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
      $laporan->delete();

      return redirect()->route('laporan.index')->with('success','Data berhasil dihapus.');
    }
}
