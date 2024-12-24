@extends('dokter.layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Welcome Message -->
        <div class="alert alert-info shadow-sm" role="alert">
            <h4 class="alert-heading">Selamat Datang, {{ Auth::user()->name }}!</h4>
            <p>Anda login sebagai <strong>Dokter</strong>. Semoga harimu produktif dan penuh semangat!</p>
        </div>

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Dashboard Dokter</h1>

        <!-- Cards Row -->
        <div class="row">
            <!-- Pasien Aktif Card -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card shadow border-start-primary">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="fas fa-user-injured fa-3x text-primary"></i>
                            </div>
                            <div>
                                <h5 class="card-title text-uppercase text-muted mb-1">Pasien Aktif</h5>
                                <h2 class="text-primary fw-bold">{{ $pasienPerluDiperiksa }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jadwal Hari Ini Card -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card shadow border-start-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="fas fa-calendar-check fa-3x text-success"></i>
                            </div>
                            <div>
                                <h5 class="card-title text-uppercase text-muted mb-1">Jadwal Hari Ini</h5>
                                <h2 class="text-success fw-bold">{{ $jadwalAktif }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <!-- Pasien Perlu Atensi -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card shadow border-start-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="fas fa-exclamation-circle fa-3x text-warning"></i>
                            </div>
                            <div>
                                <h5 class="card-title text-uppercase text-muted mb-1">Pasien Perlu Atensi</h5>
                                <h2 class="text-warning fw-bold">3</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Patient Statistics Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Statistik Pasien Bulanan</h6>
                        <i class="fas fa-chart-line text-primary"></i>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="patientChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <!-- Patients Needing Attention -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-danger">Pasien Perlu Atensi</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Kondisi</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ali Mahmud</td>
                                        <td>Darah Tinggi</td>
                                        <td><span class="badge bg-danger">Kritis</span></td>
                                    </tr>
                                    <tr>
                                        <td>Siti Aminah</td>
                                        <td>Diabetes</td>
                                        <td><span class="badge bg-warning">Perlu Kontrol</span></td>
                                    </tr>
                                    <tr>
                                        <td>Ahmad Yasin</td>
                                        <td>Demam Tinggi</td>
                                        <td><span class="badge bg-danger">Kritis</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Footer -->
            <footer class="text-center mt-4 small text-muted">
                © {{ date('Y') }} Dashboard Dokter. Dikembangkan dengan <i class="fas fa-heart text-danger"></i> oleh
                Tim
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
