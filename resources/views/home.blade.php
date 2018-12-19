@extends('layout')

@section('content')
  <main>
    <div class="position-relative">

      <!-- shape Hero -->
      <section class="section section-lg section-shaped pb-250">
        <div class="shape shape-style-1 shape-primary alpha-4" >
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="container py-lg-md d-flex">
          <div class="col px-0">
            <div class="row">
              <div class="col-lg-9">
                <h1 class="display-3  text-white">Sistem Distribusi Logistik
                  <span>M I S T I K</span>
                </h1>
                <p class="lead text-white">Mistik merupakan layanan web untuk membantu pendistribusian logistik ke tempat-tempat kejadian bencana sehingga dapat membantu memudahkan pemerataan distribusi logistik untuk mendukung penanganan bencana.</p>
                <div class="btn-wrapper">
                  <a href="{{URL::to('/')}}/laporkan" class="btn btn-success btn-icon mb-3 mb-sm-0">
                    <span class="btn-inner--icon"><i class="fas fa-clipboard-check"></i></span>
                    <span class="btn-inner--text">Laporkan Kebutuhan Logistik</span>
                  </a>
                  <a href="{{URL::to('/')}}/donasikan" class="btn btn-warning btn-icon mb-3 mb-sm-0">
                    <span class="btn-inner--icon"><i class="fas fa-clipboard-list"></i></span>
                    <span class="btn-inner--text">Kirim Bantuan Logistik</span>
                  </a>
                  <!-- <a href="{{URL::to('/')}}/logistik" class="btn btn-white btn-icon mb-3 mb-sm-0">
                    <span class="btn-inner--icon"><i class="fas fa-clipboard-list"></i></span>
                    <span class="btn-inner--text">Lihat Laporan Logistik</span>
                  </a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- SVG separator -->
        <div class="separator separator-bottom separator-skew">
          <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
      </section>
      <!-- 1st Hero Variation -->
    </div>
    <section class="section section-lg pt-lg-0 mt--200">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="row row-grid">
              <div class="col-lg-12">
                <div class="card shadow border-0">
                  <div class="card-body py-5">
                    <!-- <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
                      <i class="ni ni-app"></i>
                    </div> -->
                    <h5 class=" text-center text-primary text-uppercase">Laporan Kebutuhan Logistik Saat Ini</h5>
                    <div class="nav-wrapper">
                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-single-copy-04 mr-2"></i>Laporan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-map-big mr-2"></i>Peta Persebaran</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                  <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>No</th>
                                            <!-- <th>ID</th> -->
                                            <th>Pelapor</th>
                                            <th>Kontak</th>
                                            <th>Lokasi</th>
                                            <th>Kebutuhan</th>
                                            <th>Catatan</th>
                                        </tr>
                                        <?php $i=0;?>
                                        @foreach ($laporan as $product)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <!-- <td>{{ $product->id }}</td> -->
                                            <td>{{ $product->nama_pelapor }}</td>
                                            <td>{{ $product->kontak }}</td>
                                            <td>{{ $product->lokasi_pengungsian }}</td>
                                            <td>{{ $product->kategori }}</td>
                                            <td>{{ substr($product->catatan,0,30) }}...</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                  </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                  <div id="map" style="height: 400px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

     <section class="section section-lg bg-gradient-default">
       <div class="container pt-sm pb-100">
         <div class="row text-center justify-content-center">
           <div class="col-lg-10">
             <h2 class="display-3 text-white">Bagaimana MISTIK Bekerja?</h2>
             <!-- <p class="lead text-white">According to the National Oceanic and Atmospheric Administration, Ted, Scambos, NSIDClead scentist, puts the potentially record low maximum sea ice extent tihs year down to low ice.</p> -->
           </div>
         </div>
         <div class="row row-grid mt-5">
           <div class="col-lg-4">
             <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
               <i class="ni ni-check-bold text-primary"></i>
             </div>
             <h5 class="text-white mt-3">Pantau Kebutuhan Logistik</h5>
             <p class="text-white mt-3 text-justify">Layanan MISTIK memungkinkan BDPB atau instansi terkait untuk mengetahui kebutuhan logistik seperti apa di tempat kejadian bencana secara real time. Sehingga pendistribusian logistik terlaksana secara tepat waktu dan sasaran sesuai yang dibutuhkan tempat pengungsian.</p>
           </div>
           <div class="col-lg-4">
             <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
               <i class="ni ni-istanbul text-primary"></i>
             </div>
             <h5 class="text-white mt-3">Monitor Ketersediaan Logistik</h5>
             <p class="text-white mt-3 text-justify">Ketersediaan logistik untuk membantu mitigasi bencana sangatlah penting. MISTIK memungkinkan pemantauan ketersediaan stok logistik yang diperlukan serta daerah stok tersebut berada. Sehingga dapat menghindarkan penumpukan ketersediaan logistik di suatu wilayah bencana.</p>
           </div>
           <div class="col-lg-4">
             <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
               <i class="ni ni-atom text-primary"></i>
             </div>
             <h5 class="text-white mt-3">Terima Bantuan Logistik</h5>
             <p class="text-white mt-3 text-justify">Laporan kebutuhan logistik dari tempat pengungsian mendorong berbagai kalangan untuk turut membantu mitigasi bencana. MISTIK memudahkan pencatatan bantuan dari donatur baik itu bantuan barang logistik atau uang tunai untuk selanjutnya didistribusikan ke wilayah yang membutuhkan.</p>
           </div>
         </div>
       </div>
       <!-- SVG separator -->
       <div class="separator separator-bottom separator-skew zindex-100">
         <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
           <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
         </svg>
       </div>
     </section>


  </main>

  <script>
  var map;
   var markers = {!! json_encode($markers) !!}; //this should dump a javascript array object which does not need any extra interperting.
   var marks = []; //just incase you want to be able to manipulate this later

   function initMap() {
       map = new google.maps.Map(document.getElementById('map'), {
           center: {lat: -7.6655719, lng: 110.4200379},
           zoom: 11
       });

       for(var i = 0; i < markers.length; i++){
           marks[i] = addMarker(markers[i]);
       }
   }

   function addMarker(marker){
       var nama_pengungsian = marker.nama_pengungsian;
       var jumlah_pengungsi = marker.jumlah_pengungsi;
       var alamat = marker.alamat;
       var daerah = marker.daerah;
       var catatan = marker.catatan;
       var kategori = marker.kategori;

       var html = "<b> Nama tempat : " + nama_pengungsian + "</b> <br/>Jumlah Pengungsi : " + jumlah_pengungsi + " orang,<br/> <b>Butuh : </b>" + kategori + ", " + catatan + ",<br/>" + alamat + ",<br/>" + daerah;

       var markerLatlng = new google.maps.LatLng(parseFloat(marker.lat),parseFloat(marker.lng));


       var mark = new google.maps.Marker({
           map: map,
           position: markerLatlng,

       });

       var infoWindow = new google.maps.InfoWindow;
       google.maps.event.addListener(mark, 'click', function(){
           infoWindow.setContent(html);
           infoWindow.open(map, mark);
       });

       return mark;
   }

   function doNothing(){} //very appropriately named function. whats it for?


  </script>
@endsection
