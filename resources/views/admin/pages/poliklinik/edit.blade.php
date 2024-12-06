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
                <form action="{{ route('poli.update', $poliklinik->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_poli">Nama Poliklinik</label>
                        <input type="text" class="form-control" id="nama_poli" name="nama_poli"
                            value="{{ $poliklinik->nama_poli }}" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan"
                            value="{{ $poliklinik->keterangan }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Poliklinik</button>
                    <a href="{{ route('poliklinik') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>

    </div>
@endsection
