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
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li><a href="{{ route('service') }}">Service</a></li>
                <li><a href="{{ route('portofolio') }}">Portofolio</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                @auth
                    <li><a href="{{ route('order') }}">Order</a></li>
                @endauth

                <!-- Menampilkan tombol berdasarkan status login -->
                @guest
                    <li><a href="{{ route('register') }}" class="tbl-biru">Sign Up</a></li>
                    <li><a href="{{ route('login') }}" class="tbl-biru">Sign In</a></li>
                @endguest

                @auth
                    <li><a href="{{ route('logout') }}" class="tbl-biru" 
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
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
<p><a href="" class="tbl-biru">Sepatu</a></p>
<p><a href="" class="tbl-biru">Tas</a></p>
<p><a href="" class="tbl-biru">Topi</a></p>
</div>
    <div id="copyright">
    <div class="wrapper">
            &copy; 2024. <b>Exshoestic.</b> All Rights Reserved.
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>