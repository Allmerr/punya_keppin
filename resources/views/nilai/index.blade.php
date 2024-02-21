@extends('layouts.main')
@section('content')
<center>

    @if(session('type_user') == 'guru')

        <h1>Data Kelas</h1>

        <div class="content-menu">
        @foreach ($mengajars as $mengajar)
                <div class="menu-kelas">
                    <div class="kelas-list">
                        <a href="{{ route('nilai.kelas.index', $mengajar->id) }}">{{ $mengajar->kelas->kelas }} {{ $mengajar->kelas->jurusan }} {{ $mengajar->kelas->rombel }}</a>
                    </div>
                </div>
        @endforeach
        </div>

    @elseif(session('type_user') == 'siswa')
        <h1>Data Siswa</h1>

        <table class="table-data">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>UH</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>NA</th>
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
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</center>
@endsection
