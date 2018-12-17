@extends('layout_dasbor')

@section('content')

<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-warning card-header-icon">
        <div class="card-icon">
          <i class="material-icons">content_copy</i>
        </div>
        <p class="card-category">Total Unit Logistik</p>
        <h3 class="card-title">{{$sum_logistik}}
          <small> Unit</small>
        </h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons text-danger">warning</i>
          <a href="#pablo">Lihat detil logistik</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-success card-header-icon">
        <div class="card-icon">
          <i class="material-icons">home</i>
        </div>
        <p class="card-category">Total Pengungsian</p>
        <h3 class="card-title">{{$count_pengungsian}}
          <small> Pengungsian</small>
        </h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons">date_range</i> Lihat detil pengungsian
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-danger card-header-icon">
        <div class="card-icon">
          <i class="material-icons">info_outline</i>
        </div>
        <p class="card-category">Laporan Masuk</p>
        <h3 class="card-title">{{$count_laporan}}
        <small>Laporan</small></h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons">local_offer</i> Lihat detil laporan
        </div>
      </div>
    </div>
  </div>
</div>
<!-- <div class="row">
  <div class="col-md-4">
    <div class="card card-chart">
      <div class="card-header card-header-success">
        <div class="ct-chart" id="dailySalesChart"></div>
      </div>
      <div class="card-body">
        <h4 class="card-title">Daily Sales</h4>
        <p class="card-category">
          <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons">access_time</i> updated 4 minutes ago
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-chart">
      <div class="card-header card-header-warning">
        <div class="ct-chart" id="websiteViewsChart"></div>
      </div>
      <div class="card-body">
        <h4 class="card-title">Email Subscriptions</h4>
        <p class="card-category">Last Campaign Performance</p>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons">access_time</i> campaign sent 2 days ago
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-chart">
      <div class="card-header card-header-danger">
        <div class="ct-chart" id="completedTasksChart"></div>
      </div>
      <div class="card-body">
        <h4 class="card-title">Completed Tasks</h4>
        <p class="card-category">Last Campaign Performance</p>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons">access_time</i> campaign sent 2 days ago
        </div>
      </div>
    </div>
  </div>
</div> -->
<div class="row">
  <div class="col-lg-6 col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Laporan Terbaru</h4>
        <p class="card-category">Laporan terbaru pada {{$laporan[4]->created_at}}</p>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-hover">
          <tr>
              <th>No</th>
              <!-- <th>ID</th> -->
              <th>Nama Pelapor</th>
              <th>Kontak</th>
              <th>Lokasi</th>
              <th>Kebutuhan</th>
              <th>Catatan</th>
          </tr>
          <?php $i=0;?>
          @foreach ($laporan as $product)
          <tr>
              <td>{{ ++$i }}</td>
              <!-- <td>{{ $product->id }}</td> -->
              <td>{{ $product->nama_pelapor }}</td>
              <td>{{ $product->kontak }}</td>
              <td>{{ $product->lokasi }}</td>
              <td>{{ $product->kategori }}</td>
              <td>{{ substr($product->catatan,0,30)}}...</td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-md-12">
    <div class="card">
      <div class="card-header card-header-warning">
        <h4 class="card-title">Logistik Terbaru</h4>
        <p class="card-category">Logistik terbaru datang pada {{$logistiks[4]->created_at}}</p>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-hover">
          <tr>
              <th>No</th>
              <!-- <th>ID</th> -->
              <th>Nama</th>
              <th>Stok</th>
              <th>Kadaluarsa</th>
              <th>Kategori</th>
              <th>Daerah</th>
          </tr>
          <?php $i=0;?>
          @foreach ($logistiks as $product)
          <tr>
              <td>{{ ++$i }}</td>
              <!-- <td>{{ $product->id }}</td> -->
              <td>{{ $product->nama }}</td>
              <td>{{ $product->stok }}</td>
              <td>{{ $product->kadaluarsa }}</td>
              <td>{{ $product->nama_kategori }}</td>
              <td>{{ $product->daerah }}</td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
