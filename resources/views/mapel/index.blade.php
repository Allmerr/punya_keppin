@extends('layouts.main')
@section('content')
<center>

    <h2>Data Mapel</h2>
    <a href="{{ route('mapel.create') }}" class="button-primary">Tambah Mapel</a>
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mapel</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mapels as $mapel)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mapel->nama_mapel }}</td>
                <td>
                    <a class="button-warning" href="{{ route('mapel.edit', $mapel->id) }}">Ubah</a>
                    <form action="{{ route('mapel.destroy', $mapel->id) }}" method="POST" style="display:inline-block;">
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
