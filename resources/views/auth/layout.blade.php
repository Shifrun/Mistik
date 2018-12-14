<!DOCTYPE html>

<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="InnoFiction">
    <title>Sistem Distribusi Logistik - Mistik</title>
    <!-- Favicon -->
    <link href="{{URL::to('/')}}/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{URL::to('/')}}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{URL::to('/')}}/css/argon.css?v=1.0.1" rel="stylesheet">
    <!-- Docs CSS -->
    <link type="text/css" href="{{URL::to('/')}}/css/docs.min.css" rel="stylesheet">

</head>

<body style="background-image:url('/img/bg-login.jpg')">
  <!-- <div class="container"> -->
    @include('header')
    @yield('content')
    @include('footer')
  <!-- </div> -->

  <!-- Core -->
  <script src="{{URL::to('/')}}/vendor/jquery/jquery.min.js"></script>
  <script src="{{URL::to('/')}}/vendor/popper/popper.min.js"></script>
  <script src="{{URL::to('/')}}/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="{{URL::to('/')}}/vendor/headroom/headroom.min.js"></script>
  <!-- Argon JS -->
  <script src="{{URL::to('/')}}/js/argon.js?v=1.0.1"></script>

</body>
</html>
