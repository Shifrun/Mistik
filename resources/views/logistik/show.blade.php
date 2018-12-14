@extends('logistik.layout')

@section('content')

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Rincian Data Logistik</h4>
              <p class="card-category">Rincian data logistik dalam database</p>
            </div>
            <div class="card-body">
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Name:</strong>
                      {{ $logistik->nama }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Stok:</strong>
                      {{ $logistik->stok }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 text-right pull-right">
                <a class="btn btn-danger" href="{{ route('logistik.index') }}"> Kembali</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
