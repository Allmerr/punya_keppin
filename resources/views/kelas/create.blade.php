@extends('layouts.main')

@section('content')
<center>
<h1>Tambah Kelas</h1>
</center>

<form action="{{ route('kelas.store') }}" class="container-form" method="POST">
    @csrf
    <div class="form-control">
        <label for="kelas">Nama kelas</label>
        <select name="kelas" id="kelas">
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
        </select>
    </div>
    <div class="form-control">
        <label for="jurusan">Nama Jurusan</label>
        <select name="jurusan" id="jurusan">
            <option value="DKV/MM">DKV/MM</option>
            <option value="BKP">BKP</option>
            <option value="DPIB">DPIB</option>
            <option value="RPL">RPL</option>
            <option value="SIJA">SIJA</option>
            <option value="TKJ">TKJ</option>
            <option value="TP">TP</option>
            <option value="TOI">TOI</option>
            <option value="TKR">TKR</option>
            <option value="TFLM">TFLM</option>
        </select>
    </div>
    <div class="form-control">
        <label for="rombel">Nama Rombel</label>
        <select name="rombel" id="rombel">
            <option value="1">1</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
    </div>

    <button type="submit" class="button-primary">Tambah</button>
</form>
@endsection

