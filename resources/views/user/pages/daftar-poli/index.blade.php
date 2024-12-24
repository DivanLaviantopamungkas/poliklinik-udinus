@extends('user.layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <!-- Form Pendaftaran -->
                <h2>Pendaftaran Poli</h2>
                <form action="{{ route('pendaftaran.poli.store') }}" method="POST">
                    @csrf

                    <!-- Pilih Poli -->
                    <div class="form-group">
                        <label for="poli_id">Pilih Poli</label>
                        <select id="poli_id" name="poli_id" class="form-control" required>
                            <option value="">-- Pilih Poli --</option>
                            @foreach ($poli as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_poli }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pilih Dokter -->
                    <div class="form-group">
                        <label for="dokter_id">Pilih Dokter</label>
                        <select id="dokter_id" name="dokter_id" class="form-control" required>
                            <option value="">-- Pilih Dokter --</option>
                        </select>
                    </div>

                    <!-- Pilih Jadwal -->
                    <div class="form-group">
                        <label for="jadwal_id">Pilih Jadwal</label>
                        <select id="jadwal_id" name="jadwal_id" class="form-control" required>
                            <option value="">-- Pilih Jadwal --</option>
                        </select>
                    </div>

                    <!-- Keluhan -->
                    <div class="form-group">
                        <label for="keluhan">Keluhan</label>
                        <textarea id="keluhan" name="keluhan" class="form-control" rows="3" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Daftar</button>
                </form>
            </div>

            <!-- Cek Apakah Pasien Sudah Mendaftar -->
            <div class="col-md-4">
                @php
                    // Cek apakah pengguna terautentikasi dan apakah data pasien tersedia
                    $pasien = auth()->user()->pasien ?? null;
                    $daftarPoli = $pasien ? $pasien->daftarPoli->last() : null; // Ambil data daftar poli terakhir
                @endphp

                @if ($daftarPoli)
                    <!-- Tampilkan Nomor Antrian atau Status Pemeriksaan -->
                    @if ($daftarPoli->status_periksa == 1)
                        <!-- Jika Sudah Diperiksa -->
                        <h2>Status Pemeriksaan</h2>
                        <div class="card shadow-lg border-0 rounded-lg" style="background-color: #f5f5f5;">
                            <div class="card-body text-center">
                                <h4 class="font-weight-bold text-success mb-3" style="font-size: 24px;">Pemeriksaan Selesai
                                </h4>
                                <div class="bg-success text-white p-3 rounded mb-3">
                                    <h4 class="font-weight-bold" style="font-size: 20px;">
                                        Status Pemeriksaan: Telah Diperiksa Silahkan Daftar Kembali :)
                                    </h4>
                                </div>
                                <p class="text-muted mb-1" style="font-size: 14px;">Tanggal:
                                    {{ $daftarPoli->updated_at->format('d M Y') }}</p>
                                <p class="text-muted mb-1" style="font-size: 14px;">Waktu:
                                    {{ $daftarPoli->updated_at->format('H:i') }}</p>
                                <p class="font-italic text-muted" style="font-size: 14px;">Terima kasih telah menggunakan
                                    layanan kami.</p>
                            </div>
                        </div>
                    @else
                        <!-- Jika Belum Diperiksa -->
                        <h2>Nomor Antrian Anda</h2>
                        <div class="card shadow-lg border-0 rounded-lg" style="background-color: #f5f5f5;">
                            <div class="card-body text-center">
                                <h4 class="font-weight-bold text-primary mb-3" style="font-size: 24px;">Struk Antrian</h4>
                                <div class="bg-primary text-white p-3 rounded mb-3">
                                    <h4 class="display-4 font-weight-bold" style="font-size: 40px;">
                                        {{ $daftarPoli->no_antrian }}
                                    </h4>
                                    <p class="text-white" style="font-size: 16px;">Nomor Antrian Anda</p>
                                </div>
                                <p class="text-muted mb-1" style="font-size: 14px;">Tanggal: {{ now()->format('d M Y') }}
                                </p>
                                <p class="text-muted mb-1" style="font-size: 14px;">Waktu: {{ now()->format('H:i') }}</p>

                                @if ($daftarPoli->poli)
                                    <p class="text-muted" style="font-size: 14px;">Poli: {{ $daftarPoli->poli->nama_poli }}
                                    </p>
                                @else
                                    <p class="text-muted" style="font-size: 14px;">Poli: Data Poli Tidak Ditemukan</p>
                                @endif

                                <div class="mt-3">
                                    <p class="font-weight-bold" style="font-size: 16px;">Harap Menunggu Panggilan</p>
                                    <p class="font-italic text-muted" style="font-size: 14px;">Terima kasih telah memilih
                                        layanan kami.</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    <!-- Jika Belum Ada Data -->
                    <h2>Belum Ada Data Antrian</h2>
                    <p class="text-muted">Silakan mendaftar untuk mendapatkan nomor antrian.</p>
                @endif
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.getElementById('poli_id').addEventListener('change', function() {
                const poliId = this.value; // Ambil ID Poli yang dipilih
                console.log('Pilih Poli ID:', poliId); // Pastikan ini muncul di konsol ketika pilihan berubah
                const dokterSelect = document.getElementById('dokter_id');
                const jadwalSelect = document.getElementById('jadwal_id');

                // Reset pilihan jadwal dan dokter saat memilih poli baru
                dokterSelect.innerHTML = '<option value="">-- Pilih Dokter --</option>';
                jadwalSelect.innerHTML = '<option value="">-- Pilih Jadwal --</option>';

                if (!poliId) {
                    return; // Jika tidak ada poli yang dipilih, tidak ada aksi yang perlu dilakukan
                }

                // Panggil API dengan AJAX untuk mendapatkan dokter berdasarkan poli yang dipilih
                fetch(`/api/dokter-by-poli/${poliId}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log('Dokter data:', data); // Periksa apakah data dokter diterima dengan benar
                        let options = '<option value="">-- Pilih Dokter --</option>';
                        data.forEach(dokter => {
                            options += `<option value="${dokter.id}">${dokter.nama}</option>`;
                        });
                        dokterSelect.innerHTML = options; // Update dropdown Dokter
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        dokterSelect.innerHTML = '<option value="">-- Pilih Dokter --</option>';
                    });
            });

            // Event listener untuk memilih dokter dan memuat jadwal terkait
            document.getElementById('dokter_id').addEventListener('change', function() {
                const dokterId = this.value; // Ambil ID Dokter yang dipilih
                const jadwalSelect = document.getElementById('jadwal_id');

                // Reset pilihan jadwal saat dokter baru dipilih
                jadwalSelect.innerHTML = '<option value="">-- Pilih Jadwal --</option>';

                if (!dokterId) {
                    return; // Jika tidak ada dokter yang dipilih, tidak ada aksi yang perlu dilakukan
                }

                // Panggil API dengan AJAX untuk mendapatkan jadwal dokter berdasarkan dokter yang dipilih
                fetch(`/api/jadwal-by-dokter/${dokterId}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log('Jadwal data:', data);
                        let options = '<option value="">-- Pilih Jadwal --</option>';
                        data.forEach(jadwal => {
                            // Format waktu menjadi jam:menit
                            let jamMulai = jadwal.jam_mulai.split(':').slice(0, 2).join(
                                ':'); // Ambil jam dan menit saja
                            let jamSelesai = jadwal.jam_selesai.split(':').slice(0, 2).join(
                                ':'); // Ambil jam dan menit saja

                            options +=
                                `<option value="${jadwal.id}">${jadwal.hari}, ${jamMulai} - ${jamSelesai}</option>`;
                        });
                        jadwalSelect.innerHTML = options; // Update dropdown Jadwal
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        jadwalSelect.innerHTML = '<option value="">-- Pilih Jadwal --</option>';
                    });
            });
        </script>
    @endpush
@endsection
