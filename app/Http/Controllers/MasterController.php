<?php

namespace App\Http\Controllers;

use App\laporan;
use App\kategori;
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
}
