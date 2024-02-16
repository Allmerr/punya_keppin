@extends('layouts.main')

@section('content')
<center>
<h1>Tambah Kelas</h1>
</center>

<form action="{{ route('siswa.store') }}" class="container-form" method="POST">
    @csrf
    <div class="form-control">
        <label for="nis">NIS</label>
        <input type="text" id="nis" name="nis">
    </div>
    <div class="form-control">
        <label for="nama_siswa">Nama Siswa</label>
        <input type="text" id="nama_siswa" name="nama_siswa">
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
        <label for="kelas_id">Kelas</label>
        <select name="kelas_id" id="kelas_id">
            @foreach ($kelass as $kelas)
                <option value="{{ $kelas->id }}">{{ $kelas->kelas }} {{ $kelas->jurusan }} {{ $kelas->rombel }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-control">
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
    </div>

    <button type="submit" class="button-primary">Tambah</button>
</form>
@endsection

