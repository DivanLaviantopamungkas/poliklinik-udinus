@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- Welcome Message -->
        <div class="alert alert-success" role="alert">
            Selamat datang, <strong>{{ Auth::user()->role }}</strong>! Semoga harimu menyenangkan.

        </div>

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

        <!-- Content Row -->
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
                                <div class="h5 mb-0 font-weight-bold text-gray-800">111</div>
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
                                <div class="h5 mb-0 font-weight-bold text-gray-800">11</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-md fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Pemeriksaan Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Total Pemeriksaan
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">111</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-notes-medical fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Content Row for Chart -->
        <div class="row">
            <div class="col-lg-6">
                <!-- Area Chart Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pemeriksaan Bulanan</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <!-- Integrate a chart library like Chart.js here -->
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <!-- Data Table Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Pasien Terbaru</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ali Mahmud</td>
                                        <td>Jakarta</td>
                                        <td>08123456789</td>
                                    </tr>
                                    <tr>
                                        <td>Siti Aminah</td>
                                        <td>Bandung</td>
                                        <td>08213456789</td>
                                    </tr>
                                    <tr>
                                        <td>Ahmad Yasin</td>
                                        <td>Surabaya</td>
                                        <td>08313456789</td>
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
