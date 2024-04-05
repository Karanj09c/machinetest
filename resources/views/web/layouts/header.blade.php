<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bouncy House</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ asset('public/web/images/logo.png') }}" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('public/web/css/style.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<nav class="navbar navbar-expand-sm ">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/')}}">
      <img src="{{ asset('public/web/images/logo.png') }}">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/')}}#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/')}}#gallery">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/')}}#contact">Contact Us</a>
        <!--</li> -->
        <!--  <li class="">-->
        <!--  <a class="nav-link" href="booknow.php"><button type="button" class="btn btn-primary">Book Now</button></a>-->
        <!--</li> -->

      </ul>
    </div>
  </div>
</nav>




