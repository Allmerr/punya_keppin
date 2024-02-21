@extends('layouts.main')
@section('content')
<center>

    <h2>Data Nilai Kelas {{ $mengajar->kelas->kelas }} {{ $mengajar->kelas->jurusan }} {{ $mengajar->kelas->rombel }}</h2>
    <a href="{{ route('nilai.kelas.create', $mengajar->id) }}" class="button-primary">Tambah Nilai</a>
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>UH</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>NA</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilais as $nilai)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $nilai->siswa->nama_siswa }}</td>
                <td>{{ $nilai->uh }}</td>
                <td>{{ $nilai->uts }}</td>
                <td>{{ $nilai->uas }}</td>
                <td>{{ $nilai->na }}</td>
                <td>
                    <a class="button-warning" href="{{ route('nilai.kelas.edit', [
                        'mengajar' => $mengajar->id,
                        'siswa' => $nilai->siswa->id,
                    ]) }}">Ubah</a>
                    <form action="{{ route('nilai.kelas.destroy', [
                        'mengajar' => $mengajar->id,
                        'siswa' => $nilai->siswa->id,
                    ]) }}" method="POST" style="display:inline-block;">
                        @method('DELETE')
                        @csrf
                        <button class="button-danger" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</center>
@endsection
