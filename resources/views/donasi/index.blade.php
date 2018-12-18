@extends('donasi.layout')

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
        <script>swal("{{ $message }}","","success")</script>

    @endif
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">

            <div class="row">
              <div class="col-md-9">
                  <h4 class="card-title ">Data Donasi</h4>
                  <p class="card-category"> Berikut merupakan data donasi</p>
              </div>
              <div class="col-md-3 pull-right">
                <a class="btn btn-success" href="{{ route('donasi.create') }}"> Tambah Donasi</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                  <tr>
                      <th>No</th>
                      <!-- <th>ID</th> -->
                      <th>Nama Donatur</th>
                      <th>Kontak</th>
                      <th width="280px">Action</th>
                  </tr>
                  @foreach ($donasi as $product)
                  <tr>
                      <td>{{ ++$i }}</td>
                      <!-- <td>{{ $product->id }}</td> -->
                      <td>{{ $product->donatur }}</td>
                      <td>{{ $product->kontak }}</td>

                      <td>
                          <form action="{{ route('donasi.destroy',$product->id) }}" method="POST">
                              <a class="btn btn-info" href="{{ route('donasi.show',$product->id) }}"><i class="material-icons">search</i></a>
                              <a class="btn btn-primary" href="{{ route('donasi.edit',$product->id) }}"><i class="material-icons">edit</i></a>
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger"><i class="material-icons">delete</i></button>
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

    <script>
    function confirmDelete(){
      event.preventDefault();
      Swal({
        title: 'Apakah anda yakin?',
        text: "Data yang dihapus tidak dapat dikembalikan",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',
      }).then((result) => {
        if (result.value) {
          Swal(
            'Data berhasil dihapus!',
            '',
            'success'
          )
          return true;
        }
        })
      }
</script>

    {!! $donasi->links() !!}
@endsection
