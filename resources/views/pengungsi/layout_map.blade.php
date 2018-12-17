<!DOCTYPE html>

<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistem Distribusi Logistik - Mistik</title>
    <!-- Favicon -->
    <link href="{{URL::to('/dashboard')}}/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{URL::to('/dashboard')}}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <link href="{{URL::to('/dashboard')}}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <link href="{{URL::to('/dashboard')}}/demo/demo.css" rel="stylesheet" />

</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../img/sidebar-1.jpg">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="#" class="simple-text logo-normal">
          INNO<strong>FICTION</strong>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/dasbor">
              <i class="material-icons">insert_chart</i>
              <p>Dasbor</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/logistik">
              <i class="material-icons">dashboard</i>
              <p>Logistik</p>
            </a>
          </li>
          <li class="nav-item active ">
            <a class="nav-link" href="/map">
              <i class="material-icons">map</i>
              <p>Peta</p>
            </a>
          </li>
          @guest

          @else
            @if(Auth::user()->user_type=='Relawan')
            <li class="nav-item ">
              <a class="nav-link " href="/laporan">
                <i class="material-icons">description</i>
                <p>Laporan</p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="/pengungsi">
                <i class="material-icons">supervisor_account</i>
                <p>Pengungsi</p>
              </a>
            </li>
            @elseif(Auth::user()->user_type=='Donatur')
            <li class="nav-item  ">
              <a class="nav-link" href="/donasi">
                <i class="material-icons">how_to_vote</i>
                <p>Donasi</p>
              </a>
            </li>
            @elseif(Auth::user()->user_type=='BPBD')
            <li class="nav-item ">
              <a class="nav-link" href="/laporan">
                <i class="material-icons">description</i>
                <p>Laporan</p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="/pengungsi">
                <i class="material-icons">supervisor_account</i>
                <p>Pengungsi</p>
              </a>
            </li>
            <li class="nav-item  ">
              <a class="nav-link" href="/donasi">
                <i class="material-icons">how_to_vote</i>
                <p>Donasi</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="/kategori">
                <i class="material-icons">storage</i>
                <p>Kategori</p>
              </a>
            </li>
            @endif
          @endguest
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <!-- <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Dashboard</a>
          </div> -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="../" class="nav-link" role="button">
                  <i class="ni ni-collection d-lg-none"></i>
                  <span class="nav-link-inner--text">Beranda</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="/logistik" class="nav-link" role="button">
                  <i class="ni ni-collection d-lg-none"></i>
                  <span class="nav-link-inner--text">Stok</span>
                </a>
              </li>
              @guest
              <li class="nav-item">
                  <a href="{{ route('login') }}" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--icon">
                      <i class="fa fa-user-circle mr-2"></i>
                    </span>
                    <span class="nav-link-inner--text">{{ __('Login') }}</span>
                  </a>
              </li>
              @else
                @if(Auth::user()->user_type=='Relawan')
                <li class="nav-item">
                  <a href="/laporan" class="nav-link" role="button">
                    <i class="ni ni-collection d-lg-none"></i>
                    <span class="nav-link-inner--text">Laporan</span>
                  </a>
                </li>
                @elseif(Auth::user()->user_type=='Donatur')
                <li class="nav-item">
                  <a href="/donasi  " class="nav-link" role="button">
                    <i class="ni ni-collection d-lg-none"></i>
                    <span class="nav-link-inner--text">Donasi</span>
                  </a>
                </li>
                @elseif(Auth::user()->user_type=='BPBD')
                <li class="nav-item">
                  <a href="/laporan" class="nav-link" role="button">
                    <i class="ni ni-collection d-lg-none"></i>
                    <span class="nav-link-inner--text">Laporan</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/donasi  " class="nav-link" role="button">
                    <i class="ni ni-collection d-lg-none"></i>
                    <span class="nav-link-inner--text">Donasi</span>
                  </a>
                </li>
                @endif
              <li class="nav-item">
                <a href="/tentang" class="nav-link" role="button">
                  <i class="ni ni-collection d-lg-none"></i>
                  <span class="nav-link-inner--text">Tentang Kami</span>
                </a>
              </li>
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="btn btn-neutral btn-icon dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <span class="btn-inner--icon">
                      <i class="fa fa-user-circle mr-2"></i>
                    </span>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">
                        Status pengguna: <b>{{ Auth::user()->user_type }}</b>
                    </a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>
              @endguest
              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="#">
                  InnoFiction
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="#" target="_blank">Informatika UII</a> for a better web.
          </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>


  <!-- Core -->
  <script src="{{URL::to('/dashboard')}}/js/core/jquery.min.js"></script>
  <script src="{{URL::to('/dashboard')}}/js/core/popper.min.js"></script>
  <script src="{{URL::to('/dashboard')}}/js/core/bootstrap-material-design.min.js"></script>
  <script src="{{URL::to('/dashboard')}}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="{{URL::to('/dashboard')}}/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="{{URL::to('/dashboard')}}/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="{{URL::to('/dashboard')}}/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="{{URL::to('/dashboard')}}/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="{{URL::to('/dashboard')}}/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="{{URL::to('/dashboard')}}/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="{{URL::to('/dashboard')}}/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="{{URL::to('/dashboard')}}/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="{{URL::to('/dashboard')}}/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="{{URL::to('/dashboard')}}/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="{{URL::to('/dashboard')}}/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{URL::to('/dashboard')}}/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="{{URL::to('/dashboard')}}/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYCl9g6BehrGK78Z082mXpb0jIPHHGwYQ&callback=initMap"></script>
  <!-- Chartist JS -->
  <script src="{{URL::to('/dashboard')}}/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="{{URL::to('/dashboard')}}/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{URL::to('/dashboard')}}/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{URL::to('/dashboard')}}/demo/demo.js"></script>

</body>
</html>
