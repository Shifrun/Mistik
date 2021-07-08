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
          <form action="{{ route('laporan.update',$laporan->id) }}" method="POST">
              @csrf
              @method('PUT')
               <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Nama Pelapor :</strong>
                          <input type="text" name="nama_pelapor" value="{{$laporan->nama_pelapor}}" class="form-control" placeholder="Nama">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Kontak Pelapor :</strong>
                          <input type="text" class="form-control" value="{{$laporan->kontak}}" name="kontak" placeholder="Kontak">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Lokasi :</strong>
                          
                          <input type="text" class="form-control" value="{{$laporan->lokasi}}" name="lokasi" placeholder="Lokasi">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Kategori Kebutuhan :</strong>
                          <!-- <input type="text" class="form-control" value="{{$laporan->kategori_kebutuhan}}" name="kategori_kebutuhan" placeholder="Kategori"> -->
                          <!-- <select class="form-control" name="kategori_kebutuhan">
                            <option value="">Pilih Kebutuhan</option>
                            @foreach ($kategori as $item)
                            @if($item->id == $laporan->kategori_kebutuhan)
                            <option value="{{$item->id}}" selected>{{$item->kategori}}</option>
                            @else
                            <option value="{{$item->id}}">{{$item->kategori}}</option>
                            @endif

                            @endforeach
                          </select> -->
                        <input type="text" class="form-control" value="{{$laporan->kategori_kebutuhan}}" name="kategori_kebutuhan" placeholder="Kebutuhan">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Catatan:</strong>
                          <textarea class="form-control" name="catatan" placeholder="Catatan..">{{$laporan->catatan}}</textarea>
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
