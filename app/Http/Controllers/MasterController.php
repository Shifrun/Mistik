<?php

namespace App\Http\Controllers;

use DB;
use App\Laporan;
use App\Kategori;
use App\Pengungsi;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    //
    public function laporan(){
      $kategori = Kategori::all();
      return view('laporkan', compact('kategori'));
    }

    public function store_laporan(Request $request){
        //
        $request->validate([
          'nama_pelapor' => 'required',
          'kontak' => 'required',
          'lokasi' => 'required',
          'kategori_kebutuhan' => 'required',
          'catatan' => 'required',
        ]);

        Laporan::create($request->all());
        // echo $request;
        // die;
        return redirect()->route('/')->with('success','Data berhasil ditambahkan.');
    }

    public function map(){
      $markers = Pengungsi::all();

      $markers = DB::table('pengungsis')
                    ->join('laporans','laporans.lokasi','=','pengungsis.id')
                    ->join('kategoris','laporans.kategori_kebutuhan','=','kategoris.id')
                    ->select('pengungsis.*','laporans.*','kategoris.*')
                    ->get();

      // dd($markers);

      return view('pengungsi.map', compact('markers'));
    }
}
