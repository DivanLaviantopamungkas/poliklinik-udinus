@extends('dokter.layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <!-- Kotak Kiri: Menampilkan Data Jadwal -->
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h5>Detail Jadwal Periksa</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Hari:</strong> {{ $jadwal->hari }}</p>
                        <p><strong>Jam Mulai:</strong> {{ date('H.i', strtotime($jadwal->jam_mulai)) }}</p>
                        <p><strong>Jam Selesai:</strong> {{ date('H.i', strtotime($jadwal->jam_selesai)) }}</p>
                        <p><strong>Keterangan:</strong> {{ $jadwal->keterangan }}</p>
                    </div>
                </div>
            </div>

            <!-- Kotak Kanan: Form Edit Jadwal -->
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-warning text-white">
                        <h5>Edit Jadwal Periksa</h5>
                    </div>
                    <div class="card-body">
                        <!-- Form Edit -->
                        <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Input Hari -->
                            <div class="form-group mb-3">
                                <label for="hari">Hari</label>
                                <input type="text" name="hari" id="hari" class="form-control"
                                    value="{{ old('hari', $jadwal->hari) }}" required>
                            </div>

                            <!-- Input Jam Mulai -->
                            <div class="form-group mb-3">
                                <label for="jam_mulai">Jam Mulai</label>
                                <input type="time" name="jam_mulai" id="jam_mulai" class="form-control"
                                    value="{{ old('jam_mulai', $jadwal->jam_mulai) }}" required>
                            </div>

                            <!-- Input Jam Selesai -->
                            <div class="form-group mb-3">
                                <label for="jam_selesai">Jam Selesai</label>
                                <input type="time" name="jam_selesai" id="jam_selesai" class="form-control"
                                    value="{{ old('jam_selesai', $jadwal->jam_selesai) }}" required>
                            </div>

                            <!-- Input Keterangan -->
                            <div class="form-group mb-3">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" rows="3" class="form-control" required>{{ old('keterangan', $jadwal->keterangan) }}</textarea>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
