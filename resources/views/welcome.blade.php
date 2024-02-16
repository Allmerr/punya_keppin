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
        <a href="#" class="active">Menu</a>
    </div>
    <div class="kiri-atas">
        <fieldset>
            <center>
                <button class="button-primary" onclick="tampilkan_login_siswa()">Siswa</button>
                <button class="button-warning" onclick="tampilkan_login_guru()">Guru</button>
                <button class="button-danger" onclick="tampilkan_login_admin()">Admin</button>
                <hr>
                Pilih Login Sesuai Posisi Anda
                <hr>
            </center>
            <div class="container-login" id="login_siswa">
                <center>
                    <b>Login Siswa</b>
                </center>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <input type="hidden" name="type_user" value="siswa">
                    <div class="form-control">
                        <label for="nis">NIS</label>
                        <input type="text" id="nis" name="nis">
                    </div>
                    <div class="form-control">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                    </div>
                    <button class="button-submit" type="submit">Login</button>
                </form>
            </div>
            <div class="container-login" id="login_guru" style="display: none;">
                <center>
                    <b>Login Guru</b>
                </center>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <input type="hidden" name="type_user" value="guru">
                    <div class="form-control">
                        <label for="nip">NIP</label>
                        <input type="text" id="nip" name="nip">
                    </div>
                    <div class="form-control">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                    </div>
                    <button class="button-submit" type="submit">Login</button>
                </form>
            </div>
            <div class="container-login" id="login_admin" style="display: none;">
                <center>
                    <b>Login Admin</b>
                </center>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <input type="hidden" name="type_user" value="admin">
                    <div class="form-control">
                        <label for="kode_admin">Kode Admin</label>
                        <input type="text" id="kode_admin" name="kode_admin">
                    </div>
                    <div class="form-control">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                    </div>
                    <button class="button-submit" type="submit">Login</button>
                </form>
            </div>
        </fieldset>
    </div>
    <div class="kanan">
        <h1 style="text-align: center;">Welcome to penilaian siswa <br> SMKN 1 Cibinong</h1>
    </div>
    <div class="kiri-bawah">
        <center>
            <b>
                <p class="mar">Galleri</p>
                <div class="gallery">
                    <img src="{{ asset('img/g2.jpg') }}" alt="">
                    <div class="deskripsi">SMK BISA</div>
                </div>
            </b>
        </center>
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

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
