@extends('layouts.main')

@section('content')
<center>
<h1>Ubah Kelas</h1>
</center>

<form action="{{ route('kelas.update', $kelas->id) }}" class="container-form" method="POST">
    @method('PATCH')
    @csrf
    <div class="form-control">
        <label for="kelas">Nama kelas</label>
        <select name="kelas" id="kelas">
            <option value="10" @if(old('kelas', $kelas->kelas) == 10) selected @endif>10</option>
            <option value="11" @if(old('kelas', $kelas->kelas) == 11) selected @endif>11</option>
            <option value="12" @if(old('kelas', $kelas->kelas) == 12) selected @endif>12</option>
            <option value="13" @if(old('kelas', $kelas->kelas) == 13) selected @endif>13</option>
        </select>
    </div>

    {{-- @if(old('jurusan', $kelas->jurusan) == 'TOI') chekced @endif --}}


    <div class="form-control">
        <label for="jurusan">Nama Jurusan</label>
        <select name="jurusan" id="jurusan">
            <option value="DKV/MM" @if(old('jurusan', $kelas->jurusan) === 'DKV/MM') selected @endif>DKV/MM</option>
            <option value="BKP" @if(old('jurusan', $kelas->jurusan) === 'BKP') selected @endif>BKP</option>
            <option value="DPIB" @if(old('jurusan', $kelas->jurusan) === 'DPIB') selected @endif>DPIB</option>
            <option value="RPL" @if(old('jurusan', $kelas->jurusan) === 'RPL') selected @endif>RPL</option>
            <option value="SIJA" @if(old('jurusan', $kelas->jurusan) === 'SIJA') selected @endif>SIJA</option>
            <option value="TKJ" @if(old('jurusan', $kelas->jurusan) === 'TKJ') selected @endif>TKJ</option>
            <option value="TP" @if(old('jurusan', $kelas->jurusan) === 'TP') selected @endif>TP</option>
            <option value="TOI" @if(old('jurusan', $kelas->jurusan) === 'TOI') selected @endif>TOI</option>
            <option value="TKR" @if(old('jurusan', $kelas->jurusan) === 'TKR') selected @endif>TKR</option>
            <option value="TFLM" @if(old('jurusan', $kelas->jurusan) === 'TFLM') selected @endif>TFLM</option>
        </select>
    </div>
    <div class="form-control">
        <label for="rombel">Nama Rombel</label>
        <select name="rombel" id="rombel">
            <option value="1" @if(old('rombel', $kelas->rombel) == '1') selected @endif>1</option>
            <option value="2" @if(old('rombel', $kelas->rombel) == '2') selected @endif>2</option>
            <option value="3" @if(old('rombel', $kelas->rombel) == '3') selected @endif>3</option>
            <option value="4" @if(old('rombel', $kelas->rombel) == '4') selected @endif>4</option>
        </select>
    </div>

    <button type="submit" class="button-primary">Ubah</button>
</form>
@endsection

