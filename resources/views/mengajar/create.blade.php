@extends('layouts.main')

@section('content')
<center>
<h1>Tambah Mengajar</h1>
</center>

<form action="{{ route('mengajar.store') }}" class="container-form" method="POST">
    @csrf
    <div class="form-control">
        <label for="guru_id">guru</label>
        <select name="guru_id" id="guru_id">
            @foreach ($gurus as $guru)
                <option value="{{ $guru->id }}">{{ $guru->nama_guru }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-control">
        <label for="mapel_id">mapel</label>
        <select name="mapel_id" id="mapel_id">
            @foreach ($mapels as $mapel)
                <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-control">
        <label for="kelas_id">kelas</label>
        <select name="kelas_id" id="kelas_id">
            @foreach ($kelass as $kelas)
                <option value="{{ $kelas->id }}">{{ $kelas->kelas }} {{ $kelas->jurusan }} {{ $kelas->rombel }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="button-primary">Tambah</button>
</form>
@endsection

