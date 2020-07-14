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
          <img src="static/img/logo.svg" title="" alt="">
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
            
            <li><a class="nav-link" href="#feature">Featuresa</a></li>
            <li><a class="nav-link" href="#price">Price</a></li>
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
              <h6 class="theme-color">We are here for you</h6>
              <h1 class="dark-color font-alt">Ultimate Platform to monitor your best workflow</h1>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </p>
              <div class="btn-bar">
                <a class="m-btn m-btn-theme" href="#">Learn More</a>
                <a class="m-btn m-btn-t-theme" href="#">Free Try</a>
              </div>
            </div>
          </div>
          <div class="col-lg-7 md-p-15px-l p-50px-l">
            <img src="static/img/feature-6.svg" title="" alt="">
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
              <h3 class="dark-color font-alt">Our Best Services</h3>
              <p class="large-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div> <!-- col -->
        </div> <!-- row -->
        
        <div class="row">
          <div class="col-md-4 m-15px-tb">
            <div class="feature-box">
              <div class="icon">
                <i class="ti-check-box yellow"></i>
              </div>
              <div class="feature-content">
                <h5 class="dark-color">Instant Setup</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                <div class="read-more">
                  <a class="more-btn" href="#">Read More</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 m-15px-tb">
            <div class="feature-box">
              <div class="icon">
                <i class="ti-rocket green"></i>
              </div>
              <div class="feature-content">
                <h5 class="dark-color">Fast Loading</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                <div class="read-more">
                  <a class="more-btn" href="#">Read More</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 m-15px-tb">
            <div class="feature-box">
              <div class="icon">
                <i class="ti-headphone blue"></i>
              </div>
              <div class="feature-content">
                <h5 class="dark-color">Best Support</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                <div class="read-more">
                  <a class="more-btn" href="#">Read More</a>
                </div>
              </div>
            </div>
          </div>

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
            <img src="static/img/macbook.png" title="" alt="">
          </div>
          <div class="col-lg-5">
            <div class="side-feature md-m-30px-t">
              <div class="icon">
                <i class="ti-check-box yellow"></i>
              </div>
              <div class="feature-content">
                <h2 class="dark-color font-alt">We are branding strategy service</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
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
                <h2 class="dark-color font-alt">We are branding strategy service</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <div class="read-more">
                  <a class="more-btn" href="#">Get Started Now!</a>
                </div>
              </div>
            </div>
          </div> <!-- col -->
          <div class="col-lg-7">
            <img src="static/img/feature-2.png" title="" alt="">
          </div> <!-- col -->
        </div> <!-- row -->
      </div>
    </section>

    <!-- 
    =======================
    Why We are
    =======================
    -->
    <section class="section gray-bg">
      <div class="container">
        <div class="row m-45px-b sm-m-25px-b justify-content-center">
          <div class="col-md-8 col-lg-6">
            <div class="section-title text-center">
              <h3 class="dark-color font-alt">Acutually Why We Are</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div> <!-- col -->
        </div> <!-- row -->

        <div class="row">
          <div class="col-lg-4 col-md-6 m-15px-tb">
            <div class="feature-box-01">
              <div class="icon">
                <i class="ti-pencil-alt"></i>
              </div>
              <div class="feature-content">
                <h5 class="dark-color">Creative Design</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                <div class="read-more">
                  <a class="more-btn" href="#">Read More</a>
                </div>
              </div>
            </div>
          </div> <!-- col -->

          <div class="col-lg-4 col-md-6 m-15px-tb">
            <div class="feature-box-01">
              <div class="icon">
                <i class="ti-check-box"></i>
              </div>
              <div class="feature-content">
                <h5 class="dark-color">Instant Setup</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                <div class="read-more">
                  <a class="more-btn" href="#">Read More</a>
                </div>
              </div>
            </div>
          </div> <!-- col -->

          <div class="col-lg-4 col-md-6 m-15px-tb">
            <div class="feature-box-01">
              <div class="icon">
                <i class="ti-rocket"></i>
              </div>
              <div class="feature-content">
                <h5 class="dark-color">Fast Loading</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                <div class="read-more">
                  <a class="more-btn" href="#">Read More</a>
                </div>
              </div>
            </div>
          </div> <!-- col -->

          <div class="col-lg-4 col-md-6 m-15px-tb">
            <div class="feature-box-01">
              <div class="icon">
                <i class="ti-headphone"></i>
              </div>
              <div class="feature-content">
                <h5 class="dark-color">Best Support</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                <div class="read-more">
                  <a class="more-btn" href="#">Read More</a>
                </div>
              </div>
            </div>
          </div> <!-- col -->

          <div class="col-lg-4 col-md-6 m-15px-tb">
            <div class="feature-box-01">
              <div class="icon">
                <i class="ti-flag-alt"></i>
              </div>
              <div class="feature-content">
                <h5 class="dark-color">Affordable Price</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                <div class="read-more">
                  <a class="more-btn" href="#">Read More</a>
                </div>
              </div>
            </div>
          </div> <!-- col -->

          <div class="col-lg-4 col-md-6 m-15px-tb">
            <div class="feature-box-01">
              <div class="icon">
                <i class="ti-pencil-alt"></i>
              </div>
              <div class="feature-content">
                <h5 class="dark-color">Instant Setup</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                <div class="read-more">
                  <a class="more-btn" href="#">Read More</a>
                </div>
              </div>
            </div>
          </div> <!-- col -->
        </div> <!-- row -->

      </div>
    </section>

    <!-- 
    =======================
    Price Table
    =======================
    -->
    <section class="section" id="price">
      <div class="container">
        <div class="row m-45px-b sm-m-25px-b justify-content-center">
          <div class="col-md-8 col-lg-8">
            <div class="section-title text-center">
              <h3 class="dark-color font-alt">Unlimited Courses on all Plans</h3>
              <p class="large-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div> <!-- col -->
        </div> <!-- row -->

        <div class="row">
          <div class="col-lg-3 col-md-6 m-15px-tb">
            <div class="price-table">
              <div class="icon">
                <img src="static/img/bike.svg" title="" alt="">
              </div>
              <div class="pt-head">
                <h6 class="dark-color font-alt">Starter</h6>
                <div class="pt-price theme-color">
                  $49<span>/Month</span>
                </div>
              </div>
              <div class="pt-body">
                <ul>
                  <li><b>limited</b> Submissions</li>
                  <li class="pt-no"><b>mailchimp</b> integration</li>
                  <li class="pt-no"><b>Adwords</b> integration</li>
                </ul>
              </div>
              <div class="pt-btn">
                  <a href="#" class="m-btn m-btn-theme">Buy Now</a>
                </div>
            </div>
          </div> <!-- col -->

          <div class="col-lg-3 col-md-6 m-15px-tb">
            <div class="price-table">
              <div class="icon">
                <img src="static/img/scooter.svg" title="" alt="">
              </div>
              <div class="pt-head">
                <h6 class="dark-color font-alt">Standard</h6>
                <div class="pt-price theme-color">
                  $66<span>/Month</span>
                </div>
              </div>
              <div class="pt-body">
                <ul>
                  <li><b>limited</b> Submissions</li>
                  <li class="pt-no"><b>mailchimp</b> integration</li>
                  <li class="pt-no"><b>Adwords</b> integration</li>
                </ul>
              </div>
              <div class="pt-btn">
                  <a href="#" class="m-btn m-btn-theme">Buy Now</a>
                </div>
            </div>
          </div> <!-- col -->

          <div class="col-lg-3 col-md-6 m-15px-tb">
            <div class="price-table">
              <div class="icon">
                <img src="static/img/car.svg" title="" alt="">
              </div>
              <div class="pt-head">
                <h6 class="dark-color font-alt">Professional</h6>
                <div class="pt-price theme-color">
                  $110<span>/Month</span>
                </div>
              </div>
              <div class="pt-body">
                <ul>
                  <li><b>limited</b> Submissions</li>
                  <li class="pt-no"><b>mailchimp</b> integration</li>
                  <li class="pt-no"><b>Adwords</b> integration</li>
                </ul>
              </div>
              <div class="pt-btn">
                  <a href="#" class="m-btn m-btn-theme">Buy Now</a>
                </div>
            </div>
          </div> <!-- col -->

          <div class="col-lg-3 col-md-6 m-15px-tb">
            <div class="price-table">
              <div class="icon">
                <img src="static/img/airplane.svg" title="" alt="">
              </div>
              <div class="pt-head">
                <h6 class="dark-color font-alt">Enterprise</h6>
                <div class="pt-price theme-color">
                  $199<span>/Month</span>
                </div>
              </div>
              <div class="pt-body">
                <ul>
                  <li><b>limited</b> Submissions</li>
                  <li class="pt-no"><b>mailchimp</b> integration</li>
                  <li class="pt-no"><b>Adwords</b> integration</li>
                </ul>
              </div>
              <div class="pt-btn">
                  <a href="#" class="m-btn m-btn-theme">Buy Now</a>
                </div>
            </div>
          </div> <!-- col -->
        </div> <!-- row -->
      </div>
    </section>

    <!-- 
    =======================
    Brand
    =======================
    -->
    <section class="section gray-bg">
      <div class="container">
        <div class="row m-45px-b justify-content-center">
          <div class="col-md-8 col-lg-8">
            <div class="section-title text-center">
              <h3 class="dark-color font-alt">Trusted services from top-rated company</h3>
              <p class="large-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div> <!-- col -->
        </div> <!-- row -->

        <div class="row">
          <div class="col-sm-6 col-md-3 m-15px-tb">
            <div class="brand-logo">
              <img src="static/img/logo-1.png" title="" alt="">
            </div>
          </div> <!-- col -->

          <div class="col-sm-6 col-md-3 m-15px-tb">
            <div class="brand-logo">
              <img src="static/img/logo-8.png" title="" alt="">
            </div>
          </div> <!-- col -->

          <div class="col-sm-6 col-md-3 m-15px-tb">
            <div class="brand-logo">
              <img src="static/img/logo-2.png" title="" alt="">
            </div>
          </div> <!-- col -->

          <div class="col-sm-6 col-md-3 m-15px-tb">
            <div class="brand-logo">
              <img src="static/img/logo-3.png" title="" alt="">
            </div>
          </div> <!-- col -->

          <div class="col-sm-6 col-md-3 m-15px-tb">
            <div class="brand-logo">
              <img src="static/img/logo-4.png" title="" alt="">
            </div>
          </div> <!-- col -->

          <div class="col-sm-6 col-md-3 m-15px-tb">
            <div class="brand-logo">
              <img src="static/img/logo-5.png" title="" alt="">
            </div>
          </div> <!-- col -->

          <div class="col-sm-6 col-md-3 m-15px-tb">
            <div class="brand-logo">
              <img src="static/img/logo-6.png" title="" alt="">
            </div>
          </div> <!-- col -->

          <div class="col-sm-6 col-md-3 m-15px-tb">
            <div class="brand-logo">
              <img src="static/img/logo-8.png" title="" alt="">
            </div>
          </div> <!-- col -->

        </div> <!-- row -->
      </div>
    </section>

    <!-- 
    =======================
    Testimonials
    =======================
    -->
    <section class="section">
      <div class="container">
        <div class="row m-45px-b sm-m-25px-b justify-content-center">
          <div class="col-md-8 col-lg-6">
            <div class="section-title text-center">
              <h3 class="dark-color font-alt">Why do people love us?</h3>
              <p class="large-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div> <!-- col -->
        </div> <!-- row -->

         <div class="row">
          <div class="col-md-12">
            <div class="owl-carousel" data-items="3" data-nav-dots="true" data-md-items="2" data-sm-items="2" data-xs-items="1" data-xx-items="1" data-space="30">
              <div class="testimonial m-15px-tb">
                <div class="avtar"><img src="static/img/round1.jpg" title="" alt=""></div>
                <div class="testimonial-content">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
                <div class="name">
                  <span class="dark-color">Morgan Cruz</span>
                  <label>/ Web Designer</label>
                </div>
              </div> <!-- testimonial -->

              <div class="testimonial m-15px-tb">
                <div class="avtar"><img src="static/img/round1.jpg" title="" alt=""></div>
                <div class="testimonial-content">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
                <div class="name">
                  <span class="dark-color">Morgan Cruz</span>
                  <label>/ Web Designer</label>
                </div>
              </div> <!-- testimonial -->

              <div class="testimonial m-15px-tb">
                <div class="avtar"><img src="static/img/round1.jpg" title="" alt=""></div>
                <div class="testimonial-content">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
                <div class="name">
                  <span class="dark-color">Morgan Cruz</span>
                  <label>/ Web Designer</label>
                </div>
              </div> <!-- testimonial -->

              <div class="testimonial m-15px-tb">
                <div class="avtar"><img src="static/img/round1.jpg" title="" alt=""></div>
                <div class="testimonial-content">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
                <div class="name">
                  <span class="dark-color">Morgan Cruz</span>
                  <label>/ Web Designer</label>
                </div>
              </div> <!-- testimonial -->
            </div>
          </div>
        </div> <!-- row -->
      </div>
    </section>

    <!-- 
    =======================
    Call to actions
    =======================
    -->
    <section class="p-50px-tb theme-bg callto-actions">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 text-center text-md-left sm-m-30px-b">
            <label>Get it now</label>
            <h4 class="white-color font-alt">Download Our Web Application</h4>
            <p class="white-color-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
            <div class="btn-bar">
              <a href="#" class="m-btn m-btn-t-white">Try It Now</a>
            </div>
          </div> <!-- col -->
          <div class="col-md-6">
            <img src="static/img/macbook.png" title="" alt="">
          </div>
        </div> <!-- row -->
      </div>      
    </section>

    <!-- 
    =======================
    Latest Blog
    =======================
    -->
    <section class="section" id="blog">
      <div class="container">
        <div class="row m-45px-b sm-m-25px-b justify-content-center">
          <div class="col-md-8 col-lg-6">
            <div class="section-title text-center">
              <h3 class="dark-color font-alt">Latest Blog</h3>
              <p class="large-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div> <!-- col -->
        </div>

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
        </div>

      </div>
    </section>

    <!-- 
    =======================
    Latest Blog
    =======================
    -->

    <section class="section gray-bg" id="contactus">
      <div class="container">
        <div class="row m-45px-b sm-m-25px-b justify-content-center">
          <div class="col-md-8 col-lg-6">
            <div class="section-title text-center">
              <h3 class="dark-color font-alt">Be our partners!</h3>
              <p class="large-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div> <!-- col -->
        </div>

        <div class="row align-items-center">
          <div class="col-lg-7">
            <div class="contact-form box-shadow white-bg">
                <h4 class="dark-color font-alt m-30px-b">Say Something</h4>
                <form class="contactform" method="post" action="https://www.pxdraft.com/themeforest/mobiom/mobiom/static/php/process-form.php">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input id="name" name="name" type="text" placeholder="Name" class="form-xl form-control" required="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input id="email" type="email" placeholder="Email" name="email" class="form-xl form-control" required="">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <textarea id="message" placeholder="Your Comment" name="message" class="form-xl form-control" required=""></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="send">
                           <button class="m-btn m-btn-t-theme" type="submit" name="send">Get in touch</button>
                        </div>
                    </div>
                  </div>
                </form>
            </div>
          </div>
          <div class="col-lg-5 col-md-6 d-none d-lg-block">
            <img src="static/img/feature-2.svg" alt="aeroland-startup-image-02" title="">
          </div>
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
    <div class="footer-middle">
      <div class="container">
        <div class="row">
          <div class="col-md-12 md-m-25px-b col-lg-4">
            <p class="m-25px-b"><a href="#"><img src="static/img/logo-light.svg" title="" alt=""></a></p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
            <div class="newsletter-box">
                <input name="email" placeholder="Email Address" class="form-control" type="text">
                <button type="submit" class="m-btn m-btn-theme"><i class="fab fa-telegram-plane"></i></button>
            </div>
          </div> <!-- col -->

          <div class="col-sm-6 col-md-3 col-lg-2 md-m-15px-tb">
            <h6 class="font-alt">Company</h6>
            <ul class="nav flex-column">
              <li class="nav-item"><a href="#">About</a></li>
              <li class="nav-item"><a href="#">Careers</a></li>
              <li class="nav-item"><a href="#">Contact</a></li>
              <li class="nav-item"><a href="#">Privacy Policy</a></li>
            </ul>
          </div> <!-- col -->

          <div class="col-sm-6 col-md-3 col-lg-2 md-m-15px-tb">
            <h6 class="font-alt">Product</h6>
            <ul class="nav flex-column">
              <li class="nav-item"><a href="#">Features</a></li>
              <li class="nav-item"><a href="#">Pricing</a></li>
              <li class="nav-item"><a href="#">Security</a></li>
              <li class="nav-item"><a href="#">Roofing</a></li>
            </ul>
          </div> <!-- col -->

          <div class="col-sm-6 col-md-3 col-lg-2 md-m-15px-tb">
            <h6 class="font-alt">Product</h6>
            <ul class="nav flex-column">
              <li class="nav-item"><a href="#">Features</a></li>
              <li class="nav-item"><a href="#">Pricing</a></li>
              <li class="nav-item"><a href="#">Security</a></li>
              <li class="nav-item"><a href="#">Roofing</a></li>
            </ul>
          </div> <!-- col -->
          <div class="col-sm-6 col-md-3 col-lg-2 md-m-15px-tb">
            <h6 class="font-alt">Information</h6>
            <ul class="nav flex-column">
              <li class="nav-item">
                <p>301 The Greenhouse London, E2 8DY UK</p>
                <p>support@domain.com<br>+01 440 444 4526</p>
              </li>
            </ul>
          </div> <!-- col -->
        </div> <!-- row -->
      </div>
    </div> <!-- footer-middle -->

    <div class="footer-bottom">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 text-center text-lg-left">
            <p>All © Copyright Reserved.</p>
          </div>
          <div class="col-lg-6 text-center text-lg-right">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fab fa-facebook-square"></i></a></li>
              <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a class="google" href="#"><i class="fab fa-linkedin"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
          </div>
        </div> <!-- row -->
      </div>
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