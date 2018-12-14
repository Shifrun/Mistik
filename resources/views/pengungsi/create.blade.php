@extends('pengungsi.layout')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Tambahkan Pengungsian</h4>
          <p class="card-category">Tambahkan data pengungsian ke dalam database</p>
        </div>
        <div class="card-body">
          <form action="{{ route('pengungsi.store') }}" method="POST">
              @csrf
               <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Nama Pengungsian :</strong>
                          <input type="text" name="nama_pengungsian" class="form-control" placeholder="Nama">
                      </div>
                      <div class="form-group">
                          <strong>Jumlah Pengungsi :</strong>
                          <input type="text" name="jumlah_pengungsi" class="form-control" placeholder="Jumlah Pengungsi">
                      </div>
                      <div class="form-group">
                          <strong>Alamat :</strong>
                          <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                      </div>
                      <div class="form-group">
                          <strong>Daerah :</strong>
                          <input type="text" name="daerah" class="form-control" placeholder="Daerah">
                      </div>
                      <div class="form-group">
                          <div id="map" style="height: 400px;"></div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 text-right pull-right">
                          <input type="hidden" name="lat" id="lat" class="form-control" placeholder="">
                          <input type="hidden" name="lng" id="lng" class="form-control" placeholder="">
                          <button type="submit" class="btn btn-success">Simpan</button>
                          <a class="btn btn-danger" href="{{ route('pengungsi.index') }}"> Kembali</a>
                  </div>
              </div>
          </form>
          <script>
          // Initialize and add the map
          function initMap() {

          var myLatlng = new google.maps.LatLng(-7.6655719,110.4200379);
          var mapProp = {
          center:myLatlng,
          zoom:15,
          mapTypeId:google.maps.MapTypeId.ROADMAP

          };
          var map=new google.maps.Map(document.getElementById("map"), mapProp);
          var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'Hello World!',
            draggable:true
          });
          document.getElementById('lat').value= -7.6655719
          document.getElementById('lng').value= 110.4200379
          // marker drag event
          google.maps.event.addListener(marker,'drag',function(event) {
              document.getElementById('lat').value = event.latLng.lat();
              document.getElementById('lng').value = event.latLng.lng();
          });

          //marker drag event end
          google.maps.event.addListener(marker,'dragend',function(event) {
              document.getElementById('lat').value = event.latLng.lat();
              document.getElementById('lng').value = event.latLng.lng();
              /* alert("lat=>"+event.latLng.lat());
              alert("long=>"+event.latLng.lng()); */
          });

          }
          </script>
          <!--Load the API from the specified URL
          * The async attribute allows the browser to render the page while the API loads
          * The key parameter will contain your own API key (which is not needed for this tutorial)
          * The callback parameter executes the initMap() function
          -->
          <script async defer
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYCl9g6BehrGK78Z082mXpb0jIPHHGwYQ&callback=initMap">
          </script>

        </div>
      </div>
    </div>
  </div>
</div>



@endsection
