<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
   <title>BPDAS Sei Jang Duriangkang </title>
   <!-- ** Mobile Specific Metas ** -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Business Bootstrap Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Promodise Template v1.0">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ asset('tdash/plugins/bootstrap/bootstrap.min.css') }}">
    
    <!-- Icofont Css -->
    <link rel="stylesheet" href="{{ asset('tdash/plugins/fontawesome/css/all.css') }}">
    
    <!-- Icofont -->
    <link rel="stylesheet" href="{{ asset('tdash/plugins/icofont/icofont.css') }}">
    <link rel="icon" href="{{ asset('/tdash/images/logo.png') }}">
    <!-- Main Stylesheet -->
   <link rel="stylesheet" href="{{ asset('tdash/css/style.css') }}">
    <!--Favicon-->
     <link rel="icon" href="{{ asset('tdash/images/favicon.png') }}" type="image/x-icon">

</head>


<body data-spy="scroll" data-target=".fixed-top">
    <nav class="navbar navbar-expand-lg fixed-top trans-navigation">
            <div class="container">
                <div class="navbar-brand">
                    <img src="{{ asset('tdash/images/logo.png') }}" alt="" class="img-fluid b-logo">
                </div>
                <div class="navbar-brand">
                    <img src="{{ asset('tdash/images/logo2.png') }}" alt="" class="img-fluid b-logo">
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fa fa-bars"></i>
                    </span>
                  </button>
    
                <div class="collapse navbar-collapse justify-content-end" id="mainNav">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a class="nav-link smoth-scroll" href="/">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarWelcome" role="button" data-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              Profil <i class="fas fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarWelcome">
                              <li><a class="dropdown-item" href="profil">Profil Organisasi</a></li>
                              <li><a class="dropdown-item" href="visi-misi">Visi dan Misi Organisasi</a></li>
                              <li><a class="dropdown-item" href="tugas-pokok-dan-fungsi">Tugas Pokok Dan Fungsi</a></li>
                              <li><a class="dropdown-item" href="struktur-organisasi">Struktur Organisasi</a></li>
                            </ul>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarWelcome" role="button" data-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              Pelayanan <i class="fas fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarWelcome">
                              <li><a class="dropdown-item" href="bibit">Bibit Gratis</a></li>
                              <li><a class="dropdown-item" href="#">Konsultasi Penanaman</a></li>
                            </ul>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarWelcome" role="button" data-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              Kegiatan <i class="fas fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarWelcome">
                              <li><a class="dropdown-item" href="#">Kebun Bibit Rakyat</a></li>
                              <li><a class="dropdown-item" href="#">Kebun Bibit Daerah</a></li>
                              <li><a class="dropdown-item" href="#">Rehabilitasi Hutan dan Lahan</a></li>
                              <li><a class="dropdown-item" href="#">Perencanaan dan Evaluasi Pengelolaan<br> 
                                    Daerah Aliran Sungai </a></li>
                              <li><a class="dropdown-item" href="#">Hari Menanam Pohon Indonesia (HMPI)</a></li>

                            </ul>
                          </li>
                        
                        <li class="nav-item">
                            <a class="nav-link smoth-scroll rounded-pill" href="login">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--MAIN HEADER AREA END -->
    
    <!--MAIN BANNER AREA START -->
    <div class="banner-area banner-3">
        <div class="overlay dark-overlay"></div>
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
                            <div class="banner-content content-padding">
                                <h5 class="subtitle">Kementerian Lingkungan Hidup dan Kehutanan</h5>
                                <h1 class="banner-title">BPDAS Sei Jang Duriangkang</h1>
                                <p>Balai Pengelolaan Daerah Aliran Sungai Sei Jang Duriangkang</p>
                                <p>Kepulauan Riau</p>
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--MAIN HEADER AREA END -->

    @yield('content')

    <!--  FOOTER AREA START  -->
<section id="footer" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-8 col-md-8">
                <div class="footer-widget footer-link">
                    <h4>Kami segenap keluarga BPDAS Sei Jang Duriangkang</h4>
                    <p>Mengucapkan terimakasih telah berkunjung di situs Kami, kritik dan saran yang membangun dapat langsung disampaikan dengan menghubungi kontak yang tertera.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="footer-widget footer-text">
                    <h4>Kontak dan Lokasi</h4>
                    <p class="mail"><span>Mail:</span> bpdas-sjd@gmail.com</p>
                    <p><span>Phone :</span>+628117706030</p>
                    <p><span>Alamat:</span> Jl. Dieng Kamboja Km. 14 Kelurahan Air Raja, Tanjungpinang – Kepulauan Riau</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  FOOTER AREA END  -->

   

    <!-- 
    Essential Scripts
    =====================================-->

    
    <!-- Main jQuery -->
    <script src="{{ asset('tdash/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4.3.1 -->
    <script src="{{ asset('tdash/plugins/bootstrap/bootstrap.min.js') }}"></script>
   
     <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU"></script>
    <script src="plugins/google-map/map.js"></script>
    
    <!-- main script -->
    <script src="{{ asset('tdash/js/script.js') }}"></script>
  </body>
  </html>
   