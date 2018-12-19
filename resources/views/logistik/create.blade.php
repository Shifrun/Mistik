@extends('logistik.layout')
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
          <h4 class="card-title">Tambahkan Logistik</h4>
          <p class="card-category">Tambahkan data logistik ke dalam database</p>
        </div>
        <div class="card-body">
          <form action="{{ route('logistik.store') }}" method="POST">
              @csrf
               <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Nama Logistik:</strong>
                          <input type="text" name="nama" class="form-control" placeholder="Name">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Stok:</strong>
                          <input type="text" class="form-control" name="stok" placeholder="stok">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Kadaluarsa:</strong>
                          <input type="date" class="form-control" name="kadaluarsa" placeholder="kadaluarsa">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Kategori:</strong>
                          <select class="form-control" name="kategori">
                            <option value="">Pilih Kebutuhan</option>
                            @foreach ($kategori as $product)
                            <option value="{{$product->id}}">{{$product->kategori}}</option>
                            @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Daerah:</strong>
                          <!-- <input type="text" class="form-control" name="daerah" placeholder="daerah"> -->
                          <select class="form-control" name="daerah">
                            <option value="">Pilih Tempat Pengungsian</option>
                            @foreach ($lokasi as $item)
                            <option value="{{$item->id}}">{{$item->nama_pengungsian}}</option>
                            @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Sumber Logistik:</strong>
                          <!-- <input type="text" class="form-control" name="daerah" placeholder="daerah"> -->
                          <select class="form-control" name="sumber">
                            <option value="">Pilih Pemberi Logistik</option>
                            @foreach ($user as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 text-right pull-right">
                          <button type="submit" class="btn btn-success">Simpan</button>
                          <a class="btn btn-danger" href="{{ route('logistik.index') }}"> Kembali</a>
                  </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
