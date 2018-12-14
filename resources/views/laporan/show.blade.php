@extends('laporan.layout')

@section('content')

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Rincian Data Laporan</h4>
              <p class="card-category">Rincian data laporan dalam database</p>
            </div>
            <div class="card-body">
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Name :</strong>
                      {{ $laporan->nama_pelapor }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Kontak :</strong>
                      {{ $laporan->kontak }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Lokasi :</strong>
                      {{ $laporan->lokasi }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Kebutuhan :</strong>
                      {{ $laporan->kategori_kebutuhan }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Catatan :</strong>
                      {{ $laporan->catatan }}
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
