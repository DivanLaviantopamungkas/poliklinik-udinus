@extends('dokter.layouts.app')

@section('content')
    <div class="container">
        <h3>Input Pemeriksaan Pasien</h3>

        <form action="{{ route('periksa.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id_daftar_poli" value="{{ $daftarPoli->id }}">

            <div class="mb-3">
                <label for="nama_pasien" class="form-label">Nama Pasien</label>
                <input type="text" class="form-control" id="nama_pasien" value="{{ $daftarPoli->pasien->nama }}" disabled>
            </div>

            <div class="mb-3">
                <label for="keluhan" class="form-label">Keluhan</label>
                <textarea class="form-control" id="keluhan" disabled>{{ $daftarPoli->keluhan }}</textarea>
            </div>

            <!-- Pilih Obat -->
            <div class="form-group">
                <label for="obat">Pilih Obat</label>
                <select id="obat-select" class="form-control">
                    <option value="">-- Pilih Obat --</option>
                    @foreach ($obatList as $obat)
                        <option value="{{ $obat->id }}" data-name="{{ $obat->nama_obat }}"
                            data-price="{{ $obat->harga }}">
                            {{ $obat->nama_obat }} - Rp. {{ number_format($obat->harga, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Daftar Obat yang Dipilih -->
            <h5>Daftar Obat yang Dipilih:</h5>
            <div id="daftar-obat" class="d-flex flex-wrap mb-3">
                <!-- Item obat akan dimasukkan di sini secara dinamis -->
            </div>

            <!-- Input Hidden untuk Data Obat -->
            <div id="hidden-inputs"></div>

            <!-- Input Biaya Jasa Dokter -->
            <div class="form-group">
                <label for="biaya-dokter">Biaya Jasa Dokter</label>
                <input type="number" id="biaya-dokter" name="biaya_dokter" class="form-control" min="0">
            </div>

            <!-- Catatan Pemeriksaan -->
            <div class="form-group">
                <label for="catatan">Catatan Pemeriksaan</label>
                <textarea name="catatan" id="catatan" class="form-control" rows="3" required></textarea>
            </div>

            <div class="card mt-3 mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Rincian Biaya</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span><strong>Total Biaya Obat:</strong></span>
                        <span>Rp. <strong id="total-biaya-obat">0</strong></span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span><strong>Total Biaya Pemeriksaan:</strong></span>
                        <span>Rp. <strong id="total-biaya-pemeriksaan">0</strong></span>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Simpan Pemeriksaan</button>
            <a href="{{ route('periksa.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    @push('scripts')
        <script>
            let totalBiayaObat = 0;

            // Event Listener untuk menambahkan obat
            document.getElementById('obat-select').addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const obatId = selectedOption.value;
                const obatName = selectedOption.getAttribute('data-name');
                const obatPrice = parseInt(selectedOption.getAttribute('data-price'));

                if (obatId && !document.getElementById(`obat-${obatId}`)) {
                    // Tambahkan ke daftar obat
                    const daftarObat = document.getElementById('daftar-obat');
                    const listItem = document.createElement('li');
                    listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
                    listItem.id = `obat-${obatId}`;
                    listItem.innerHTML = `
            ${obatName} - Rp. ${obatPrice.toLocaleString('id-ID')}
            <button type="button" class="btn btn-danger btn-sm" onclick="hapusObat(${obatId}, ${obatPrice})">Hapus</button>
        `;
                    daftarObat.appendChild(listItem);

                    // Tambahkan input hidden
                    const hiddenInputs = document.getElementById('hidden-inputs');
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'obat[]';
                    hiddenInput.id = `hidden-obat-${obatId}`;
                    hiddenInput.value = obatId;
                    hiddenInputs.appendChild(hiddenInput);

                    // Update total biaya obat
                    totalBiayaObat += obatPrice;
                    updateTotal();
                }
            });

            // Hapus obat dari daftar
            function hapusObat(obatId, obatPrice) {
                document.getElementById(`obat-${obatId}`).remove();
                document.getElementById(`hidden-obat-${obatId}`).remove();

                totalBiayaObat -= obatPrice;
                updateTotal();
            }

            // Update total biaya
            function updateTotal() {
                const biayaDokter = parseInt(document.getElementById('biaya-dokter').value) || 0;
                document.getElementById('total-biaya-obat').innerText = totalBiayaObat.toLocaleString('id-ID');
                const totalPemeriksaan = totalBiayaObat + biayaDokter;
                document.getElementById('total-biaya-pemeriksaan').innerText = totalPemeriksaan.toLocaleString('id-ID');
            }

            // Event listener untuk input biaya dokter
            document.getElementById('biaya-dokter').addEventListener('input', updateTotal);
        </script>
    @endpush
@endsection
