@extends('layouts.main')

@section('content')
<center>
<h1>Tambah Mapel</h1>
</center>

<form action="{{ route('mapel.update', $mapel->id) }}" class="container-form" method="POST">
    @method('PATCH')
    @csrf
    <div class="form-control">
        <label for="nama_mapel">Nama Mapel</label>
        <input type="text" name="nama_mapel" id="nama_mapel" value="{{ old('nama_mapel', $mapel->nama_mapel) }}">
    </div>
    <button type="submit" class="button-primary">Ubah</button>
</form>
@endsection

