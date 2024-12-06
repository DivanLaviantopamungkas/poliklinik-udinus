@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Pasien</h1>

        <!-- Form Edit Pasien -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Pasien</h6>
            </div>

            <div class="card-body">
                <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Input Nama Pasien -->
                    <div class="mb-4">
                        <label for="nama" class="form-label">Nama Pasien</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" value="{{ old('nama', $pasien->nama) }}" placeholder="Masukkan Nama Pasien"
                            required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Alamat -->
                    <div class="mb-4">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                            name="alamat" value="{{ old('alamat', $pasien->alamat) }}" placeholder="Masukkan Alamat Pasien"
                            required>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input No KTP -->
                    <div class="mb-4">
                        <label for="no_ktp" class="form-label">No KTP</label>
                        <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" id="no_ktp"
                            name="no_ktp" value="{{ old('no_ktp', $pasien->no_ktp) }}" placeholder="Masukkan No KTP"
                            required>
                        @error('no_ktp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input No Telepon -->
                    <div class="mb-4">
                        <label for="no_hp" class="form-label">No Telepon</label>
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                            name="no_hp" value="{{ old('no_hp', $pasien->no_hp) }}" placeholder="Masukkan No Telepon"
                            required>
                        @error('no_hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input No RW -->
                    <div class="mb-4">
                        <label for="no_rw" class="form-label">No RW</label>
                        <input type="text" class="form-control @error('no_rw') is-invalid @enderror" id="no_rw"
                            name="no_rw" value="{{ old('no_rw', $pasien->no_rw) }}" placeholder="Masukkan No RW" required>
                        @error('no_rw')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tombol Submit dan Kembali -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary btn-sm shadow-sm">Update Pasien</button>
                        <a href="{{ route('data.pasien') }}" class="btn btn-secondary btn-sm shadow-sm">Kembali</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
