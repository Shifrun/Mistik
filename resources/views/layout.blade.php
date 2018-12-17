<!DOCTYPE html>

<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Sistem Distribusi Logistik - Mistik</title>
    <!-- Favicon -->
    <link href="{{URL::to('/')}}/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <!-- Icons -->
    <link href="{{URL::to('/')}}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- Argon CSS -->
    <link type="text/css" href="{{URL::to('/')}}/css/argon.css?v=1.0.1" rel="stylesheet">
    <!-- Docs CSS -->
    <link type="text/css" href="{{URL::to('/')}}/css/docs.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link type="text/css" href="{{URL::to('/')}}/css/custom.css" rel="stylesheet">


</head>

<body>
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYCl9g6BehrGK78Z082mXpb0jIPHHGwYQ&callback=initMap"></script>
  <!--  Google Maps Plugin    -->

</body>
</html>
