@extends('layout')

@section('content')
  <main>
    <div class="position-relative">
      <!-- shape Hero -->
      <section class="section section-lg section-shaped pb-250">
        <div class="shape shape-style-1 shape-default bg-home" >
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="container py-lg-md d-flex">
          <div class="col px-0">
            <div class="row">
              <div class="col-lg-9">
                <h1 class="display-3  text-white">Sistem Distribusi Logistik
                  <span>M I S T I K</span>
                </h1>
                <p class="lead text-white">Mistik merupakan layanan web untuk membantu pendistribusian logistik ke tempat-tempat kejadian bencana sehingga dapat membantu memudahkan pemerataan distribusi logistik untuk mendukung penanganan bencana.</p>
                <div class="btn-wrapper">
                  <a href="{{URL::to('/')}}/laporkan" class="btn btn-info btn-icon mb-3 mb-sm-0">
                    <span class="btn-inner--icon"><i class="fas fa-clipboard-check"></i></span>
                    <span class="btn-inner--text">Laporkan Kebutuhan Logistik</span>
                  </a>
                  <a href="{{URL::to('/')}}/logistik" class="btn btn-white btn-icon mb-3 mb-sm-0">
                    <span class="btn-inner--icon"><i class="fas fa-clipboard-list"></i></span>
                    <span class="btn-inner--text">Lihat Laporan Logistik</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- SVG separator -->
        <div class="separator separator-bottom separator-skew">
          <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
      </section>
      <!-- 1st Hero Variation -->
    </div>
    <section class="section section-lg pt-lg-0 mt--200">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="row row-grid">
              <div class="col-lg-4">
                <div class="card shadow border-0">
                  <div class="card-body py-5">
                    <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
                      <i class="ni ni-check-bold"></i>
                    </div>
                    <h6 class="text-primary text-uppercase">Pantau Kebutuhan Logistik</h6>
                    <p class="description mt-3">Layanan MISTIK memungkinkan BDPB atau instansi terkait untuk mengetahui kebutuhan logistik seperti apa di tempat kejadian bencana secara real time. Sehingga pendistribusian logistik terlaksana secara tepat waktu dan sasaran sesuai yang dibutuhkan tempat pengungsian.</p>
                    <div>
                      <span class="badge badge-pill badge-primary">pantau</span>
                      <span class="badge badge-pill badge-primary">hitung</span>
                      <span class="badge badge-pill badge-primary">laporkan</span>
                    </div>
                    <!-- <a href="#" class="btn btn-primary mt-4">Lebih Lanjut</a> -->
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card shadow border-0">
                  <div class="card-body py-5">
                    <div class="icon icon-shape icon-shape-success rounded-circle mb-4">
                      <i class="ni ni-istanbul"></i>
                    </div>
                    <h6 class="text-success text-uppercase">Monitor Ketersediaan Logistik</h6>
                    <p class="description mt-3">Ketersediaan logistik untuk membantu mitigasi bencana sangatlah penting. MISTIK memungkinkan pemantauan ketersediaan stok logistik yang diperlukan serta daerah stok tersebut berada. Sehingga dapat menghindarkan penumpukan ketersediaan logistik di suatu wilayah bencana.</p>
                    <div>
                      <span class="badge badge-pill badge-success">pemerataan</span>
                      <span class="badge badge-pill badge-success">distribusi</span>
                    </div>
                    <!-- <a href="#" class="btn btn-success mt-4">Lebih Lanjut</a> -->
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card shadow border-0">
                  <div class="card-body py-5">
                    <div class="icon icon-shape icon-shape-warning rounded-circle mb-4">
                      <i class="ni ni-planet"></i>
                    </div>
                    <h6 class="text-warning text-uppercase">Terima Bantuan Logistik</h6>
                    <p class="description mt-3">Laporan kebutuhan logistik dari tempat pengungsian mendorong berbagai kalangan untuk turut membantu mitigasi bencana. MISTIK memudahkan pencatatan bantuan dari donatur baik itu bantuan barang logistik atau uang tunai untuk selanjutnya didistribusikan ke wilayah yang membutuhkan.</p>
                    <div>
                      <span class="badge badge-pill badge-warning">bantuan</span>
                      <span class="badge badge-pill badge-warning">donasi</span>
                    </div>
                    <!-- <a href="#" class="btn btn-warning mt-4">Lebih Lanjut</a> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- <section class="section section-lg">
      <div class="container">
        <div class="row row-grid align-items-center">
          <div class="col-md-6 order-md-2">
            <img src="{{URL::to('/')}}/img/theme/promo-1.png" class="img-fluid floating">
          </div>
          <div class="col-md-6 order-md-1">
            <div class="pr-md-5">
              <div class="icon icon-lg icon-shape icon-shape-success shadow rounded-circle mb-5">
                <i class="ni ni-settings-gear-65"></i>
              </div>
              <h3>Awesome features</h3>
              <p>The kit comes with three pre-built pages to help you get started faster. You can change the text and images and you're good to go.</p>
              <ul class="list-unstyled mt-5">
                <li class="py-2">
                  <div class="d-flex align-items-center">
                    <div>
                      <div class="badge badge-circle badge-success mr-3">
                        <i class="ni ni-settings-gear-65"></i>
                      </div>
                    </div>
                    <div>
                      <h6 class="mb-0">Carefully crafted components</h6>
                    </div>
                  </div>
                </li>
                <li class="py-2">
                  <div class="d-flex align-items-center">
                    <div>
                      <div class="badge badge-circle badge-success mr-3">
                        <i class="ni ni-html5"></i>
                      </div>
                    </div>
                    <div>
                      <h6 class="mb-0">Amazing page examples</h6>
                    </div>
                  </div>
                </li>
                <li class="py-2">
                  <div class="d-flex align-items-center">
                    <div>
                      <div class="badge badge-circle badge-success mr-3">
                        <i class="ni ni-satisfied"></i>
                      </div>
                    </div>
                    <div>
                      <h6 class="mb-0">Super friendly support team</h6>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- <section class="section bg-secondary">
      <div class="container">
        <div class="row row-grid align-items-center">
          <div class="col-md-6">
            <div class="card bg-default shadow border-0">
              <img src="{{URL::to('/')}}/img/theme/img-1-1200x1000.jpg" class="card-img-top">
              <blockquote class="card-blockquote">
                <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95" class="svg-bg">
                  <polygon points="0,52 583,95 0,95" class="fill-default" />
                  <polygon points="0,42 583,95 683,0 0,95" opacity=".2" class="fill-default" />
                </svg>
                <h4 class="display-3 font-weight-bold text-white">Design System</h4>
                <p class="lead text-italic text-white">The Arctic Ocean freezes every winter and much of the sea-ice then thaws every summer, and that process will continue whatever happens.</p>
              </blockquote>
            </div>
          </div>
          <div class="col-md-6">
            <div class="pl-md-5">
              <div class="icon icon-lg icon-shape icon-shape-warning shadow rounded-circle mb-5">
                <i class="ni ni-settings"></i>
              </div>
              <h3>Our customers</h3>
              <p class="lead">Don't let your uses guess by attaching tooltips and popoves to any element. Just make sure you enable them first via JavaScript.</p>
              <p>The kit comes with three pre-built pages to help you get started faster. You can change the text and images and you're good to go.</p>
              <p>The kit comes with three pre-built pages to help you get started faster. You can change the text and images and you're good to go.</p>
              <a href="#" class="font-weight-bold text-warning mt-5">A beautiful UI Kit for impactful websites</a>
            </div>
          </div>
        </div>
      </div>
    </section>
     -->
    <!-- <section class="section pb-0 bg-gradient-warning">
      <div class="container">
        <div class="row row-grid align-items-center">
          <div class="col-md-6 order-lg-2 ml-lg-auto">
            <div class="position-relative pl-md-5">
              <img src="{{URL::to('/')}}/img/ill/ill-2.svg" class="img-center img-fluid">
            </div>
          </div>
          <div class="col-lg-6 order-lg-1">
            <div class="d-flex px-3">
              <div>
                <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
                  <i class="ni ni-building text-primary"></i>
                </div>
              </div>
              <div class="pl-4">
                <h4 class="display-3 text-white">Modern Interface</h4>
                <p class="text-white">The Arctic Ocean freezes every winter and much of the sea-ice then thaws every summer, and that process will continue whatever.</p>
              </div>
            </div>
            <div class="card shadow shadow-lg--hover mt-5">
              <div class="card-body">
                <div class="d-flex px-3">
                  <div>
                    <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                      <i class="ni ni-satisfied"></i>
                    </div>
                  </div>
                  <div class="pl-4">
                    <h5 class="title text-success">Awesome Support</h5>
                    <p>The Arctic Ocean freezes every winter and much of the sea-ice then thaws every summer, and that process will continue whatever.</p>
                    <a href="#" class="text-success">Learn more</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="card shadow shadow-lg--hover mt-5">
              <div class="card-body">
                <div class="d-flex px-3">
                  <div>
                    <div class="icon icon-shape bg-gradient-warning rounded-circle text-white">
                      <i class="ni ni-active-40"></i>
                    </div>
                  </div>
                  <div class="pl-4">
                    <h5 class="title text-warning">Modular Components</h5>
                    <p>The Arctic Ocean freezes every winter and much of the sea-ice then thaws every summer, and that process will continue whatever.</p>
                    <a href="#" class="text-warning">Learn more</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </section> -->

    <section class="section section-lg pt-0">
      <div class="container">
      </div>
    </section>

    <section class="section section-lg bg-gradient-default">
      <div class="container pt-lg pb-300">
        <div class="row text-center justify-content-center">
          <div class="col-lg-10">
            <h2 class="display-3 text-white">Hubungi Kami</h2>
            <p class="lead text-white">Tulis sesuatu kepada kami. Pesan, saran, kritik, atau yang lain kami terima.</p>
          </div>
        </div>
      </div>


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
            <div class="card bg-gradient-secondary shadow">
              <div class="card-body p-lg-5">
                <h4 class="mb-1">Ada pesan untuk disampaikan?</h4>
                <p class="mt-0">Kami sangat terbuka untuk pesan dan masukan.</p>
                <div class="form-group mt-5">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-user-run"></i></span>
                    </div>
                    <input class="form-control" placeholder="Nama anda" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Alamat email" type="email">
                  </div>
                </div>
                <div class="form-group mb-4">
                  <textarea class="form-control form-control-alternative" name="name" rows="4" cols="80" placeholder="Ketikkan pesan..."></textarea>
                </div>
                <div>
                  <button type="button" class="btn btn-default btn-round btn-block btn-lg">Kirim Pesan</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
