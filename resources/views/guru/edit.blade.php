@extends('layouts.main')

@section('content')
<center>
<h1>Tambah Kelas</h1>
</center>

<form action="{{ route('guru.update', $guru->id) }}" class="container-form" method="POST">
    @method('PATCH')
    @csrf
    <div class="form-control">
        <label for="nip">NIP</label>
        <input type="text" id="nip" name="nip" value="{{ old('nip', $guru->nip) }}">
    </div>
    <div class="form-control">
        <label for="nama_guru">Nama Guru</label>
        <input type="text" id="nama_guru" name="nama_guru" value="{{ old('nama_guru', $guru->nama_guru) }}">
    </div>
    <div class="form-control">
        <label for="jk">Jenis Kelamin</label>
        <select name="jk" id="jk">
            <option value="L" @if(old('jk', $guru->jk) == 'L') selected @endif>laki-laki</option>
            <option value="P" @if(old('jk', $guru->jk) == 'P') selected @endif>Perempuan</option>
        </select>
    </div>
    <div class="form-control">
        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat" cols="30" rows="10">{{ $guru->alamat }}</textarea>
    </div>
    <div class="form-control">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" value="{{ $guru->password }}">
    </div>

    <button type="submit" class="button-primary">Tambah</button>
</form>
@endsection

