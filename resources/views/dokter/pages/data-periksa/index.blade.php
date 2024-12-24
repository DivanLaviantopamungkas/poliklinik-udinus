@extends('dokter.layouts.app')

@section('content')
    <div class="container">
        <h3>Daftar Pasien untuk Pemeriksaan</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No Antrian</th>
                    <th>Nama Pasien</th>
                    <th>Keluhan</th>
                    <th>Jadwal Pemeriksaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($daftarPoli as $data)
                    <tr>
                        <td>{{ $data->no_antrian }}</td>
                        <td>{{ $data->pasien->nama }}</td>
                        <td>{{ $data->keluhan }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($data->jadwal->jam_mulai)->format('H:i') }} -
                            {{ \Carbon\Carbon::parse($data->jadwal->jam_selesai)->format('H:i') }}
                        </td>
                        <td>
                            @if (optional($data->periksa->first())->status == 1)
                                <span style="color: green; font-weight: bold;">Selesai</span>
                            @else
                                <a href="{{ route('periksa.create', $data->id) }}" class="btn btn-primary btn-sm">Periksa</a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada pasien untuk diperiksa.</td>
                    </tr>
                @endforelse
            </tbody>

        </table>

    </div>
@endsection
