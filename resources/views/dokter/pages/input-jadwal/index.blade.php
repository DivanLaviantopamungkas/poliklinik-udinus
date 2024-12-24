@extends('dokter.layouts.app')

@section('content')
    <div class="container">
        <h2>Jadwal Periksa</h2>
        <a href="{{ route('jadwal.create') }}" class="btn btn-primary mb-3">Tambah Jadwal</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Keterangan</th>
                    <th>Status Aktif</th> <!-- Tambahkan kolom status -->
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwals as $index => $jadwal)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $jadwal->hari }}</td>
                        <td>{{ date('H.i', strtotime($jadwal->jam_mulai)) }}</td>
                        <td>{{ date('H.i', strtotime($jadwal->jam_selesai)) }}</td>
                        <td>{{ $jadwal->keterangan ?? '-' }}</td>
                        <td>
                            @if ($jadwal->aktif)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Tidak Aktif</span>
                            @endif
                        </td>
                        <td>
                            @if (!$jadwal->aktif)
                                <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('jadwal.activate', $jadwal->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm">Aktifkan</button>
                                </form>
                            @endif
                            <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    @if ($jadwal->aktif) disabled @endif>
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection
