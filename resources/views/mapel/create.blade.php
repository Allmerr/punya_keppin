@extends('layouts.main')

@section('content')
<center>
<h1>Tambah Mapel</h1>
</center>

<form action="{{ route('mapel.store') }}" class="container-form" method="POST">
    @csrf
    <div class="form-control">
        <label for="nama_mapel">Nama Mapel</label>
        <input type="text" name="nama_mapel" id="nama_mapel">
    </div>
    <button type="submit" class="button-primary">Tambah</button>
</form>
@endsection

