@extends('user.layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- Welcome Message -->
        <div class="alert alert-primary shadow-sm" role="alert">
            <h4 class="alert-heading">Selamat Datang, {{ Auth::user()->name }}!</h4>
            <p>Anda login sebagai <strong>{{ Auth::user()->role }}</strong>. Semoga hari Anda menyenangkan!</p>
        </div>

        <!-- Page Heading -->
        <h1 class="h3 text-gray-800 mb-4">Dashboard Pasien</h1>

        <!-- Info Cards -->
        <div class="row">
            <!-- Total Pemeriksaan -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pemeriksaan
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">35</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-stethoscope fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Riwayat Kunjungan -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Riwayat Kunjungan
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">20</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar-check fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jadwal Konsultasi -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jadwal Konsultasi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clock fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Pemeriksaan Bulanan Chart -->
            <div class="col-lg-6 mb-4">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Pemeriksaan Bulanan</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="monthlyCheckupChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Data Pasien Terbaru -->
            <div class="col-lg-6 mb-4">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Riwayat Pemeriksaan Terbaru</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Dokter</th>
                                        <th>Tanggal</th>
                                        <th>Hasil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Dr. Siti Aminah</td>
                                        <td>01 Desember 2024</td>
                                        <td>Normal</td>
                                    </tr>
                                    <tr>
                                        <td>Dr. Ahmad Yasin</td>
                                        <td>28 November 2024</td>
                                        <td>Tindak Lanjut</td>
                                    </tr>
                                    <tr>
                                        <td>Dr. Ali Mahmud</td>
                                        <td>15 November 2024</td>
                                        <td>Normal</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Selamat Datang!',
                text: '{{ session('success') }}',
                icon: 'success',
                timer: 3000, // Otomatis menutup setelah 3 detik
                showConfirmButton: false
            }).then(() => {
                // Redirect ke dashboard berdasarkan role
                @if (Auth::user()->role === 'admin')
                    window.location.href = '{{ route('admin.dashboard') }}';
                @elseif (Auth::user()->role === 'dokter')
                    window.location.href = '{{ route('dokter.dashboard') }}';
                @elseif (Auth::user()->role === 'pasien')
                    window.location.href = '{{ route('pasien.dashboard') }}';
                @endif
            });
        </script>
    @endif
@endpush
