@extends('layouts.main')

@section('content')
<h1 style="text-align: center">Selamat Datang,{{ session('type_user') }} ,{{ $nama }}</h1>
@endsection
