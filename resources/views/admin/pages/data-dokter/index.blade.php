@extends('admin.layouts.app')

@section('title', 'Data Dokter')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Data Dokter</h1>

        <!-- Flash Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Tabel Data Dokter -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Dokter</h6>
                <a href="{{ route('dokter.create') }}" class="btn btn-success btn-sm">Tambah Dokter <i
                        class="fas fa-user-plus"></i></a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No Hp</th>
                                <th>Poliklinik</th>
                                <th>Aksi</th> <!-- Kolom untuk aksi CRUD -->
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dataDokter as $dokter)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dokter->nama }}</td>
                                    <td>{{ $dokter->alamat }}</td>
                                    <td>{{ $dokter->no_hp }}</td>
                                    <td>{{ $dokter->poliklinik->nama_poli ?? 'Tidak Ada' }}</td>
                                    <td>
                                        <!-- Tombol Edit dengan icon -->
                                        <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        <!-- Tombol Delete dengan modal konfirmasi -->
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#deleteModal{{ $dokter->id }}">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>

                                        <!-- Modal Konfirmasi Delete -->
                                        <div class="modal fade" id="deleteModal{{ $dokter->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus dokter ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batal</button>
                                                        <form action="{{ route('dokter.destroy', $dokter->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data dokter.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <!-- Tambahkan jQuery dan Bootstrap JS untuk modal -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush
