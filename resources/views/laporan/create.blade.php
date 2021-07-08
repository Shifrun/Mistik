@extends('laporan.layout')
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
          <h4 class="card-title">Tambahkan Laporan</h4>
          <p class="card-category">Tambahkan data laporan ke dalam database</p>
        </div>
        <div class="card-body">
          <form action="{{ route('laporan.store') }}" method="POST">
              @csrf
               <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Nama Pelapor :</strong>
                          <input type="text" name="nama_pelapor" class="form-control" placeholder="Nama">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Kontak Pelapor :</strong>
                          <input type="text" class="form-control" name="kontak" placeholder="Kontak">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Lokasi :</strong>
                          <input type="text" class="form-control" name="lokasi" placeholder="Lokasi">

                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Laporan Kebutuhan :</strong>
                          <!-- <select class="form-control" name="kategori_kebutuhan">
                            <option value="">Pilih Kebutuhan</option>
                            @foreach ($kategori as $product)
                            <option value="{{$product->id}}">{{$product->kategori}}</option>
                            @endforeach
                          </select> -->
                          <input type="text" class="form-control" name="kategori_kebutuhan" placeholder="Kebutuhan">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Stok :</strong>
                        <input type="text" class="form-control" name="stok_kebutuhan" placeholder="stok">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>kategori :</strong>
                        <input type="text" class="form-control" name="kategori_logistik" placeholder="kategori">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Catatan:</strong>
                          <textarea class="form-control" name="catatan" placeholder="Catatan.."></textarea>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 text-right pull-right">
                          <button type="submit" class="btn btn-success">Simpan</button>
                          <a class="btn btn-danger" href="{{ route('laporan.index') }}"> Kembali</a>
                  </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
