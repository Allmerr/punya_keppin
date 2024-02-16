@extends('layouts.main')
@section('content')
<center>

    <h2>Data Kelas</h2>
    <a href="{{ route('siswa.create') }}" class="button-primary">Tambah Siswa</a>
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas as $siswa)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->nama_siswa }}</td>
                <td>{{ $siswa->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                <td>{{ $siswa->alamat }}</td>
                <td>{{ $siswa->kelas->kelas }} {{ $siswa->kelas->jurusan }} {{ $siswa->kelas->romvel }}</td>
                <td>
                    <a class="button-warning" href="{{ route('siswa.edit', $siswa->id) }}">Ubah</a>
                    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display:inline-block;">
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
