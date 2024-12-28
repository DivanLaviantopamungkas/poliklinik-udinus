@extends('user.layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-4">Riwayat Pemeriksaan</h3>

        @if ($periksa->isEmpty())
            <div class="alert alert-info">Belum ada riwayat pemeriksaan.</div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pemeriksaan</th>
                            <th>Poli</th>
                            <th>Dokter</th>
                            <th>Catatan</th>
                            <th>Obat</th>
                            <th>Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($periksa as $index => $periksa)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $periksa->tgl_periksa }}</td>
                                <td>{{ $periksa->daftarpoli->poli->nama_poli ?? 'Tidak Ada Poli' }}</td>
                                <td>{{ $periksa->daftarpoli->dokter->nama ?? 'Tidak Ada Dokter' }}</td>
                                <td>{{ $periksa->catatan }}</td>
                                <td>
                                    @foreach ($periksa->detailPeriksa as $detail)
                                        {{ $detail->obat->nama_obat ?? 'Tidak Ada Obat' }},
                                    @endforeach
                                </td>
                                <td>{{ $periksa->biaya_dokter + $periksa->biaya_periksa }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
