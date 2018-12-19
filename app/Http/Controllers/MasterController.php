<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Donasi;
use App\Laporan;
use App\Kategori;
use App\Pengungsi;
use App\User;
use App\Logistik;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    //
    public function home(){
      $laporan = DB::table('laporans')
                    ->join('kategoris','laporans.kategori_kebutuhan','=','kategoris.id')
                    ->join('pengungsis','laporans.lokasi','=','pengungsis.id')
                    ->select('laporans.*','kategoris.kategori as kategori','pengungsis.nama_pengungsian as lokasi_pengungsian')
                    ->latest()
                    ->limit('5')
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
          $lokasi = Pengungsi::all();
          return view('laporkan', compact('kategori','lokasi'));
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
        $kategori = Kategori::all();
        $lokasi = Pengungsi::all();
        $success = "Laporan berhasil ditambahkan";
        // echo $request;
        // die;
        return view('laporkan', compact('kategori','lokasi','success'));
    }

    public function donasikan(){
      if(Auth::guest()){
        return redirect()->route('login')->with('success','Hanya Donatur terdaftar yang bisa melaporkan kebutuhan logistik.');
      }else{
        if(Auth::user()->user_type=='Relawan'){
          return redirect()->route('home')->with('success','Hanya Donatur terdaftar yang bisa melaporkan kebutuhan logistik.');
        }else{
          $lokasi = Pengungsi::all();
          $kategori = Kategori::all();
          $user = User::all();
          return view('donasikan', compact('kategori','lokasi','user'));
        }
      }
    }

    public function store_donasikan(Request $request){
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
        // echo $request;
        // die;
        $lokasi = Pengungsi::all();
        $kategori = Kategori::all();
        $user = User::all();

        $success = "Donasi berhasil ditambahkan";
        return view('donasikan', compact('kategori','lokasi','user','success'))->with('success','Donasi berhasil ditambahkan.');
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
                    ->join('pengungsis','laporans.lokasi','=','pengungsis.id')
                    ->select('laporans.*','kategoris.kategori as kategori','pengungsis.nama_pengungsian as lokasi_pengungsian')
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
