@extends('kategori.layout')

@section('content')

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Rincian Data Kategori</h4>
              <p class="card-category">Rincian data kategori dalam database</p>
            </div>
            <div class="card-body">
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Kategori :</strong>
                      {{ $kategori->kategori }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 text-right pull-right">
                <a class="btn btn-danger" href="{{ route('kategori.index') }}"> Kembali</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
