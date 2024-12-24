@extends('dokter.layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Riwayat Pemeriksaan Pasien</h4>
                    </div>
                    <div class="card-body">
                        @if ($riwayat->isEmpty())
                            <div class="alert alert-info">
                                Belum ada pemeriksaan yang ditemukan.
                            </div>
                        @else
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pasien</th>
                                        <th>Tanggal Pemeriksaan</th>
                                        <th>Biaya Pemeriksaan</th>
                                        <th>Status</th>
                                        <th>Catatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($riwayat as $index => $data)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $data->daftarPoli->pasien->nama }}</td>
                                            <td>{{ \Carbon\Carbon::parse($data->tgl_periksa)->format('d M Y H:i') }}</td>
                                            <td>Rp. {{ number_format($data->biaya_periksa, 0, ',', '.') }}</td>
                                            <td>
                                                @if ($data->status == 1)
                                                    <span class="badge bg-success">Selesai</span>
                                                @else
                                                    <span class="badge bg-warning">Menunggu</span>
                                                @endif
                                            </td>
                                            <td>{{ $data->catatan }}</td>
                                            <td>
                                                <button class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#detailModal" data-id="{{ $data->id }}">
                                                    Detail Pemeriksaan
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailModalLabel">Detail Pemeriksaan Pasien</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="modalDetailBody">
                                    <h1>Loading...</h1>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#detailModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Tombol yang diklik
                    var id = button.data('id'); // Ambil ID dari data-id tombol
                    var modalBody = $('#modalDetailBody'); // Body dari modal

                    console.log('Modal dibuka untuk ID:', id); // Debug ID

                    // Tampilkan pesan loading
                    modalBody.html('<p>Loading...</p>');

                    // Panggil API endpoint untuk mendapatkan detail
                    $.ajax({
                        url: '/api/dokter/riwayat/detail/' + id, // Sesuaikan endpoint API
                        method: 'GET',
                        success: function(response) {
                            console.log('Response API:', response); // Debug respons API

                            if (response.data && response.data.length > 0) {
                                var detail = response.data;
                                var content = `
                            <p><strong>Nama Pasien:</strong> ${detail[0]?.nama_pasien || 'Data tidak tersedia'}</p>
                            <p><strong>Obat:</strong></p>
                            <ul>
                                ${detail.map(function(item) {
                        return `<li>${item.nama_obat || 'Nama obat tidak tersedia'}</li>`;
                    }).join('')}
                            </ul>
                            <p><strong>Dibuat Pada:</strong> ${moment(detail[0]?.created_at).format('D MMM YYYY HH:mm')}</p>
                        `;
                                modalBody.html(content); // Pastikan isi modal diupdate
                            } else {
                                modalBody.html('<p>Data detail tidak ditemukan.</p>');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log('AJAX Error:', status, error); // Debug error AJAX
                            modalBody.html('<p>Terjadi kesalahan saat mengambil data.</p>');
                        }
                    });
                });
            });
        </script>
    @endpush


@endsection
