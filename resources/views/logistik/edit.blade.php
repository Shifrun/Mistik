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
              <h4 class="card-title">Sunting Data Logistik</h4>
              <p class="card-category">Sunting data logistik dalam database</p>
            </div>
            <div class="card-body">
          <form action="{{ route('logistik.update',$logistik->id) }}" method="POST">
              @csrf
              @method('PUT')

               <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Name:</strong>
                          <input type="text" name="nama" value="{{ $logistik->nama }}" class="form-control" placeholder="Name">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Stok:</strong>
                          <input type="text" class="form-control" value="{{ $logistik->stok }}" name="stok" placeholder="stok">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Kadaluarsa:</strong>
                          <input type="date" class="form-control" value="{{ $logistik->kadaluarsa }}" name="kadaluarsa" placeholder="kadaluarsa">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Kategori:</strong>
                          <select class="form-control" name="kategori">
                            <!-- <option value="{{$logistik->kategori}}">{{$logistik->nama_kategori}}</option> -->
                            @foreach ($kategori as $item)
                            @if($item->id == $logistik->kategori)
                            <option value="{{$item->id}}" selected>{{$item->kategori}}</option>
                            @else
                            <option value="{{$item->id}}">{{$item->kategori}}</option>
                            @endif

                            @endforeach
                          </select>
                          <!-- <input type="text" class="form-control" value="{{ $logistik->kategori }}" name="kategori" placeholder="kategori"> -->
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Daerah:</strong>
                          <!-- <input type="text" class="form-control" value="{{ $logistik->daerah }}" name="daerah" placeholder="daerah"> -->
                          <select class="form-control" name="daerah">
                            <!-- <option value="{{$logistik->kategori}}">{{$logistik->nama_kategori}}</option> -->
                            @foreach ($lokasi as $item)
                            @if($item->id == $logistik->daerah)
                            <option value="{{$item->id}}" selected>{{$item->nama_pengungsian}}</option>
                            @else
                            <option value="{{$item->id}}">{{$item->nama_pengungsian}}</option>
                            @endif

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
                            @if($item->id == $logistik->sumber)
                            <option value="{{$item->id}}" selected>{{$item->name}}</option>
                            @else
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endif
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
