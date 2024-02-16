<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Penilaian Siswa</title>
</head>
<body>
@include('partials.header')
<div class="menu">
    @if (session('type_user') == 'admin')
    <a href="{{ route('home') }}" class="{{ Request::is('home') ? 'active' : '' }}">Home</a>
    <a href="{{ route('mapel.index') }}" class="{{ Request::is('mapel.index') ? 'active' : '' }}">Mapel</a>
    <a href="{{ route('kelas.index') }}" class="{{ Request::is('kelas.index') ? 'active' : '' }}">Kelas</a>
    <a href="{{ route('siswa.index') }}" class="{{ Request::is('siswa.index') ? 'active' : '' }}">Siswa</a>
    <a href="{{ route('guru.index') }}" class="{{ Request::is('guru.index') ? 'active' : '' }}">Guru</a>
    <a href="{{ route('mengajar.index') }}" class="{{ Request::is('mengajar.index') ? 'active' : '' }}">Mengajar</a>
    @else
    <a href="{{ route('nilai.index') }}" class="{{ Request::is('nilai.index') ? 'active' : '' }}">Nilai</a>
    @endif

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <a href="">
            <button type="submit">Logout</button>
        </a>
    </form>
</div>
<div class="content">
    @yield('content')
</div>
@include('partials.footer')



@if($errors->any())
@foreach ($errors->all() as $error)
<script>
    var error = '{{ $error }}'
    alert(error)
</script>
@endforeach
@endif

@if(session()->has('success'))
<script>
    var success = '{{ session('success') }}'
    alert(success)
</script>
@endif

@if(session()->has('failed'))
<script>
    var failed = '{{ session('failed')  }}'
    alert(failed)
</script>
@endif

</body>
</html>
