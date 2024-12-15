<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register - Poliklinik UDINUS</title>

    <!-- Custom fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles -->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
        }

        .btn-user {
            font-weight: 600;
            border-radius: 25px;
            background-color: #6a11cb;
            color: white;
            transition: background-color 0.3s ease;
        }

        .btn-user:hover {
            background-color: #5a09b0;
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
        }

        .btn {
            border-radius: 20px;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                                <img src="{{ asset('assets_home/img/logo.png') }}" alt="UDINUS Logo"
                                    style="width: 300px;">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Buat Akun Anda</h1>
                                        <p class="small">Silakan isi data Anda untuk mendaftar.</p>
                                    </div>
                                    <form class="user" action="{{ route('register.store') }}" method="POST">
                                        @csrf
                                        <!-- Nama Lengkap -->
                                        <div class="form-group">
                                            <label for="nama" class="small">Nama Lengkap</label>
                                            <input type="text" id="nama" name="nama"
                                                class="form-control form-control-user"
                                                placeholder="Masukkan nama lengkap Anda" required>
                                        </div>

                                        <!-- Username -->
                                        <div class="form-group">
                                            <label for="name" class="small">Username</label>
                                            <input type="text" id="name" name="name"
                                                class="form-control form-control-user"
                                                placeholder="Masukkan Username Anda" required>
                                        </div>

                                        <!-- Email -->
                                        <div class="form-group">
                                            <label for="email" class="small">Email</label>
                                            <input type="email" id="email" name="email"
                                                class="form-control form-control-user" placeholder="Masukkan email Anda"
                                                required>
                                        </div>

                                        <!-- Alamat -->
                                        <div class="form-group">
                                            <label for="alamat" class="small">Alamat</label>
                                            <input type="text" id="alamat" name="alamat"
                                                class="form-control form-control-user"
                                                placeholder="Masukkan alamat Anda" required>
                                        </div>

                                        <!-- No Ktp -->
                                        <div class="form-group">
                                            <label for="no_ktp" class="small">no_ktp</label>
                                            <input type="text" id="no_ktp" name="no_ktp"
                                                class="form-control form-control-user" placeholder="Masukkan NIK Anda"
                                                required>
                                        </div>

                                        <!-- No Telepon -->
                                        <div class="form-group">
                                            <label for="no_hp" class="small">No Telepon</label>
                                            <input type="text" id="no_hp" name="no_hp"
                                                class="form-control form-control-user"
                                                placeholder="Masukkan nomor telepon Anda" required>
                                        </div>

                                        <!-- No RW -->
                                        <div class="form-group">
                                            <label for="no_rw" class="small">No RW</label>
                                            <input type="text" id="no_rw" name="no_rw"
                                                class="form-control form-control-user"
                                                placeholder="Masukkan nomor RW Anda" required>
                                        </div>

                                        <!-- Kata Sandi -->
                                        <div class="form-group">
                                            <label for="password" class="small">Kata Sandi</label>
                                            <input type="password" id="password" name="password"
                                                class="form-control form-control-user"
                                                placeholder="Masukkan kata sandi Anda" required>
                                        </div>

                                        <!-- Tombol Daftar -->
                                        <button type="submit"
                                            class="btn btn-primary btn-user btn-block">Daftar</button>
                                    </form>
                                    <hr>
                                    <div class="text-center mt-4">
                                        <p class="small">Sudah punya akun? <a href="{{ route('login') }}">Login di
                                                sini</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
</body>

</html>
