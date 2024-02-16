@extends('layouts.main')
@section('content')
<center>

    <h2>Data Kelas</h2>
    <a href="{{ route('guru.create') }}" class="button-primary">Tambah Guru</a>
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Guru</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gurus as $guru)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $guru->nip }}</td>
                <td>{{ $guru->nama_guru }}</td>
                <td>{{ $guru->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                <td>{{ $guru->alamat }}</td>
                <td>
                    <a class="button-warning" href="{{ route('guru.edit', $guru->id) }}">Ubah</a>
                    <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" style="display:inline-block;">
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
