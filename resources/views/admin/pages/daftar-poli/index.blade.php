@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Data Antrian Pasien</h1>

        <!-- Flash Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel Data Antrian -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Antrian Pasien</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    {{-- <a href="{{ route('antrian.create') }}" class="btn btn-primary mb-3">Tambah Antrian</a> --}}
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Pasien</th>
                                <th>ID Jadwal</th>
                                <th>Keluhan</th>
                                <th>No Antrian</th>
                                <th>Waktu Dibuat</th>
                                <th>Waktu Diperbarui</th>
                                <th>Aksi</th> <!-- Kolom untuk aksi CRUD -->
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($daftarPoli as $poli)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $poli->id_pasien }}</td>
                                    <td>{{ $poli->id_jadwal }}</td>
                                    <td>{{ $poli->keluhan ?? 'Tidak Ada' }}</td>
                                    <td>{{ $poli->no_antrian }}</td>
                                    <td>{{ $antrian->created_at }}</td>
                                    <td>{{ $antrian->updated_at }}</td>
                                    <td>
                                        {{-- <a href="{{ route('antrian.edit', $antrian->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('antrian.destroy', $antrian->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus antrian ini?');">Hapus</button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data antrian.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
