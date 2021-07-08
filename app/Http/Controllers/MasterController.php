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
                    ->join('pengungsis','laporans.lokasi','=','pengungsis.id')
                    ->select('laporans.*','pengungsis.nama_pengungsian as lokasi_pengungsian')
                    ->latest()
                    ->limit('5')
                    ->get();

      $markers = DB::table('pengungsis')
                    ->join('laporans','laporans.lokasi','=','pengungsis.id')
                    ->select('pengungsis.*','laporans.*')
                    ->get();


    $data =  DB::table(
              DB::raw("(".
              DB::table('logistiks as l')
              ->join('laporans as p','p.kategori_logistik','=','l.kategori')
              ->select (
                DB::raw('l.nama as namaLogistik'),
                DB::raw('sum(DISTINCT p.stok_kebutuhan)-sum(DISTINCT l.stok) as kekurangan'))
                ->groupBy('l.nama')
                ->orderBy('kekurangan','desc')
                ->limit(3)
                ->toSQL()
              .") as result"))
            ->select('*')
            ->orderBy('kekurangan','asc')
            ->get();
            $array[] = ['Nama Logistik', 'Kebutuhan Logistik'];
            foreach($data as $key => $value)
            {
              $array[++$key] = [$value->namaLogistik, $value->kekurangan];
            }
                      return view('home', compact('laporan','markers'))->with('namaLogistik', json_encode($array));
                      }



    public function tentang(){
      return view('tentang');
    }

    public function laporan(){
      if(Auth::guest()){
        return redirect()->route('login')->with('success','Hanya Relawan terdaftar yang bisa melaporkan kebutuhan logistik.');
      }else{
        if(Auth::user()->user_type=='Donatur'){
          return redirect()->route('login')->with('success','Hanya Relawan terdaftar yang bisa melaporkan kebutuhan logistik.');
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
          'stok_kebutuhan' => 'required',
          'kategori_logistik' => 'required',
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
          return redirect()->route('login')->with('success','Hanya Donatur terdaftar yang bisa melaporkan kebutuhan logistik.');
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
                    // ->join('kategoris','laporans.kategori_kebutuhan','=','kategoris.id')
                    ->join('pengungsis','laporans.lokasi','=','pengungsis.id')
                    ->select('laporans.*','pengungsis.nama_pengungsian as lokasi_pengungsian')
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

     // $data3 = Db::table('laporans')
     //                     ->select(
     //                      DB::raw('kategori_kebutuhan as kategori_kebutuhan'),
     //                      DB::raw('sum(stok_kebutuhan) as kebutuhan'))
     //                      ->groupBy('kategori_kebutuhan')
     //                      ->orderby('kebutuhan')
     //                      ->get();
     //                      $array3[] = ['kategori_kebutuhan', 'kebutuhan'];
     //                      foreach($data3 as $key3 => $value3)
     //                      {
     //                        $array3[++$key3] = [$value3->kategori_kebutuhan, $value3->kebutuhan];
     //                      }

     // $p = DB::table('pengungsis as peng')
     //    ->join('laporans as lap','lap.lokasi','=','peng.id')
     //    ->select(
     //    DB::raw('SUM(lap.stok_kebutuhan) as stok_kebutuhan'),
     //    DB::raw('peng.jumlah_pengungsi as jumlah_pengungsi'))
     //      ->groupBy('jumlah_pengungsi')
     //      ->orderBy('lokasi','asc')
     //      ->get();

     $lokasis = Pengungsi::all();
     foreach ($lokasis as $lokasi) {
       $stok_kebutuhan[$lokasi->id]=DB::table('laporans')->where('lokasi',$lokasi->id)->sum('stok_kebutuhan');
       $jumlah_pengungsi[$lokasi->id]=DB::table('pengungsis')->where('id',$lokasi->id)->value('jumlah_pengungsi');
     }

     foreach ($lokasis as $lokasi) {
       $kebutuhanbanyak = ($stok_kebutuhan[$lokasi->id]-3000)/(3000-100);
            $kebutuhandikit = (3000-$stok_kebutuhan[$lokasi->id])/(3000-100);
            $pengungsibanyak =($jumlah_pengungsi[$lokasi->id]-1000)/(1000-5);
            $pengungsidikit = (1000-$jumlah_pengungsi[$lokasi->id])/(1000-5);

            //aturan 1 if kebutuhan sedikit and pengungsi sedikit then prioritas rendah

            //miu kebutuhan sedikit
            if(($stok_kebutuhan[$lokasi->id])>100 && ($stok_kebutuhan[$lokasi->id]<3000)){
              $Ustokrendah = $kebutuhandikit;
            }
            else if(($stok_kebutuhan[$lokasi->id])<=100){
              $Ustokrendah = 1;
            }
            else{
              $Ustokrendah = 0;
            }
            //miu pengungsi
                if($jumlah_pengungsi[$lokasi->id]>5 && $jumlah_pengungsi[$lokasi->id]<1000){
                  $Upengungsidikit1= $pengungsidikit;
                }
                else if( $jumlah_pengungsi[$lokasi->id]<=5){
                  $Upengungsidikit1 = 1;
                }
                else{
                  $Upengungsidikit1 = 0;
                }

                if($Ustokrendah<$Upengungsidikit1){
                  $a1 = $Ustokrendah;
                }
                else{
                  $a1=$Upengungsidikit1;
                }

                $z1=100-($a1*100);

                //ATURAN 2 IF kebutuhan sedikit and pengungsi banyak  then prioritas tinggi

                //miu kebutuhan sedikit
                    if(($stok_kebutuhan[$lokasi->id])>100 && ($stok_kebutuhan[$lokasi->id])<3000){
                      $Ustokrendah2= $kebutuhandikit;
                    }
                    else if(($stok_kebutuhan[$lokasi->id])<=100){
                      $Ustokrendah2 = 1;
                    }
                    else{
                      $Ustokrendah2 = 0;
                    }
                    //miu pengungsi
                    if($jumlah_pengungsi[$lokasi->id]>5 && $jumlah_pengungsi[$lokasi->id]<1000){
                      $Upengungsibanyak2 = $pengungsidikit;
                    }
                    else if($jumlah_pengungsi[$lokasi->id]<=5){
                      $Upengungsibanyak2 = 0;
                    }
                    else{
                      $Upengungsibanyak2 = 1;
                    }

                    if($Ustokrendah2<$Upengungsibanyak2){
                      $a2 = $Ustokrendah2;
                    }
                    else{
                      $a2=$Upengungsibanyak2;
                    }
                    $z2=$a2*100;

                    //ATURAN 3 IF kebutuhan banyak AND pengungsi dikit THEN prioritas rendah

               //miu kebutuhan  banyak
                if(($stok_kebutuhan[$lokasi->id])>100 && ($stok_kebutuhan[$lokasi->id])<3000){
                    $Ustokbanyak3= $kebutuhanbanyak;
                }
                else if(($stok_kebutuhan[$lokasi->id]) <=100){
                  $Ustokbanyak3 = 0;
                }
                else{
                  $Ustokbanyak3 = 1;
                }

                //miu pengungsi
              if($jumlah_pengungsi[$lokasi->id]>5 && $jumlah_pengungsi[$lokasi->id]<1000){
                  $Upengungsidikit3= $pengungsidikit;
                }
                else if($jumlah_pengungsi[$lokasi->id]<=5){
                  $Upengungsidikit3=1;
                }
                else{
                  $Upengungsidikit3=0;
                }


                if($Ustokbanyak3<$Upengungsidikit3){
                  $a3 = $Ustokbanyak3;
                }
                else{
                  $a3=$Upengungsidikit3;
                }
                $z3=100-($a3*100);

                //ATURAN 4 IF kebuthan banyak AND pengungsi tinggi THEN prioritas tinggi

                //miu kebutuhan banyak
                if(($stok_kebutuhan[$lokasi->id])>100 && ($stok_kebutuhan[$lokasi->id])<3000){
                  $Ustokbanyak4=$kebutuhanbanyak;
                }
                else if(($stok_kebutuhan[$lokasi->id])<=100){
                  $Ustokbanyak4=0;
                }
                else{
                  $Ustokbanyak4=1;
                }
                //miu pengungsi
              if($jumlah_pengungsi[$lokasi->id]>5 && $jumlah_pengungsi[$lokasi->id]<3000){
                  $Upengungsibanyak4=$pengungsibanyak;
                }
                else if($jumlah_pengungsi[$lokasi->id]<=5){
                  $Upengungsibanyak4=0;
                }
                else{
                  $Upengungsibanyak4=1;
                }


                if($Ustokbanyak4<$Upengungsibanyak4){
                  $a4 = $Ustokbanyak4;
                }
                else{
                  $a4=$Upengungsibanyak4;
                }

                $z4=$a4*100;

                $Ztotal[$lokasi->id] = (($a1*$z1)+($a2*$z2)+($a3*$z3)+($a4*$z4))/($a1+$a2+$a3+$a4);

                if (  $Ztotal[$lokasi->id] <= 50) {
                    $Ztotal[$lokasi->id] ='Rendah';
                }
                else {
                    $Ztotal[$lokasi->id]='Diprioritaskan';
                }


     }


  //     foreach ($p as $key5 => $p ) {
  //
  //       $kebutuhanbanyak = ($p->stok_kebutuhan-1500)/(1500-10);
  //       $kebutuhandikit = (1500-$p->stok_kebutuhan)/(1500-10);
  //       $pengungsibanyak =($p->jumlah_pengungsi-1000)/(1000-10);
  //       $pengungsidikit = (1000-$p->jumlah_pengungsi)/(1000-10);
  //
  //       //aturan 1 if kebutuhan sedikit and pengungsi sedikit then prioritas rendah
  //
  //       //miu kebutuhan sedikit
  //       if(($p->stok_kebutuhan)>10 && ($p->stok_kebutuhan<1500)){
  //         $Ustokrendah = $kebutuhandikit;
  //
  //       else if(($p->stok_kebutuhan)<=10){
  //         $Ustokrendah = 1;
  //       }
  //       else{
  //         $Ustokrendah = 0;
  //       }
  //       //miu pengungsi
  //           if($p->jumlah_pengungsi>10 && $p->jumlah_pengungsi<1000){
  //             $Upengungsidikit1= $pengungsidikit;
  //           }
  //           else if( $p->jumlah_pengungsi<=10){
  //             $Upengungsidikit1 = 1;
  //           }
  //           else{
  //             $Upengungsidikit1 = 0;
  //           }
  //
  //           if($Ustokrendah<$Upengungsidikit1){
  //             $a1 = $Ustokrendah;
  //           }
  //           else{
  //             $a1=$Upengungsidikit1;
  //           }
  //
  //           $z1=10-($a1*10);
  //
  //           //ATURAN 2 IF kebutuhan sedikit and pengungsi banyak  then prioritas tinggi
  //
  //           //miu kebutuhan sedikit
  //               if(($p->stok_kebutuhan)>10 && ($p->stok_kebutuhan)<1500){
  //                 $Ustokrendah2= $kebutuhandikit;
  //               }
  //               else if(($p->stok_kebutuhan)<=10){
  //                 $Ustokrendah2 = 1;
  //               }
  //               else{
  //                 $Ustokrendah2 = 0;
  //               }
  //               //miu pengungsi
  //               if($p->jumlah_pengungsi>10 && $p->jumlah_pengungsi<1000){
  //                 $Upengungsibanyak2 = $pengungsidikit;
  //               }
  //               else if($p->jumlah_pengungsi<=10){
  //                 $Upengungsibanyak2 = 0;
  //               }
  //               else{
  //                 $Upengungsibanyak2 = 1;
  //               }
  //
  //               if($Ustokrendah2<$Upengungsibanyak2){
  //                 $a2 = $Ustokrendah2;
  //               }
  //               else{
  //                 $a2=$Upengungsibanyak2;
  //               }
  //               $z2=$a2*10;
  //
  //               //ATURAN 3 IF kebutuhan banyak AND pengungsi dikit THEN prioritas rendah
  //
  //          //miu kebutuhan  banyak
  //           if(($p->stok_kebutuhan)>10 && ($p->stok_kebutuhan)<1500){
  //               $Ustokbanyak3= $kebutuhanbanyak;
  //           }
  //           else if(($p->stok_kebutuhan) <=10){
  //             $Ustokbanyak3 = 0;
  //           }
  //           else{
  //             $Ustokbanyak3 = 1;
  //           }
  //
  //           //miu pengungsi
  //         if($p->jumlah_pengungsi>10 && $p->jumlah_pengungsi<1000){
  //             $Upengungsidikit3= $pengungsidikit;
  //           }
  //           else if($p->jumlah_pengungsi<=10){
  //             $Upengungsidikit3=1;
  //           }
  //           else{
  //             $Upengungsidikit3=0;
  //           }
  //
  //
  //           if($Ustokbanyak3<$Upengungsidikit3){
  //             $a3 = $Ustokbanyak3;
  //           }
  //           else{
  //             $a3=$Upengungsidikit3;
  //           }
  //           $z3=10-($a3*10);
  //
  //           //ATURAN 4 IF kebuthan banyak AND pengungsi tinggi THEN prioritas tinggi
  //
  //           //miu kebutuhan banyak
  //           if(($p->stok_kebutuhan)>10 && ($p->stok_kebutuhan)<1500){
  //             $Ustokbanyak44=$kebutuhanbanyak;
  //           }
  //           else if(($p->stok_kebutuhan)<=10){
  //             $Ustokbanyak44=0;
  //           }
  //           else{
  //             $Ustokbanyak44=1;
  //           }
  //           //miu pengungsi
  //         if($p->jumlah_pengungsi>10 && $p->jumlah_pengungsi<1000){
  //             $Upengungsibanyak4=$pengungsibanyak;
  //           }
  //           else if($p->jumlah_pengungsi<=10){
  //             $Upengungsibanyak4=0;
  //           }
  //           else{
  //             $Upengungsibanyak4=1;
  //           }
  //
  //
  //           if($Ustokbanyak44<$Upengungsibanyak4){
  //             $a4 = $Ustokbanyak4;
  //           }
  //           else{
  //             $a4=$Upengungsibanyak4;
  //           }{
  //           $z4=$a4*10;
  //
  //           $Ztotal[] = (($a1*$z1)+($a2*$z2)+($a3*$z3)+($a4*$z4))/($a1+$a2+$a3+$a4+2);
  //
  //     }
  //
  //
  // }



      $data2 = Db::table('logistiks')
                ->select(
                DB::raw('nama as nama'),
                DB::raw('sum(DISTINCT stok) as JumlahLogistik'))
                ->groupBy('nama')
                ->orderby('JumlahLogistik')
                ->get();
                $array2[] = ['Nama Logistik', 'Jumlah Logistik'];
                foreach($data2 as $key2 => $value2)
                {
                  $array2[++$key2] = [$value2->nama, $value2->JumlahLogistik];
                }
      $data6 = Db::table('laporans')
              ->select(
              DB::raw('kategori_kebutuhan as namakebutuhan'),
              DB::raw('sum(DISTINCT stok_kebutuhan) as kebutuhanLogistik'))
              ->groupBy('namakebutuhan')
              ->orderby('kebutuhanLogistik')
              ->get();
              $array6[] = ['Nama Logistik','Kebutuhan Logistik'];
              foreach($data6 as $key6 => $value6)
              {
                $array6[++$key6] = [$value6->namakebutuhan,$value6->kebutuhanLogistik];
              }
    $data4 = DB::table('pengungsis as p')
                  ->join('laporans as lap','lap.lokasi','=','p.id')
                  ->join('logistiks as l','l.kategori','=','lap.kategori_logistik')
                  ->select(
                   DB::raw('p.nama_pengungsian as pengungsian'),
                   DB::raw('sum(DISTINCT lap.stok_kebutuhan) - sum(DISTINCT l.stok) as kebutuhan'))
                  ->groupBy('pengungsian')
                  ->orderBy('kebutuhan')
                  ->get();
                  $array4[] = ['Nama Pengungsian', 'Kebutuhan Logistik'];
                  foreach($data4 as $key4 => $value4)
                  {
                    $array4[++$key4] = [$value4->pengungsian, $value4->kebutuhan];
                  }
    $data5 = DB::table(
              DB::raw("(".
              DB::table('logistiks as l')
              ->join('laporans as p','p.kategori_logistik','=','l.kategori')
              ->select (
                DB::raw('l.nama as namaLogistik'),
                DB::raw('sum(DISTINCT p.stok_kebutuhan)-sum(DISTINCT l.stok) as kekurangan'))
                ->groupBy('l.nama')
                ->orderBy('kekurangan','desc')
                ->limit(3)
                ->toSQL()
              .") as result"))
            ->select('*')
            ->orderBy('kekurangan','asc')
            ->get();
            $array5[] = ['Nama Logistik', 'Kebutuhan Logistik'];
            foreach($data5 as $key5 => $value5)
            {
              $array5[++$key5] = [$value5->namaLogistik, $value5->kekurangan];
            }
  // $data6 = DB::table('logistiks as l')
  //         ->join('laporans as p','p.kategori_logistik','=','l.kategori')
  //         ->select(
  //         DB::raw('l.nama as namaLogistik'),
  //         DB::raw('sum(DISTINCT p.stok_kebutuhan)-sum(DISTINCT l.stok) as kekurangan'))
  //         ->groupBy('l.nama')
  //         ->orderBy('kekurangan','desc')
  //         ->limit('1')
  //         ->get();
  //         $array5[] = ['nama', 'kekurangan'];
  //         foreach($data5 as $key5 => $value5)
  //         {
  //           $array5[++$key5] = [$value5->namaLogistik, $value5->kekurangan];
  //         }



      return view('dasbor',compact('laporan','logistiks','sum_logistik','count_pengungsian','count_laporan','Ztotal','p','d','stok_kebutuhan','jumlah_pengungsi','lokasis'))
      //->with('kategori_kebutuhan',json_encode($array3))
      ->with('nama',json_encode($array2))
      ->with('namaLogistik',json_encode($array5))
      ->with('namakebutuhan',json_encode($array6))
      ->with('pengungsian',json_encode($array4));

    }
}
