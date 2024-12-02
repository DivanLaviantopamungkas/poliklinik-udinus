@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Tambah Pasien</h1>

        <!-- Form Tambah Pasien -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pasien</h6>
            </div>

            <div class="card-body">
                <form action="{{ route('pasien.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="no_kt">No KTP</label>
                        <input type="text" class="form-control" id="no_ktp" name="no_ktp" required>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Telepon</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp">
                    </div>
                    <div class="form-group">
                        <label for="no_rw">No Rw</label>
                        <input type="text" class="form-control" id="no_rw" name="no_rw" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Pasien</button>
                    <a href="{{ route('data.pasien') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>

    </div>
@endsection
