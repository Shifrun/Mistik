<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Pengungsi;
use App\Logistik;
use App\Kategori;
use Illuminate\Http\Request;

class LogistikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $logistiks = DB::table('logistiks')
                      ->join('kategoris','logistiks.kategori','=','kategoris.id')
                      ->join('pengungsis','logistiks.daerah','=','pengungsis.id')
                      ->join('users','logistiks.sumber','=','users.id')
                      ->select('logistiks.*','kategoris.kategori as nama_kategori','pengungsis.nama_pengungsian')
                      ->paginate('5');

        // dd($logistiks);

        return view('logistik.index',compact('logistiks'))->with('i',(request()->input('page',1) - 1) * 5);
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

        return view('logistik.create', compact('kategori','lokasi','user'));
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
          'nama' => 'required',
          'stok' => 'required',
          'kadaluarsa' => 'required',
          'kategori' => 'required',
          'daerah' => 'required',
        ]);

        Logistik::create($request->all());

        return redirect()->route('logistik.index')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\logistik  $logistik
     * @return \Illuminate\Http\Response
     */
    public function show(logistik $logistik)
    {
        return view('logistik.show',compact('logistik'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\logistik  $logistik
     * @return \Illuminate\Http\Response
     */
    public function edit(logistik $logistik)
    {
        $lokasi = Pengungsi::all();
        $kategori = Kategori::all();
        $user = User::all();
        return view('logistik.edit',compact('logistik','kategori','lokasi','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\logistik  $logistik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, logistik $logistik)
    {
        //
        $request->validate([
          'nama' => 'required',
          'stok' => 'required',
          'kadaluarsa' => 'required',
          'kategori' => 'required',
          'daerah' => 'required',
        ]);

        $logistik->update($request->all());

        return redirect()->route('logistik.index')->with('success','Data berhasil disunting.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\logistik  $logistik
     * @return \Illuminate\Http\Response
     */
    public function destroy(logistik $logistik)
    {
        //
        $logistik->delete();

        return redirect()->route('logistik.index')->with('success','Data berhasil dihapus.');
    }
}
