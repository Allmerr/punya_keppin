@extends('layouts.main')

@section('content')
<center>
<h1>Tambah Mengajar</h1>
</center>

<form action="{{ route('nilai.kelas.update',  [
    'mengajar' => $mengajar->id,
    'siswa' => $nilai->siswa->id,
    ]) }}" class="container-form" method="POST">

    @csrf
    <div class="form-control">
        <label for="siswa_id">siswa</label>
        <select name="siswa_id" id="siswa_id">
            @foreach ($siswas as $siswa)
                <option value="{{ $siswa->id }}" @if(old('siswa_id', $nilai->siswa_id) == $siswa->id) selected @endif>{{ $siswa->nama_siswa }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-control">
        <label for="uh">UH</label>
        <input type="number" id="uh" name="uh" value="{{ old('uh', $nilai->uh) }}">
    </div>
    <div class="form-control">
        <label for="uts">UTS</label>
        <input type="number" id="uts" name="uts" value="{{ old('uh', $nilai->uts) }}">
    </div>
    <div class="form-control">
        <label for="uas">UAS</label>
        <input type="number" id="uas" name="uas"  value="{{ old('uh', $nilai->uas) }}">
    </div>

    <button type="submit" class="button-primary">Tambah</button>
</form>
@endsection

