<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exshoestic.</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>
<body>
<nav>
    <div class="wrapper">
        <div class="logo"><a href=''>Exshoestic.</a></div>
        <div class="menu">
            <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('service') }}">Service</a></li>
                <li><a href="{{ route('portofolio') }}">Portofolio</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                @auth
                    <li><a href="{{ route('order.index') }}">Order</a></li>
                @endauth

            @guest
        <li><a href="{{ route('register') }}" class="tbl-biru">Sign Up</a></li>
        <li><a href="{{ route('login') }}" class="tbl-biru">Sign In</a></li>
    @endguest

    @auth
        <!-- Hanya tampilkan link Admin jika user sudah login dan memiliki role admin -->
        @if(auth()->user()->hasRole('admin'))
            <li><a href="{{ route('admin') }}" class="tbl-biru">Admin</a></li>
        @endif

        <li><a href="{{ route('logout') }}" class="tbl-biru" 
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a></li>

        <li><a href="{{ route('cipher.index') }}" class="tbl-biru">
            Lihat Hasil Enkripsi
        </a></li>

        <!-- Form Logout -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endauth
            </ul>
        </div>
    </div>
</nav>

    <div class="wrapper">
        <!-- untuk home -->
        <section id="home">
            <img src="{{ asset('assets/image/bg.png') }}"/>
            <div class="kolom">
            <div class="kolom">
                <p class="deskripsi">Selamat datang di</p>
                <h2>Exshoestic</h2>
                <p>Layanan cuci sepatu profesional yang memberikan solusi terbaik untuk merawat sepatu Anda.</p>
            </div>
            
        </section>

        <!-- <a href="{{ route('cipher.index') }}" class="btn btn-primary btn-lg">
            🔐 Lihat Hasil Enkripsi
        </a> -->



        <!-- untuk courses -->
        
        <div id="copyright">
        <div class="wrapper">
            &copy; 2024. <b>Exshoestic.</b> All Rights Reserved.
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>