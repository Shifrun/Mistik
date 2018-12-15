@extends('logistik.layout')

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
                  <h4 class="card-title ">Data Logistik</h4>
                  <p class="card-category"> Berikut merupakan data ketersediaan logistik</p>
              </div>
              <div class="col-md-3 pull-right">
                @guest
                @else
                  @if(Auth::user()->user_type=='BPBD')
                  <a class="btn btn-success" href="{{ route('logistik.create') }}"> Tambah Logistik</a>
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
                      <th>Nama</th>
                      <th>Stok</th>
                      <th>Kadaluarsa</th>
                      <th>Kategori</th>
                      <th>Daerah</th>
                      <th width="280px">Action</th>
                  </tr>
                  @foreach ($logistiks as $product)
                  <tr>
                      <td>{{ ++$i }}</td>
                      <!-- <td>{{ $product->id }}</td> -->
                      <td>{{ $product->nama }}</td>
                      <td>{{ $product->stok }}</td>
                      <td>{{ $product->kadaluarsa }}</td>
                      <td>{{ $product->nama_kategori }}</td>
                      <td>{{ $product->daerah }}</td>
                      <td>
                          <form action="{{ route('logistik.destroy',$product->id) }}" method="POST">
                              <a class="btn btn-info" href="{{ route('logistik.show',$product->id) }}"><i class="material-icons">search</i></a>
                              @guest
                              @else
                                @if(Auth::user()->user_type=='BPBD')
                              <a class="btn btn-primary" href="{{ route('logistik.edit',$product->id) }}"><i class="material-icons">edit</i></a>
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

    {!! $logistiks->links() !!}
@endsection
