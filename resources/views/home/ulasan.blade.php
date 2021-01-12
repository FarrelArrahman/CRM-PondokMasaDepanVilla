<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Mamba Bootstrap Template - Index</title>
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
    <style>
        .btn span.fa {    			
            opacity: 0;				
        }
        .btn.active span.fa {				
            opacity: 1;				
        }
    </style>
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
                    <li><a href="#beri-ulasan">Beri Ulasan</a></li>
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    <main id="main">
        <!-- ======= Beri Ulasan Section ======= -->
        <section id="beri-ulasan" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2>Isi Biodata</h2>
                </div>

                <form action="{{ route('ulasan.store') }}" method="post">
                <div class="row">
                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="0">
                            @csrf
                            <div class="form-row">
                                <div class="col-lg-6 form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" name="nama_responden" class="form-control" id="name"
                                        placeholder="Nama Lengkap" data-rule="required"
                                        data-msg="Please enter at least 4 chars" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="name">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Email" data-rule="email"
                                        data-msg="Please enter a valid email" />
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-8 form-group">
                                    <label for="no_hp">Nomor Handphone</label>
                                    <input type="text" name="no_hp" class="form-control" id="name"
                                        placeholder="Nomor Handphone" data-rule="required"
                                        data-msg="Please provide valid phone number" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-4 form-group">
                                    <label for="name">Jenis Kelamin</label>
                                    <select name="jenis_kel" class="form-control" data-rule="required"
                                        data-msg="This field is required">
                                        <option value="" selected disabled>Pilih Salah Satu...</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" rows="5" data-rule="required"
                                    data-msg="Please write something for us" placeholder="Alamat"></textarea>
                                <div class="validate"></div>
                            </div>

                            <div class="section-title mt-5">
                                <h2>Kuesioner</h2>
                            </div>

                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th width="10" rowspan="2">No</th>
                                        <th rowspan="2">Pertanyaan</th>
                                        <th colspan="3">Jawaban</th>
                                    </tr>

                                    <tr class="text-center">
                                        <th width="100">Baik</th>
                                        <th width="100">Cukup</th>
                                        <th width="100">Buruk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pertanyaan as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->pertanyaan }}</td>
                                        <td class="text-center">
                                            <input type="radio" class="form-control" name="{{ $item->id_pertanyaan }}" value="3">
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" class="form-control" name="{{ $item->id_pertanyaan }}" value="2">
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" class="form-control" name="{{ $item->id_pertanyaan }}" value="1">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="section-title mt-5">
                                <h2>Beri Ulasan</h2>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="ulasan" rows="5" data-rule="required"
                                    data-msg="Please write something for us" placeholder="Beri Ulasan..."></textarea>
                                <div class="validate"></div>
                            </div>

                    </div>

                    <div class="col-md-12">
                        <div class="text-center"><button class="btn btn-info" type="submit">Kirim Kuesioner dan Ulasan</button></div>
                    </div>

                </div>
                </form>

            </div>
        </section><!-- End Contact Us Section -->

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

</body>

</html>
