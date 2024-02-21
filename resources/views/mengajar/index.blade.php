@extends('layouts.main')
@section('content')
<center>

    <h2>Data Mengajar</h2>
    <a href="{{ route('mengajar.create') }}" class="button-primary">Tambah Mengajar</a>
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Guru</th>
                <th>Nama Mapel</th>
                <th>Nama Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mengajars as $mengajar)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mengajar->guru->nama_guru }}</td>
                <td>{{ $mengajar->mapel->nama_mapel }}</td>
                <td>{{ $mengajar->kelas->kelas }} {{ $mengajar->kelas->jurusan }} {{ $mengajar->kelas->rombel }}</td>
                <td>
                    <a class="button-warning" href="{{ route('mengajar.edit', $mengajar->id) }}">Ubah</a>
                    <form action="{{ route('mengajar.destroy', $mengajar->id) }}" method="POST" style="display:inline-block;">
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
