@extends('donasi.layout')

@section('content')

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Rincian Data Donasi</h4>
              <p class="card-category">Rincian data donasi dalam database</p>
            </div>
            <div class="card-body">
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Name :</strong>
                      {{ $donasi->donatur }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Kontak :</strong>
                      {{ $donasi->kontak }}
                  </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12 text-right pull-right">
                <a class="btn btn-danger" href="{{ route('laporan.index') }}">Kembali</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
