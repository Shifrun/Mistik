@extends('donasi.layout')
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
          <h4 class="card-title">Tambahkan Donasi</h4>
          <p class="card-category">Tambahkan data donasi ke dalam database</p>
        </div>
        <div class="card-body">
          <form action="{{ route('donasi.update',$donasi->id) }}" method="POST">
              @csrf
              @method('PUT')
               <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Nama Donatur :</strong>
                          <input type="text" name="donatur" value="{{$donasi->donatur}}" class="form-control" placeholder="Nama">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Kontak :</strong>
                          <input type="text" class="form-control" value="{{$donasi->kontak}}" name="kontak" placeholder="Kontak">
                      </div>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-12 text-right pull-right">
                          <button type="submit" class="btn btn-success">Simpan</button>
                          <a class="btn btn-danger" href="{{ route('donasi.index') }}"> Kembali</a>
                  </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
