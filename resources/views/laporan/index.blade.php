@extends('laporan.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <div class="pull-right">

            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">

            <div class="row">
              <div class="col-md-9">
                  <h4 class="card-title ">Data Laporan</h4>
                  <p class="card-category"> Berikut merupakan data laporan</p>
              </div>
              <div class="col-md-3 pull-right">
                @guest
                @else
                  @if(Auth::user()->user_type=='BPBD')
                  <a class="btn btn-success" href="{{ route('laporan.create') }}"> Tambah Laporan</a>
                  @endif
                @endguest
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                  <tr>
                      <th>No</th>
                      <!-- <th>ID</th> -->
                      <th>Nama Pelapor</th>
                      <th>Kontak</th>
                      <th>Lokasi</th>
                      <th>Kebutuhan</th>
                      <th>Catatan</th>
                      <th width="280px">Action</th>
                  </tr>
                  @foreach ($laporan as $product)
                  <tr>
                      <td>{{ ++$i }}</td>
                      <!-- <td>{{ $product->id }}</td> -->
                      <td>{{ $product->nama_pelapor }}</td>
                      <td>{{ $product->kontak }}</td>
                      <td>{{ $product->lokasi }}</td>
                      <td>{{ $product->kategori }}</td>
                      <td>{{ $product->catatan }}</td>
                      <td>
                          <form action="{{ route('laporan.destroy',$product->id) }}" method="POST">
                              <a class="btn btn-info" href="{{ route('laporan.show',$product->id) }}"><i class="material-icons">search</i></a>
                              @guest
                              @else
                                @if(Auth::user()->user_type=='BPBD')
                              <a class="btn btn-primary" href="{{ route('laporan.edit',$product->id) }}"><i class="material-icons">edit</i></a>
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger"><i class="material-icons">delete</i></button>
                              @endif
                            @endguest
                          </form>
                      </td>
                  </tr>
                  @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    {!! $laporan->links() !!}
@endsection
