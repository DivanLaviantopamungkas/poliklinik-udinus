<!-- resources/views/dokter/riwayat/detail.blade.php -->
<div>
    <h5>Detail Pemeriksaan</h5>

    <p><strong>Nama Pasien:</strong> {{ $detail->daftarPoli->pasien->nama }}</p>
    <p><strong>Keluhan:</strong> {{ $detail->daftarPoli->keluhan }}</p>
    <p><strong>Tanggal Pemeriksaan:</strong> {{ \Carbon\Carbon::parse($detail->tgl_periksa)->format('d M Y H:i') }}</p>
    <p><strong>Status Pemeriksaan:</strong>
        @if ($detail->status == 1)
            <span style="color: green; font-weight: bold;">Selesai</span>
        @else
            <span style="color: orange; font-weight: bold;">Menunggu</span>
        @endif
    </p>

    <h6>Obat yang Diberikan:</h6>
    <ul>
        @foreach ($detail->detailPeriksa as $detailObat)
            <li>{{ $detailObat->obat->nama }} (Rp. {{ number_format($detailObat->obat->harga, 0, ',', '.') }})</li>
        @endforeach
    </ul>

    <p><strong>Catatan:</strong> {{ $detail->catatan }}</p>
</div>
<script>
    $(document).ready(function() {
        $('#detailModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Tombol yang diklik
            var id = button.data('id'); // ID pemeriksaan

            // Mengambil data pemeriksaan berdasarkan ID
            $.ajax({
                url: '/dokter/riwayat/detail/' + id, // Menyertakan parameter ID
                method: 'GET',
                success: function(response) {
                    var detail = response.data;

                    // Menampilkan data dalam modal
                    var content = `
                        <p><strong>Nama Pasien:</strong> ${detail.daftarPoli.pasien.nama}</p>
                        <p><strong>Keluhan:</strong> ${detail.daftarPoli.keluhan}</p>
                        <p><strong>Tanggal Pemeriksaan:</strong> ${moment(detail.tgl_periksa).format('D MMM YYYY HH:mm')}</p>
                        <p><strong>Status Pemeriksaan:</strong> ${detail.status == 1 ? 'Selesai' : 'Menunggu'}</p>
                        <h6>Obat yang Diberikan:</h6>
                        <ul>
                            ${detail.detailPeriksa.map(function(item) {
                                return `<li>${item.obat.nama} - Rp. ${item.obat.harga}</li>`;
                            }).join('')}
                        </ul>
                        <p><strong>Catatan:</strong> ${detail.catatan}</p>
                    `;
                    $('#modalDetailBody').html(content);
                }
            });
        });
    });
</script>
