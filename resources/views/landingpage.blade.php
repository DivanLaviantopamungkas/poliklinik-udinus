<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Site keywords here">
    <meta name="description" content="">
    <meta name='copyright' content=''>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Poliklinik - Ayo Sehat</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets_home/img/favicon.png') }}">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets_home/css/bootstrap.min.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('assets_home/css/nice-select.css') }}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets_home/css/font-awesome.min.css') }}">
    <!-- icofont CSS -->
    <link rel="stylesheet" href="{{ asset('assets_home/css/icofont.css') }}">
    <!-- Slicknav -->
    <link rel="stylesheet" href="{{ asset('assets_home/css/slicknav.min.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets_home/css/owl-carousel.css') }}">
    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="{{ asset('assets_home/css/datepicker.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets_home/css/animate.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('assets_home/css/magnific-popup.css') }}">

    <!-- Medipro CSS -->
    <link rel="stylesheet" href="{{ asset('assets_home/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_home/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_home/css/responsive.css') }}">

</head>

<body>

    <!-- Preloader -->
    <div class="preloader">
        <div class="loader">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>

            <div class="indicator">
                <svg width="16px" height="12px">
                    <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                    <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                </svg>
            </div>
        </div>
    </div>
    <!-- End Preloader -->

    <!-- Header Area -->
    <header class="header">
        <!-- Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-5 col-12">
                        <!-- Contact -->
                        <ul class="top-link">
                            <li><a href="#">About</a></li>
                            <li><a href="{{ route('login') }}">Doctors</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                        <!-- End Contact -->
                    </div>
                    <div class="col-lg-6 col-md-7 col-12">
                        <!-- Top Contact -->
                        <ul class="top-contact">
                            <li><i class="fa fa-phone"></i>+62 8122 6594 919</li>
                            <li><i class="fa fa-envelope"></i><a
                                    href="mailto:support@yourmail.com">111202113479@mhs.dinus.ac.id</a></li>
                        </ul>
                        <!-- End Top Contact -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->

        <!-- Header Inner -->
        <div class="header-inner">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-12">
                            <!-- Start Logo -->
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('assets_home/img/logo.png') }}"
                                        alt="#"></a>
                            </div>
                            <!-- End Logo -->
                            <!-- Mobile Nav -->
                            <div class="mobile-nav"></div>
                            <!-- End Mobile Nav -->
                        </div>
                        <div class="col-lg-7 col-md-9 col-12">
                            <!-- Main Menu -->
                            <div class="main-menu">
                                <nav class="navigation">
                                    <ul class="nav menu">
                                        <li class="active"><a href="#">Home</a></li>
                                        <li><a href="#">Doctos </a></li>
                                        <li><a href="#">Services </a></li>
                                        <li><a href="#">Pages <i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="404.html">404 Error</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Blogs <i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="blog-single.html">Blog Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!--/ End Main Menu -->
                        </div>
                        <div class="col-lg-2 col-12">
                            <div class="get-quote">
                                <a href="{{ route('login') }}" class="btn">Login Sebagai Pasien</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Header Inner -->
    </header>
    <!-- End Header Area -->

    <!-- Slider Area -->
    <section class="slider">
        <div class="hero-slider">
            <!-- Start Single Slider -->
            <div class="single-slider" style="background-image: url('{{ asset('assets_home/img/slider.jpg') }}');">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="text">
                                <h1>Kami Menyediakan <span>Layanan Medis</span> yang Dapat Anda <span>Andalkan!</span>
                                </h1>
                                <p>Kesehatan Anda adalah prioritas kami. Dengan tim profesional dan teknologi terkini,
                                    kami siap membantu Anda meraih hidup yang lebih sehat dan bahagia.</p>
                                <div class="button">
                                    <a href="{{ route('login') }}" class="btn">Buat Janji</a>
                                    <a href="#" class="btn primary">Pelajari Lebih Lanju</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Slider -->
            <!-- Start Single Slider -->
            <div class="single-slider" style="background-image: url('{{ asset('assets_home/img/slider3.jpg') }}');">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="text">
                                <h1>Kesehatan <span>Terjamin</span> dengan Layanan <span>Profesional!</span></h1>
                                <p>Kami hadir untuk memberikan layanan medis terbaik bagi Anda dan keluarga, dengan
                                    komitmen untuk mendukung kesehatan optimal setiap hari.</p>
                                <div class="button">
                                    <a href="{{ route('login') }}" class="btn">Buat Janji</a>
                                    <a href="#" class="btn primary">Pelajari Lebih Lanju</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Slider -->
            <!-- Start Single Slider -->
            <div class="single-slider" style="background-image: url('{{ asset('assets_home/img/slider2.jpg') }}');">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="text">
                                <h1>Layanan <span>Medis Terpercaya</span> untuk Kesehatan Anda!</h1>
                                <p>Dapatkan perawatan terbaik dari tenaga ahli kami. Kami berkomitmen untuk membantu
                                    Anda menjaga kesehatan dengan sepenuh hati.</p>
                                <div class="button">
                                    <a href="{{ route('login') }}" class="btn">Buat Janji</a>
                                    <a href="#" class="btn primary">Pelajari Lebih Lanju</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Slider -->
        </div>
    </section>
    <!--/ End Slider Area -->

    <!-- Start Schedule Area -->
    <section class="schedule">
        <div class="container">
            <div class="schedule-inner">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- single-schedule -->
                        <div class="single-schedule first">
                            <div class="inner">
                                <div class="icon">
                                    <i class="fa fa-ambulance"></i>
                                </div>
                                <div class="single-content">
                                    <span>Bantuan Cepat</span>
                                    <h4>Kasus Darurat</h4>
                                    <p>Kami siap melayani Anda kapan saja dengan layanan tanggap darurat yang andal dan
                                        profesional.</p>
                                    <a href="#">PELAJARI LEBIH<i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- single-schedule -->
                        <div class="single-schedule middle">
                            <div class="inner">
                                <div class="icon">
                                    <i class="icofont-prescription"></i>
                                </div>
                                <div class="single-content">
                                    <span>Jadwal Praktik</span>
                                    <h4>Jadwal Dokter</h4>
                                    <p>Temukan jadwal dokter kami yang tersedia untuk memberikan layanan kesehatan
                                        terbaik bagi Anda.</p>
                                    <a href="#">PELAJARI LEBIH<i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <!-- single-schedule -->
                        <div class="single-schedule last">
                            <div class="inner">
                                <div class="icon">
                                    <i class="icofont-ui-clock"></i>
                                </div>
                                <div class="single-content">
                                    <span>Jam Operasional</span>
                                    <h4>Jam Layanan</h4>
                                    <ul class="time-sidual">
                                        <li class="day">Senin - Jumat <span>08.00-20.00</span></li>
                                        <li class="day">Sabtu <span>09.00-18.30</span></li>
                                        <li class="day">Minggu - Kamis <span>09.00-15.00</span></li>
                                    </ul>
                                    <a href="#">PELAJARI LEBIH<i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/End Start schedule Area -->

    <!-- Start Feautes -->
    <section class="Feautes section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Kami Selalu Siap Membantu Anda dan Keluarga</h2>
                        <img src="{{ asset('assets_home/img/section-img.png') }}" alt="#">
                        <p>Kami hadir untuk memberikan layanan kesehatan terbaik dengan dukungan profesional dan
                            terpercaya.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-12">
                    <!-- Start Single features -->
                    <div class="single-features">
                        <div class="signle-icon">
                            <i class="icofont icofont-ambulance-cross"></i>
                        </div>
                        <h3>Bantuan Darurat</h3>
                        <p>Kami siap melayani kebutuhan darurat Anda kapan saja, dengan layanan cepat dan tepat.</p>
                    </div>
                    <!-- End Single features -->
                </div>
                <div class="col-lg-4 col-12">
                    <!-- Start Single features -->
                    <div class="single-features">
                        <div class="signle-icon">
                            <i class="icofont icofont-medical-sign-alt"></i>
                        </div>
                        <h3>Apotek Lengkap</h3>
                        <p>Apotek kami menyediakan berbagai kebutuhan obat-obatan dengan kualitas terbaik.</p>
                    </div>
                    <!-- End Single features -->
                </div>
                <div class="col-lg-4 col-12">
                    <!-- Start Single features -->
                    <div class="single-features last">
                        <div class="signle-icon">
                            <i class="icofont icofont-stethoscope"></i>
                        </div>
                        <h3>Perawatan Medis</h3>
                        <p>Dapatkan perawatan medis komprehensif dengan pendekatan yang ramah dan profesional.</p>
                    </div>
                    <!-- End Single features -->
                </div>
            </div>
        </div>
    </section>
    <!--/ End Feautes -->

    <!-- Start Fun-facts -->
    <div id="fun-facts" class="fun-facts section overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Fun -->
                    <div class="single-fun">
                        <i class="icofont icofont-home"></i>
                        <div class="content">
                            <span class="counter">{{ $dataPoli }}</span>
                            <p>Poliklinik</p>
                        </div>
                    </div>
                    <!-- End Single Fun -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Fun -->
                    <div class="single-fun">
                        <i class="icofont icofont-user-alt-3"></i>
                        <div class="content">
                            <span class="counter">{{ $dataDokter }}</span>
                            <p>Dokter</p>
                        </div>
                    </div>
                    <!-- End Single Fun -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Fun -->
                    <div class="single-fun">
                        <i class="icofont-simple-smile"></i>
                        <div class="content">
                            <span class="counter">{{ $dataPasien }}</span>
                            <p>Pasien</p>
                        </div>
                    </div>
                    <!-- End Single Fun -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Fun -->
                    <div class="single-fun">
                        <i class="icofont icofont-table"></i>
                        <div class="content">
                            <span class="counter">32</span>
                            <p>Years of Experience</p>
                        </div>
                    </div>
                    <!-- End Single Fun -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Fun-facts -->

    <!-- Start service -->
    <section class="services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Kami Menyediakan Berbagai Layanan untuk Mendukung Kesehatan Anda</h2>
                        <img src="img/section-img.png" alt="#">
                        <p>Kesehatan Anda adalah prioritas kami. Kami hadir untuk memberikan layanan terbaik yang sesuai
                            dengan kebutuhan Anda.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="icofont icofont-heartbeat"></i>
                        <h4><a href="service-details.html">Konsultasi Kesehatan</a></h4>
                        <p>Dapatkan saran medis terbaik dari para ahli kami untuk menjaga kesehatan Anda setiap saat.
                        </p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="icofont icofont-pills"></i>
                        <h4><a href="service-details.html">Pengelolaan Obat</a></h4>
                        <p>Kami menyediakan layanan untuk membantu Anda mengelola konsumsi obat secara tepat dan
                            efisien.</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="icofont icofont-hospital"></i>
                        <h4><a href="service-details.html">Perawatan Rawat Inap</a></h4>
                        <p>Fasilitas rawat inap dengan kenyamanan dan perawatan profesional untuk pemulihan yang
                            optimal.</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="icofont icofont-stethoscope"></i>
                        <h4><a href="service-details.html">Pemeriksaan Rutin</a></h4>
                        <p>Pemeriksaan kesehatan berkala untuk mendeteksi dan mencegah potensi penyakit lebih dini.</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="icofont icofont-wheelchair"></i>
                        <h4><a href="service-details.html">Rehabilitasi Medis</a></h4>
                        <p>Program pemulihan untuk membantu pasien kembali beraktivitas secara optimal pasca sakit atau
                            operasi.</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="icofont icofont-ambulance"></i>
                        <h4><a href="service-details.html">Layanan Ambulans</a></h4>
                        <p>Respon cepat dengan fasilitas ambulans lengkap untuk situasi darurat kapan saja.</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>
    <!--/ End service -->

    <!-- Footer Area -->
    <footer id="footer" class="footer ">
        <!-- Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer">
                            <h2>Tentang Kami</h2>
                            <p>Kami adalah perusahaan yang berfokus pada pemberdayaan petani melalui teknologi dan
                                inovasi untuk meningkatkan hasil pertanian dan mempermudah akses pasar. Kami percaya
                                bahwa teknologi dapat membawa perubahan positif bagi sektor pertanian dan kesejahteraan
                                petani di Indonesia.</p>
                            <!-- Social -->
                            <ul class="social">
                                <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                <li><a href="#"><i class="icofont-google-plus"></i></a></li>
                                <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                <li><a href="#"><i class="icofont-vimeo"></i></a></li>
                                <li><a href="#"><i class="icofont-pinterest"></i></a></li>
                            </ul>
                            <!-- End Social -->
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer f-link">
                            <h2>Tautan Cepat</h2>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-caret-right"
                                                    aria-hidden="true"></i>Beranda</a></li>
                                        <li><a href="#"><i class="fa fa-caret-right"
                                                    aria-hidden="true"></i>Tentang Kami</a></li>
                                        <li><a href="#"><i class="fa fa-caret-right"
                                                    aria-hidden="true"></i>Layanan</a></li>
                                        <li><a href="#"><i class="fa fa-caret-right"
                                                    aria-hidden="true"></i>Kasus Kami</a></li>
                                        <li><a href="#"><i class="fa fa-caret-right"
                                                    aria-hidden="true"></i>Tautan Lain</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-caret-right"
                                                    aria-hidden="true"></i>Konsultasi</a></li>
                                        <li><a href="#"><i class="fa fa-caret-right"
                                                    aria-hidden="true"></i>Keuangan</a></li>
                                        <li><a href="#"><i class="fa fa-caret-right"
                                                    aria-hidden="true"></i>Testimonial</a></li>
                                        <li><a href="#"><i class="fa fa-caret-right"
                                                    aria-hidden="true"></i>FAQ</a></li>
                                        <li><a href="#"><i class="fa fa-caret-right"
                                                    aria-hidden="true"></i>Hubungi Kami</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer">
                            <h2>Jam Buka</h2>
                            <p>Kami selalu siap melayani Anda dengan berbagai solusi pertanian melalui teknologi yang
                                mudah diakses dan dapat diandalkan. Silakan hubungi kami pada jam-jam berikut untuk
                                mendapatkan bantuan atau informasi lebih lanjut.</p>
                            <ul class="time-sidual">
                                <li class="day">Senin - Jumat <span>08.00 - 20.00</span></li>
                                <li class="day">Sabtu <span>09.00 - 18.30</span></li>
                                <li class="day">Minggu <span>09.00 - 15.00</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer">
                            <h2>Newsletter</h2>
                            <p>Daftar ke newsletter kami untuk mendapatkan berita terbaru langsung ke inbox Anda. Kami
                                akan memberikan informasi terbaru seputar produk pertanian, teknologi baru, dan
                                penawaran menarik lainnya.</p>
                            <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                                <input name="email" placeholder="Alamat Email" class="common-input"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat email Anda'"
                                    required="" type="email">
                                <button class="button"><i class="icofont icofont-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Footer Top -->
        <!-- Copyright -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="copyright-content">
                            <p>© Hak Cipta 2024 | Semua Hak Dilindungi oleh <a href="https://www.pertanian.id"
                                    target="_blank">pertanian.id</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Copyright -->
    </footer>
    <!--/ End Footer Area -->


    <!-- jquery Min JS -->
    <script src="{{ asset('assets_home/js/jquery.min.js') }}"></script>
    <!-- jquery Migrate JS -->
    <script src="{{ asset('assets_home/js/jquery-migrate-3.0.0.js') }}"></script>
    <!-- jquery Ui JS -->
    <script src="{{ asset('assets_home/js/jquery-ui.min.js') }}"></script>
    <!-- Easing JS -->
    <script src="{{ asset('assets_home/js/easing.js') }}"></script>
    <!-- Color JS -->
    <script src="{{ asset('assets_home/js/colors.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('assets_home/js/popper.min.js') }}"></script>
    <!-- Bootstrap Datepicker JS -->
    <script src="{{ asset('assets_home/js/bootstrap-datepicker.js') }}"></script>
    <!-- Jquery Nav JS -->
    <script src="{{ asset('assets_home/js/jquery.nav.js') }}"></script>
    <!-- Slicknav JS -->
    <script src="{{ asset('assets_home/js/slicknav.min.js') }}"></script>
    <!-- ScrollUp JS -->
    <script src="{{ asset('assets_home/js/jquery.scrollUp.min.js') }}"></script>
    <!-- Niceselect JS -->
    <script src="{{ asset('assets_home/js/niceselect.js') }}"></script>
    <!-- Tilt Jquery JS -->
    <script src="{{ asset('assets_home/js/tilt.jquery.min.js') }}"></script>
    <!-- Owl Carousel JS -->
    <script src="{{ asset('assets_home/js/owl-carousel.js') }}"></script>
    <!-- counterup JS -->
    <script src="{{ asset('assets_home/js/jquery.counterup.min.js') }}"></script>
    <!-- Steller JS -->
    <script src="{{ asset('assets_home/js/steller.js') }}"></script>
    <!-- Wow JS -->
    <script src="{{ asset('assets_home/js/wow.min.js') }}"></script>
    <!-- Magnific Popup JS -->
    <script src="{{ asset('assets_home/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Counter Up CDN JS -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets_home/js/bootstrap.min.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('assets_home/js/main.js') }}"></script>
</body>

</html>
