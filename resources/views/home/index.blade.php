<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pondok Masa Depan Villa | Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('mamba/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('mamba/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('mamba/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('mamba/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('mamba/assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('mamba/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('mamba/assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('mamba/assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Mamba - v2.5.0
  * Template URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-none d-lg-block bg-danger">
        <div class="container clearfix">
            <div class="contact-info float-left">
                <!-- <i class="icofont-envelope"></i><a href="mailto:contact@example.com">contact@example.com</a>
        <i class="icofont-phone"></i> +1 5589 55488 55 -->
            </div>
            <div class="social-links float-right">
                <a href="#" class="twitter"><i class="icofont-twitter text-white"></i></a>
                <a href="#" class="facebook"><i class="icofont-facebook text-white"></i></a>
                <a href="#" class="instagram"><i class="icofont-instagram text-white"></i></a>
                <a href="#" class="skype"><i class="icofont-skype text-white"></i></a>
                <a href="#" class="linkedin"><i class="icofont-linkedin text-white"></i></i></a>
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="container">

            <div class="logo float-left text-center">
                <h5 class="font-weight-bold text-uppercase"><a href="index.html"><span>Customer Relationship
                            Management<br>Pondok Masa Depan Villa</span></a></h5>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav class="nav-menu float-right d-none d-lg-block">
                <ul>
                    <li class="active"><a href="{{ route('home') }}">Halaman Utama</a></li>
                    <li><a href="#tentang-kami">Tentang Kami</a></li>
                    <li><a href="#aktifitas">Aktifitas</a></li>
                    <li><a href="{{ route('ulasan') }}">Beri Ulasan</a></li>
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    <!-- Slide 1 -->
                    <div class="carousel-item active"
                        style="background-image: url('mamba/assets/img/slide/slide-1.jpg');">
                        <div class="carousel-container">
                            <div class="carousel-content container">
                                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Mamba</span></h2>
                                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui
                                    aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem
                                    mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti
                                    vel. Minus et tempore modi architecto.</p>
                                <a href="#tentang-kami"
                                    class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item" style="background-image: url('mamba/assets/img/slide/slide-2.jpg');">
                        <div class="carousel-container">
                            <div class="carousel-content container">
                                <h2 class="animate__animated animate__fadeInDown">Lorem Ipsum Dolor</h2>
                                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui
                                    aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem
                                    mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti
                                    vel. Minus et tempore modi architecto.</p>
                                <a href="#tentang-kami"
                                    class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item" style="background-image: url('mamba/assets/img/slide/slide-3.jpg');">
                        <div class="carousel-container">
                            <div class="carousel-content container">
                                <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2>
                                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui
                                    aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem
                                    mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti
                                    vel. Minus et tempore modi architecto.</p>
                                <a href="#tentang-kami"
                                    class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                            </div>
                        </div>
                    </div>

                </div>

                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Tentang Kami Section ======= -->
        <section id="tentang-kami" class="about">
            <div class="container">

                <div class="row no-gutters">
                    <div class="col-lg-6 video-box">
                        <img src="assets/img/about.jpg" class="img-fluid" alt="">
                        <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4"
                            data-vbtype="video" data-autoplay="true"></a>
                    </div>

                    <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

                        <div class="section-title">
                            <h2>Our Story About Pondok Masa Depan Villa</h2>
                            <p>Pondok Masa Depan beroperasi mulai Tahun 2018, dan sudah berdiri sejak 19 September.
                                Didirikan oleh pasangan suami istri I Gusti Ayu Rasmini dan I Gusti lanang Ngurah ...
                            </p>
                        </div>

                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Aktifitas Section ======= -->
        <section id="aktifitas" class="services">
            <div class="container">

                <div class="section-title">
                    <h2>Aktifitas</h2>
                </div>

                <div class="row mt-5 mb-5">
                    <div class="col-md-3 icon-box" data-aos="fade-up">
                        <div class="icon"><i class="icofont-computer"></i></div>
                    </div>
                    <div class="col-md-9">
                        <h4>Cooking Class</h4>
                        <p class="description">Pengunjung dapat mengisi waktu dengan mengikuti kelas memasak dengan menu
                            khas Bali yang penuh bumbu dan rempah.</p>
                    </div>
                </div>

                <div class="row mt-5 mb-5"></div>

                <div class="row mt-5 mb-5">
                    <div class="col-md-9 text-right">
                        <h4>Making Offering</h4>
                        <p class="description">Mempelajari bagaimana membuat canang sari sebagai sarana persembahyangan.
                        </p>
                    </div>
                    <div class="col-md-3 icon-box" data-aos="fade-up">
                        <div class="icon"><i class="icofont-computer"></i></div>
                    </div>
                </div>

                <div class="row mt-5 mb-5"></div>

                <div class="row mt-5 mb-5">
                    <div class="col-md-3 icon-box" data-aos="fade-up">
                        <div class="icon"><i class="icofont-computer"></i></div>
                    </div>
                    <div class="col-md-9">
                        <h4>Water Purification</h4>
                        <p class="description">Water Purification atau melukat adalah upacara pembersihan pikiran secara
                            spiritual dalam diri manusia</p>
                    </div>
                </div>

                <div class="row mt-5 mb-5"></div>

                <div class="row mt-5 mb-5">
                    <div class="col-md-9 text-right">
                        <h4>Trekking</h4>
                        <p class="description">Menikmati pemandangan asri Sidemen dan menghabiskan waktu dengan
                            berjalan-jalan di Desa ini.</p>
                    </div>
                    <div class="col-md-3 icon-box" data-aos="fade-up">
                        <div class="icon"><i class="icofont-computer"></i></div>
                    </div>
                </div>

                <div class="row mt-5 mb-5"></div>

                <div class="row mb-5">
                    <div class="col-md-3 icon-box" data-aos="fade-up">
                        <div class="icon"><i class="icofont-computer"></i></div>
                    </div>
                    <div class="col-md-9">
                        <h4>Agni Hotra</h4>
                        <p class="description">Upacara persembahyangan sebagai bentuk persembahan kepada Dewa Agni</p>
                    </div>
                </div>

                <div class="row mt-5 mb-5"></div>

                <div class="row mt-5 mb-5">
                    <div class="col-md-9 text-right">
                        <h4>Yoga</h4>
                        <p class="description">Melaksanakan Yoga sebagai upaya dalam menjaga kesehatan secara jasmani
                            dan rohani.</p>
                    </div>
                    <div class="col-md-3 icon-box" data-aos="fade-up">
                        <div class="icon"><i class="icofont-computer"></i></div>
                    </div>
                </div>

            </div>
        </section><!-- End Services Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-12 footer-info">
                        <p>
                            <img width="256" src="{{ asset('logo.jpg') }}" alt="Pondok Masa Depan Villa">
                        </p>
                    </div>

                    <div class="col-lg-6 col-md-12 footer-newsletter">
                        <h4>Alamat Villa</h4>
                        <p>Jl.</p>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Pondok Masa Depan Villa</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('mamba/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('mamba/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('mamba/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('mamba/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('mamba/assets/vendor/jquery-sticky/jquery.sticky.js') }}"></script>
    <script src="{{ asset('mamba/assets/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('mamba/assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('mamba/assets/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('mamba/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('mamba/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('mamba/assets/vendor/aos/aos.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('mamba/assets/js/main.js') }}"></script>

    <!-- Sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        @if(Session::has('message'))
            swal("Berhasil", "{{ Session::get('message') }}", "{{ Session::get('status') }}");
        @endif
    </script>
</body>

</html>
