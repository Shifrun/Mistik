@extends('donasi.layout')

@section('content')

<script>
function cari() {
// Declare variables
var input, filter, table, tr, td, i;
input = document.getElementById("input_search");
filter = input.value.toUpperCase();
table = document.getElementById("contentTable");
tr = table.getElementsByTagName("tr");

// Loop through all table rows, and hide those who don't match the search query
for (i = 0; i < tr.length; i++) {
	td = tr[i].getElementsByTagName("td")[1];
	if (td) {
		if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
			tr[i].style.display = "";
		} else {
			tr[i].style.display = "none";
		}
	}
}
}
</script>

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
                @guest
                @else
                  @if(Auth::user()->user_type=='BPBD')
                  <a class="btn btn-success" href="{{ route('donasi.create') }}"> Tambah Donasi</a>
                  @endif
                @endguest
                <input type="text" class="form-control text-white" id="input_search" onkeyup="cari()" placeholder="Pencarian berdasarkan donatur">
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="contentTable">
                  <tr>
                      <th>No</th>
                      <!-- <th>ID</th> -->
                      <th>Nama Donatur</th>
                      <th>Kontak</th>
                      <th>Donasi</th>
                      <th>Stok</th>
                      <th>Kategori</th>
                      <th width="280px">Action</th>
                  </tr>
                  @foreach ($donasi as $product)
                  <tr>
                      <td>{{ ++$i }}</td>
                      <!-- <td>{{ $product->id }}</td> -->
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->kontak }}</td>
                      <td>{{ $product->nama }}</td>
                      <td>{{ $product->stok }}</td>
                      <td>{{ $product->kategori }}</td>
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
