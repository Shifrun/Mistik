@extends('kategori.layout')
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
          <h4 class="card-title">Sunting Kategori</h4>
          <p class="card-category">Ubah data kategori dalam database</p>
        </div>
        <div class="card-body">
          <form action="{{ route('kategori.update',$kategori->id) }}" method="POST">
              @csrf
              @method('PUT')
               <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Kategori :</strong>
                          <input type="text" name="kategori" value="{{$kategori->kategori}}" class="form-control" placeholder="Nama">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 text-right pull-right">
                          <button type="submit" class="btn btn-success">Simpan</button>
                          <a class="btn btn-danger" href="{{ route('kategori.index') }}"> Kembali</a>
                  </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
