@extends('pengungsi.layout_map')

@section('content')

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Peta Pengungsian</h4>
              <p class="card-category">Pemetaan pengungsian dalam database</p>
            </div>
            <div class="card-body">
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div id="map" style="height: 400px;"></div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 text-right pull-right">
                <br>
                <a class="btn btn-danger" href="{{ route('kategori.index') }}"> Kembali</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

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

    <!-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYCl9g6BehrGK78Z082mXpb0jIPHHGwYQ&callback=initMap">
    </script> -->

@endsection
