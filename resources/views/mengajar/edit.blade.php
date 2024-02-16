@extends('layouts.main')

@section('content')
<center>
<h1>Tambah Mengajar</h1>
</center>

<form action="{{ route('mengajar.update', $mengajar->id) }}" class="container-form" method="POST">
    @method('PATCH')
    @csrf
    <div class="form-control">
        <label for="guru_id">guru</label>
        <select name="guru_id" id="guru_id">
            @foreach ($gurus as $guru)
                <option value="{{ $guru->id }}" @if(old('guru_id', $guru->id) == $mengajar->guru_id) selected @endif>{{ $guru->nama_guru }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-control">
        <label for="mapel_id">mapel</label>
        <select name="mapel_id" id="mapel_id">
            @foreach ($mapels as $mapel)
                <option value="{{ $mapel->id }}" @if(old('mapel_id', $mapel->id) == $mengajar->mapel_id) selected @endif>{{ $mapel->nama_mapel }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-control">
        <label for="kelas_id">kelas</label>
        <select name="kelas_id" id="kelas_id">
            @foreach ($kelass as $kelas)
                <option value="{{ $kelas->id }}" @if(old('kelas_id', $kelas->id) == $mengajar->kelas_id) selected @endif>{{ $kelas->kelas }} {{ $kelas->jurusan }} {{ $kelas->rombel }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="button-primary">Tambah</button>
</form>
@endsection

