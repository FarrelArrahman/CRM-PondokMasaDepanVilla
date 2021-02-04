<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pondok Masa Depan Villa | Beri Ulasan</title>
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
                <!-- <a href="#" class="facebook"><i class="icofont-facebook text-white"></i></a> -->
                <a href="#" class="instagram"><i class="icofont-instagram text-white"></i></a>
                <!-- <a href="#" class="skype"><i class="icofont-skype text-white"></i></a> -->
                <!-- <a href="#" class="linkedin"><i class="icofont-linkedin text-white"></i></i></a> -->
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
                    <!-- <li><a href="{{ url('/#tentang-kami') }}">Tentang Kami</a></li> -->
                    <!-- <li><a href="{{ url('/#aktifitas') }}">Aktifitas</a></li> -->
                    <li><a href="{{ route('home') }}">Beri Ulasan</a></li>
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    <main id="main">
        <!-- ======= Beri Ulasan Section ======= -->
        <section id="beri-ulasan" class="contact">
            <div class="container">

                <!-- <div class="section-title">
                    <h2>Isi Biodata</h2>
                </div> -->

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
                                <div class="col-lg-6 form-group">
                                    <label for="no_hp">Nomor Handphone</label>
                                    <input type="text" name="no_hp" class="form-control" id="name"
                                        placeholder="Nomor Handphone" data-rule="required"
                                        data-msg="Please provide valid phone number" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-6 form-group">
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

                            <div class="section-title">
                                <h2>Kuesioner</h2>
                            </div>

                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th width="10" rowspan="2">No</th>
                                        <th rowspan="2">Pertanyaan</th>
                                        <th colspan="5">Nilai</th>
                                    </tr>

                                    <tr class="text-center">
                                        @for($i = 5; $i >= 1; $i--)
                                        <th width="70">{{ $i }}</th>
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pertanyaan as $item)
                                    <tr>
                                        <th class="text-center">{{ $loop->iteration }}</th>
                                        <td>{{ $item->pertanyaan }}</td>
                                        @for($i = 5; $i >= 1; $i--)
                                        <td class="text-center">
                                            <input type="radio" class="form-control" name="{{ $item->id_pertanyaan }}" value="{{ $i }}">
                                        </td>
                                        @endfor
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
        </section>
        <!--
        <section id="beri-ulasan" class="contact">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="alert alert-info text-center">Anda harus login terlebih dahulu untuk memberikan ulasan.</div>
                        <ul class="nav nav-pills nav-fill mb-3" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                                <div class="card login">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="username" class="col-md-4 col-form-label text-md-right">Email or Username</label>

                                                <div class="col-md-8">
                                                    <input id="username" type="text" class="form-control @error('email') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                                    @error('username')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                <div class="col-md-8">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-0">
                                                <div class="col-md-4 offset-md-4">
                                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <div class="card cregister">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('user.responden.store') }}">
                                            @csrf

                                            <h5 class="card-title text-center mb-4">Biodata Diri</h5>

                                            <input type="hidden" name="status" value="responden">

                                            <div class="form-group row">
                                                <label for="nama_user" class="col-md-4 col-form-label text-md-right">Nama User</label>

                                                <div class="col-md-8">
                                                    <input id="nama_user" name="nama_user" type="text" class="form-control @error('nama_user') is-invalid @enderror" placeholder="Masukkan nama user..." value="{{ old('nama_user') }}" required>
                                                    @error('nama_user')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="no_hp" class="col-md-4 col-form-label text-md-right">No HP</label>

                                                <div class="col-md-8">
                                                    <input id="no_hp" name="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Masukkan No HP..." value="{{ old('no_hp') }}" required>
                                                    @error('no_hp')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="jenis_kel" class="col-md-4 col-form-label text-md-right">Jenis Kel</label>

                                                <div class="col-md-8 mt-2">
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input @if(old('jenis_kel') == 'L') {{ 'checked' }} @endif type="radio" class="form-check-input" name="jenis_kel" value="L">Laki-laki
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input @if(old('jenis_kel') == 'P') {{ 'checked' }} @endif type="radio" class="form-check-input" name="jenis_kel" value="P">Perempuan
                                                        </label>
                                                    </div>
                                                    @error('jenis_kel')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>

                                                <div class="col-md-8">
                                                    <textarea id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan Alamat..." required>{{ old('alamat') }}</textarea>
                                                    @error('alamat')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <hr>

                                            <h5 class="card-title text-center mt-4 mb-4">Kredensial Login</h5>

                                            <div class="form-group row">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                                <div class="col-md-8">
                                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan email..." required>

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                                                <div class="col-md-8">
                                                    <input id="username" type="text" class="form-control @error('email') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Masukkan username..." required>

                                                    @error('username')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                <div class="col-md-8">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan password..." required>

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-4 offset-md-4">
                                                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        -->
        <!-- End Contact Us Section -->

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
