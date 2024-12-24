@extends('dokter.layouts.app')

@section('title', 'Data Dokter')

@section('content')
    <div class="container py-5">
        <div class="row g-4">
            <!-- Kotak Profil Dokter -->
            <div class="col-md-5">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="fw-bold mb-0">Profil Dokter</h4>
                    </div>
                    <div class="card-body">
                        @if ($dataDokter)
                            <div class="text-center mb-4">
                                <img src="{{ asset('images/doctor-avatar.png') }}" alt="Avatar"
                                    class="img-fluid rounded-circle"
                                    style="width: 120px; height: 120px; border: 2px solid #ccc;">
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Nama:</strong> {{ $dataDokter->nama }}</li>
                                <li class="list-group-item"><strong>Alamat:</strong> {{ $dataDokter->alamat }}</li>
                                <li class="list-group-item"><strong>No. HP:</strong> {{ $dataDokter->no_hp }}</li>
                                <li class="list-group-item"><strong>Poli:</strong>
                                    {{ $dataDokter->poli->nama_poli ?? 'Tidak ada poli' }}</li>
                            </ul>
                        @else
                            <p class="text-muted text-center">Data profil dokter tidak ditemukan.</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Kotak Form Edit Profil -->
            <div class="col-md-7">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-warning text-white text-center">
                        <h4 class="fw-bold mb-0">Edit Profil Dokter</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile.dokter.update', $dataDokter->id) }}" method="POST"
                            class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')

                            <!-- Pesan Validasi -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Nama -->
                            <div class="mb-3">
                                <label for="nama" class="form-label fw-bold">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ old('nama', $dataDokter->nama) }}" required>
                            </div>

                            <!-- Alamat -->
                            <div class="mb-3">
                                <label for="alamat" class="form-label fw-bold">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="{{ old('alamat', $dataDokter->alamat) }}" required>
                            </div>

                            <!-- No. HP -->
                            <div class="mb-3">
                                <label for="no_hp" class="form-label fw-bold">No. HP</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp"
                                    value="{{ old('no_hp', $dataDokter->no_hp) }}" required>
                            </div>

                            <!-- Poli -->
                            <div class="mb-3">
                                <label for="id_poli" class="form-label fw-bold">Poli</label>
                                <select name="id_poli" id="id_poli" class="form-select" required>
                                    @foreach ($poli as $p)
                                        <option value="{{ $p->id }}"
                                            {{ $p->id == $dataDokter->id_poli ? 'selected' : '' }}>
                                            {{ $p->nama_poli }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label fw-bold">Password Baru</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Kosongkan jika tidak diubah">
                            </div>

                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label fw-bold">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Ulangi password">
                            </div>

                            <!-- Tombol Submit -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-success btn-lg px-4">
                                    <i class="fas fa-save me-2"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
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
