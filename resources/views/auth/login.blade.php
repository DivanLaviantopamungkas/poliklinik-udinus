<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - Poliklinik UDINUS</title>

    <!-- Custom fonts for this template -->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #007bff, #28a745);
            /* Sesuaikan dengan warna utama Anda */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-user {
            font-weight: 600;
            border-radius: 25px;
            background-color: #007bff;
            /* Sesuaikan dengan warna utama tombol */
            color: white;
            transition: background-color 0.3s ease;
        }

        .btn-user:hover {
            background-color: #0056b3;
            /* Hover effect yang lebih gelap */
        }

        h1 {
            font-size: 1.8rem;
            font-weight: 600;
        }

        .small {
            font-weight: 300;
            color: #6c757d;
        }

        .form-control-user {
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 30px;
        }

        .form-group label {
            font-weight: 500;
        }

        .btn {
            border-radius: 20px;
        }

        @media (max-width: 768px) {
            .col-lg-6 {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .card {
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                                <a href="{{ route('home') }}"><img src="{{ asset('assets_home/img/logo.png') }}"
                                        alt="UDINUS Logo" style="width: 300px;"></a>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang Kembali!</h1>
                                        <p class="small">Masuk untuk mengakses akun Anda dan menikmati layanan kami.
                                        </p>
                                    </div>
                                    @if ($errors->has('email'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                    <form class="user" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email" class="small">Email</label>
                                            <input type="text" id="email" name="email"
                                                class="form-control form-control-user" placeholder="Masukkan email Anda"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="small">Kata Sandi</label>
                                            <input type="password" id="password" name="password"
                                                class="form-control form-control-user"
                                                placeholder="Masukkan kata sandi Anda" required>
                                        </div>
                                        <button type="submit" class="btn btn-user btn-block">
                                            Masuk
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center mt-4">
                                        <p class="small mb-2">Belum punya akun? Daftar sekarang:</p>
                                        <a class="btn btn-outline-secondary btn-sm"
                                            href="{{ route('register') }}">Register Pasien</a>
                                    </div>
                                    <hr>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
