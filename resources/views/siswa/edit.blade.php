@extends('layouts.main')

@section('content')
<center>
<h1>Tambah Kelas</h1>
</center>

<form action="{{ route('siswa.update', $siswa->id) }}" class="container-form" method="POST">
    @method('PATCH')
    @csrf
    <div class="form-control">
        <label for="nis">NIS</label>
        <input type="text" id="nis" name="nis" value="{{ old('nis', $siswa->nis) }}">
    </div>
    <div class="form-control">
        <label for="nama_siswa">Nama Siswa</label>
        <input type="text" id="nama_siswa" name="nama_siswa" value="{{ old('nama_siswa', $siswa->nama_siswa) }}">
    </div>
    <div class="form-control">
        <label for="jk">Jenis Kelamin</label>
        <select name="jk" id="jk">
            <option value="L" @if(old('jk', $siswa->jk) == 'L') selected @endif>laki-laki</option>
            <option value="P" @if(old('jk', $siswa->jk) == 'P') selected @endif>Perempuan</option>
        </select>
    </div>
    <div class="form-control">
        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat" cols="30" rows="10">{{ $siswa->alamat }}</textarea>
    </div>
    <div class="form-control">
        <label for="kelas_id">Kelas</label>
        <select name="kelas_id" id="kelas_id">
            @foreach ($kelass as $kelas)
                <option value="{{ $kelas->id }}" @if(old('kelas_id', $siswa->kelas_id) == $kelas->id ) selected @endif>{{ $kelas->kelas }} {{ $kelas->jurusan }} {{ $kelas->rombel }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-control">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" value="{{ old('password', $siswa->password) }}">
    </div>

    <button type="submit" class="button-primary">Tambah</button>
</form>
@endsection

