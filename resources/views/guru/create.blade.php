@extends('layouts.main')

@section('content')
<center>
<h1>Tambah Kelas</h1>
</center>

<form action="{{ route('guru.store') }}" class="container-form" method="POST">
    @csrf
    <div class="form-control">
        <label for="nip">NIP</label>
        <input type="text" id="nip" name="nip">
    </div>
    <div class="form-control">
        <label for="nama_guru">Nama Guru</label>
        <input type="text" id="nama_guru" name="nama_guru">
    </div>
    <div class="form-control">
        <label for="jk">Jenis Kelamin</label>
        <select name="jk" id="jk">
            <option value="L">laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>
    <div class="form-control">
        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat" cols="30" rows="10"></textarea>
    </div>
    <div class="form-control">
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
    </div>

    <button type="submit" class="button-primary">Tambah</button>
</form>
@endsection

