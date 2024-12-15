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
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Pasien
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dataPasien }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Dokter Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Dokter
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dataDokter }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-md fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Poliklinik Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Total Poliklinik
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dataPoli }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-hospital fa-2x text-gray-300"></i>
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
                            @foreach ($pasienTerbaru as $pasien)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $pasien->nama }}
                                    <span class="badge bg-light rounded-pill">{{ $pasien->alamat }}</span>
                                </li>
                            @endforeach
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
