@extends('layout')

@section('content')
  <main>

    <section class="section section-lg bg-gradient-default">
      <div class="container pt-lg pb-300">
        <div class="row text-center justify-content-center">
          <div class="col-lg-10">
            <h2 class="display-3 text-white">Berikan Bantuan Logistik</h2>
            <p class="lead text-white">Apabila terjadi kekurangan logistik di suatu tempat terdampak bencana, gunakan form di bawah ini untuk mengirimkan data bantuan logistik yang diberikan.</p>
          </div>
        </div>
      </div>
      <!-- SVG separator -->
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </section>
    <section class="section section-lg pt-lg-0 section-contact-us">
      <div class="container">
        <div class="row justify-content-center mt--300">
          <div class="col-lg-8">
            @isset($success)
                <script>swal("{{ $success }}","","success")</script>
            @endisset
            <div class="card bg-gradient-secondary shadow">
              <div class="card-body p-lg-5">
              <form action="/donasi/proses" method="POST">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
              @csrf
                <p class="mt-1 text-center">Masukan detil kekurangan logistik di bawah ini</p>
                <div class="form-group mt-5">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-user-run"></i></span>
                    </div>
                    <input class="form-control" placeholder="Nama Donatur" name="donaturs" value="{{Auth::User()->name}}" type="text">
                    <input class="form-control" placeholder="" name="donatur" value="{{Auth::User()->id}}" type="hidden">
                    <input class="form-control" placeholder="" name="sumber" value="{{Auth::User()->id}}" type="hidden">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input class="form-control" name="kontak" placeholder="Nomor Kontak Donatur" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-box"></i></span>
                    </div>
                    <input class="form-control" name="nama" placeholder="Nama Logistik" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-boxes"></i></span>
                    </div>
                    <input class="form-control" name="stok" placeholder="Jumlah Stok" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    </div>
                    <input class="form-control" name="kadaluarsa" placeholder="Tanggal Kadaluarsa" type="date">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-box"></i></span>
                    </div>
                    <!-- <input class="form-control" name="kategori_kebutuhan" placeholder="Kebutuhan Logistik" type="text"> -->
                    <select class="form-control" name="kategori">
                      <option value="">Pilih kategori Kebutuhan</option>
                      @foreach ($kategori as $product)
                      <option value="{{$product->id}}">{{$product->kategori}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                    </div>
                    <!-- <input class="form-control" name="kategori_kebutuhan" placeholder="Kebutuhan Logistik" type="text"> -->
                    <select class="form-control" name="daerah">
                      <option value="">Pilih Tempat Pengungsian</option>
                      @foreach ($lokasi as $item)
                      <option value="{{$item->id}}">{{$item->nama_pengungsian}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div>
                  <button type="submit" name="submit" class="btn btn-default btn-round btn-block btn-lg">Kirim Bantuan</button>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
