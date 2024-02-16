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

    @endif

</center>
@endsection
