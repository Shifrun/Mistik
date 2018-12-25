<?php

namespace App\Http\Controllers;

use DB;
use App\Donasi;
use App\User;
use App\Pengungsi;
use App\Kategori;
use App\Logistik;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donasi = DB::table('donasis')
                      ->join('users','donasis.donatur','=','users.id')
                      ->join('logistiks','donasis.donatur','=','logistiks.sumber')
                      ->join('kategoris','kategoris.id','=','logistiks.kategori')
                      ->select('donasis.*','users.name','logistiks.nama','logistiks.stok','logistiks.kategori')
                      ->paginate('5');

        // dd($donasi);

        return view('donasi.index',compact('donasi'))->with('i',(request()->input('page',1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $lokasi = Pengungsi::all();
        $kategori = Kategori::all();
        $user = User::all();
        return view('donasi.create',compact('lokasi','kategori','user'));
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
          'donatur' => 'required',
          'kontak'  => 'required',
        ]);

        Donasi::create($request->all());

        $request->validate([
          'nama' => 'required',
          'stok' => 'required',
          'kadaluarsa' => 'required',
          'kategori' => 'required',
          'daerah' => 'required',
          'sumber' => 'required'
        ]);

        Logistik::create($request->all());

        return redirect()->route('donasi.index')->with('success','Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Donasi $donasi)
    {
        return view('donasi.show',compact('donasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Donasi $donasi)
    {
        return view('donasi.edit',compact('donasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donasi $donasi)
    {
        //
        $request->validate([
          'donatur' => 'required',
          'kontak'  => 'required',
        ]);

        $donasi->update($request->all());

        return redirect()->route('donasi.index')->with('success','Data berhasil disunting.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donasi $donasi)
    {
        //
        $donasi->delete();

        return redirect()->route('donasi.index')->with('success','Data berhasil dihapus.');
    }
}
