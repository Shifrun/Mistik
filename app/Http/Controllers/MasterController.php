<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Laporan;
use App\Kategori;
use App\Pengungsi;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    //
    public function home(){
      $laporan = DB::table('laporans')
                    ->join('kategoris','laporans.kategori_kebutuhan','=','kategoris.id')
                    ->select('laporans.*','kategoris.kategori as kategori')
                    ->latest()->limit('5')
                    ->get();

      $markers = DB::table('pengungsis')
                    ->join('laporans','laporans.lokasi','=','pengungsis.id')
                    ->join('kategoris','laporans.kategori_kebutuhan','=','kategoris.id')
                    ->select('pengungsis.*','laporans.*','kategoris.*')
                    ->get();

      return view('home', compact('laporan','markers'));
    }

    public function tentang(){
      return view('tentang');
    }

    public function laporan(){
      if(Auth::guest()){
        return redirect()->route('login')->with('success','Hanya Relawan terdaftar yang bisa melaporkan kebutuhan logistik.');
      }else{
        if(Auth::user()->user_type=='Donatur'){
          return redirect()->route('home')->with('success','Hanya Relawan terdaftar yang bisa melaporkan kebutuhan logistik.');
        }else{
          $kategori = Kategori::all();
          return view('laporkan', compact('kategori'));
        }
      }
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

    public function donasikan(){
      if(Auth::guest()){
        return redirect()->route('login')->with('success','Hanya Donatur terdaftar yang bisa melaporkan kebutuhan logistik.');
      }else{
        if(Auth::user()->user_type=='Relawan'){
          return redirect()->route('home')->with('success','Hanya Donatur terdaftar yang bisa melaporkan kebutuhan logistik.');
        }else{
          $kategori = Kategori::all();
          return view('donasikan', compact('kategori'));
        }
      }
    }

    public function store_donasikan(Request $request){
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

    public function dasbor(){
      $laporan = DB::table('laporans')
                    ->join('kategoris','laporans.kategori_kebutuhan','=','kategoris.id')
                    ->select('laporans.*','kategoris.kategori as kategori')
                    ->latest()
                    ->limit('5')
                    ->get();

      $logistiks = DB::table('logistiks')
                    ->join('kategoris','logistiks.kategori','=','kategoris.id')
                    ->select('logistiks.*','kategoris.kategori as nama_kategori')
                    ->latest()
                    ->limit('5')
                    ->get();

      $sum_logistik = DB::table('logistiks')
                        ->sum('stok');

      $count_pengungsian = DB::table('pengungsis')
                        ->count();

      $count_laporan = DB::table('laporans')
                        ->count();
      // dd($count_logistik);

      return view('dasbor',compact('laporan','logistiks','sum_logistik','count_pengungsian','count_laporan'));
    }
}
