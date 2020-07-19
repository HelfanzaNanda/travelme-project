<!doctype html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Mobiom">
  <meta name="keywords" content="Mobiom">
  <meta name="apple-mobile-web-app-capable" content="yes">
  
  <title>Travelme</title>
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

    <!-- Plugin CSS -->
  <link href="{{ asset('static/plugin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('static/plugin/font-awesome/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('static/plugin/et-line/style.css') }}" rel="stylesheet">
  <link href="{{ asset('static/plugin/themify-icons/themify-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('static/plugin/owl-carousel/css/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('static/plugin/magnific/magnific-popup.css') }}" rel="stylesheet">
  
  <link href="{{ asset('static/style/master.css') }}" rel="stylesheet">
  

</head>

<!-- ========== Body Starts ========== -->
<!-- Body Start -->
<body data-spy="scroll" data-target="#navbar" data-offset="98">

  <!-- Loading -->
  <div id="loading">
    <div class="load-circle"><span class="one"></span></div>
  </div>
  <!-- / -->

  <!-- Header -->
  <header class="header-nav">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <!-- Brand -->
        <a class="navbar-brand" href="#">
          <img src="{{ asset('logo/android-icon-144x144-2.png') }}" title="" alt="">
        </a>
        <!-- / -->

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
        </button>
        <!-- / -->

        <!-- Top Menu -->
        <div class="collapse navbar-collapse justify-content-end" id="navbar">
          <ul class="navbar-nav ml-auto align-items-lg-center">
            <li><a class="nav-link" href="#home">Home</a></li>
            <li><a class="nav-link" href="#about">Tentang</a></li>
            <li><a class="nav-link" href="#feature">Fitur</a></li>
            <li><a class="nav-link-btn" href="{{ route('owner.login') }}">Login</a></li>
            <li><a class="nav-link-btn" href="{{ route('owner.register') }}">Register</a></li>
          </ul>
        </div>
        <!-- / -->

      </div><!-- Container -->
    </nav> <!-- Navbar -->
  </header>
  <!-- Header End -->

  <!-- Main -->
  <main>
    <!-- 
    =======================
    Home Banners
    =======================
    -->
    <section id="home" class="home-banner gray-bg">
      <div class="container">
        <div class="row full-screen align-items-center justify-content-center">
          <div class="col-lg-5">
            <div class="hb-text">
              <h1 class="dark-color font-alt">Travelme</h1>
              <p>Sistem Pemesanan Travel dengan mempermudah travel dalam pencatatan pesanan masuk</p>
            </div>
            <div class="btn-bar">
              <a class="m-btn m-btn-theme" href="{{ route('owner.register') }}">Daftarkan Sekarang</a>
            </div>
          </div>
          <div class="col-lg-7 md-p-15px-l p-50px-l">
            <img src="static/img/feature-6.svg">
          </div>
        </div>
      </div> <!-- container -->
    </section>

    <!-- 
    =======================
    About Us
    =======================
    -->
    <section id="about" class="section">
      <div class="container">
        <div class="row m-45px-b sm-m-25px-b justify-content-center">
          <div class="col-md-8 col-lg-6">
            <div class="section-title text-center">
              <h3 class="dark-color font-alt">Tentang</h3>
              <p class="large-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div> <!-- col -->
        </div> <!-- row -->
        
        <div class="row">
          <div class="col-md-12 col-lg-4 m-15px-tb">
            <div class="blog-item hover-shadow">
              <div class="blog-img">
                <a href="#">
                  <img src="static/img/blog-1.jpg" title="" alt="">
                </a>
              </div>
              <div class="blog-info">
                <div class="cat-name"><a href="#">Latest Blog</a></div>
                <div class="blot-title">
                  <a class="theme-color font-alt" href="#">Specialized Design Tool for 2019</a>
                </div>
                <div class="blot-desc">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                </div>
                <div class="blot-meta d-flex align-items-center no-gutters">
                  <div class="post-author col-6">
                    <a href="#">
                      <div class="pa-avtar">
                        <img src="static/img/round1.jpg" title="" alt="">
                      </div>
                      <span>Pxdeaft Theme</span>
                    </a>
                  </div>
                  <div class="post-date col-6 text-right">
                    <i class="far fa-calendar"></i>
                    Feb 02, 2019
                  </div>
                  
                </div>
              </div>
            </div> <!-- blo -->
          </div> <!-- col -->

          <div class="col-md-6 col-lg-4 m-15px-tb">
            <div class="blog-item hover-shadow">
              <div class="blog-img">
                <a href="#">
                  <img src="static/img/blog-2.jpg" title="" alt="">
                </a>
              </div>
              <div class="blog-info">
                <div class="cat-name"><a href="#">Latest Blog</a></div>
                <div class="blot-title">
                  <a class="theme-color font-alt" href="#">Specialized Design Tool for 2019</a>
                </div>
                <div class="blot-desc">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                </div>
                <div class="blot-meta d-flex align-items-center no-gutters">
                  <div class="post-author col-6">
                    <a href="#">
                      <div class="pa-avtar">
                        <img src="static/img/round1.jpg" title="" alt="">
                      </div>
                      <span>Pxdeaft Theme</span>
                    </a>
                  </div>
                  <div class="post-date col-6 text-right">
                    <i class="far fa-calendar"></i>
                    Feb 02, 2019
                  </div>
                  
                </div>
              </div>
            </div> <!-- blo -->
          </div> <!-- col -->

          <div class="col-md-6 col-lg-4 m-15px-tb">
            <div class="blog-item hover-shadow">
              <div class="blog-img">
                <a href="#">
                  <img src="static/img/blog-4.jpg" title="" alt="">
                </a>
              </div>
              <div class="blog-info">
                <div class="cat-name"><a href="#">Latest Blog</a></div>
                <div class="blot-title">
                  <a class="theme-color font-alt" href="#">Specialized Design Tool for 2019</a>
                </div>
                <div class="blot-desc">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                </div>
                <div class="blot-meta d-flex align-items-center no-gutters">
                  <div class="post-author col-6">
                    <a href="#">
                      <div class="pa-avtar">
                        <img src="static/img/round1.jpg" title="" alt="">
                      </div>
                      <span>Pxdeaft Theme</span>
                    </a>
                  </div>
                  <div class="post-date col-6 text-right">
                    <i class="far fa-calendar"></i>
                    Feb 02, 2019
                  </div>
                  
                </div>
              </div>
            </div> <!-- blo -->
          </div> <!-- col -->

        </div> <!-- row -->

      </div> <!-- container -->
    </section>

    <!-- 
    =======================
    Features
    =======================
    -->

    <section id="feature" class="section gray-bg">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7">
            <img src="{{ asset('static/img/feature-2.svg') }}" title="" alt="">
          </div>
          <div class="col-lg-5">
            <div class="side-feature md-m-30px-t">
              <div class="feature-content">
                <h2 class="dark-color font-alt">Grafik Total Pesanan Masuk Pebulan</h2>
                <p>Mempermudah dalam menghitung total pesanan selesai per bulan</p>
                <div class="read-more">
                  <a class="more-btn" href="#">Get Started Now!</a>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- row -->
      </div>
    </section>

    <!-- 
    =======================
    Features
    =======================
    -->
    <section class="section overflow-hidden">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5">
            <div class="side-feature md-m-30px-b">
              <div class="icon">
                <i class="ti-rocket green"></i>
              </div>
              <div class="feature-content">
                <h2 class="dark-color font-alt">Mempermudah Pencatatan Pesanan</h2>
                <p>tidak perlu melakukan pencatatan manual, karena sudah di sistem</p>
                <div class="read-more">
                  <a class="more-btn" href="#">Get Started Now!</a>
                </div>
              </div>
            </div>
          </div> <!-- col -->
          <div class="col-lg-7">
            <img src="{{ asset('static/img/blog-1.jpg') }}" title="" alt="">
          </div> <!-- col -->
        </div> <!-- row -->
      </div>
    </section>



  </main>

  <!-- 
  =======================
  Footer
  =======================
  -->
  <footer class="footer">
    <div class="container-fluid p-2">
      <img src="static/img/logo-light.svg" class="mr-3">
      <span class="text-muted">Travelme</span>
    </div>
  </footer>
  

  <!-- Jquery -->
  <script src="{{ asset('static/js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('static/js/jquery-migrate-3.0.0.min.js') }}"></script>
  <!-- End -->

  <!-- Plugin JS -->
  <script src="{{ asset('static/plugin/appear/jquery.appear.js') }}"></script><!--appear-->
  <script src="{{ asset('static/plugin/bootstrap/js/popper.min.js') }}"></script><!--popper-->
  <script src="{{ asset('static/plugin/bootstrap/js/bootstrap.js') }}"></script><!--bootstrap-->
  <!-- End -->

  <!-- Custom -->
  <script src="{{ asset('static/js/jquery.parallax-scroll.js') }}"></script>
  <script src="{{ asset('static/js/custom.js') }}"></script>
  <!-- End -->

</body>

</html>