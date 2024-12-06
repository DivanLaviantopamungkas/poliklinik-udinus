@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Welcome Message -->
        <div class="alert alert-primary shadow-sm" role="alert">
            <h4 class="alert-heading">Selamat Datang, {{ Auth::user()->name }}!</h4>
            <p>Anda login sebagai <strong>{{ Auth::user()->role }}</strong>. Semoga harimu menyenangkan dan produktif!</p>
        </div>

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Dashboard Admin</h1>

        <!-- Cards Row -->
        <div class="row">
            <!-- Total Pasien Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow border-start-primary">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="fas fa-users fa-3x text-primary"></i>
                            </div>
                            <div>
                                <h5 class="card-title text-uppercase text-muted mb-1">Total Pasien</h5>
                                <h2 class="text-primary fw-bold">111</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Dokter Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow border-start-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="fas fa-user-md fa-3x text-success"></i>
                            </div>
                            <div>
                                <h5 class="card-title text-uppercase text-muted mb-1">Total Dokter</h5>
                                <h2 class="text-success fw-bold">11</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart Section -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Statistik Pemeriksaan Bulanan</h6>
                        <i class="fas fa-chart-line text-primary"></i>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="monthlyChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Patients Table -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pasien Terbaru</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Ali Mahmud
                                <span class="badge bg-primary rounded-pill">Jakarta</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Siti Aminah
                                <span class="badge bg-success rounded-pill">Bandung</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Ahmad Yasin
                                <span class="badge bg-info rounded-pill">Surabaya</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="text-center mt-4 small text-muted">
            © {{ date('Y') }} Dashboard Admin. Dikembangkan dengan <i class="fas fa-heart text-danger"></i> oleh Tim
            Anda.
        </footer>
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
