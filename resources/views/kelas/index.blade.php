@extends('layouts.main')
@section('content')
<center>

    <h2>Data Kelas</h2>
    <a href="{{ route('kelas.create') }}" class="button-primary">Tambah kelas</a>
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Rombel</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelass as $kelas)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kelas->kelas }}</td>
                <td>{{ $kelas->jurusan }}</td>
                <td>{{ $kelas->rombel }}</td>
                <td>
                    <a class="button-warning" href="{{ route('kelas.edit', $kelas->id) }}">Ubah</a>
                    <form action="{{ route('kelas.destroy', $kelas->id) }}" method="POST" style="display:inline-block;">
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
