<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exshoestic - Service</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style_service.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<nav>
    <div class="wrapper">
        <div class="logo"><a href='#'>Exshoestic.</a></div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li><a href="{{ route('service') }}">Service</a></li>
                <li><a href="{{ route('portofolio') }}">Portofolio</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                @auth
                    <li><a href="{{ route('order') }}">Order</a></li>
                @endauth
                @guest
                    <li><a href="{{ route('register') }}" class="tbl-biru">Sign Up</a></li>
                    <li><a href="{{ route('login') }}" class="tbl-biru">Sign In</a></li>
                @endguest
                @auth
                    <li><a href="{{ route('logout') }}" class="tbl-biru" 
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="wrapper">
    <h2 class="tengah">Our Service</h2>
    <h3 class="tengah">Shoes Cleaning</h3>
    <div class="service-section">
        <div class="service-cards">
            <div class="service-card">
                <img src="image1.png" alt="Fast Clean">
                <h3 class="tengah">FAST CLEAN</h3>
                <p class="deskripsi">Treatment ...</p>
                <a href="#" class="tbl-biru">Keterangan Layanan</a>
            </div>
            <div class="service-card">
                <img src="image2.png" alt="Deep Clean">
                <h3 class="tengah">DEEP CLEAN</h3>
                <p class="deskripsi">Treatment ...</p>
                <a href="#" class="tbl-biru">Keterangan Layanan</a>
            </div>
            <div class="service-card">
                <img src="image1.png" alt="Fast Clean">
                <h3 class="tengah">FAST CLEAN</h3>
                <p class="deskripsi">Treatment ...</p>
                <a href="#" class="tbl-biru">Keterangan Layanan</a>
            </div>
            <div class="service-card">
                <img src="image2.png" alt="Deep Clean">
                <h3 class="tengah">DEEP CLEAN</h3>
                <p class="deskripsi">Treatment ...</p>
                <a href="#" class="tbl-biru">Keterangan Layanan</a>
            </div>
            <div class="service-card">
                <img src="image1.png" alt="Fast Clean">
                <h3 class="tengah">FAST CLEAN</h3>
                <p class="deskripsi">Treatment ...</p>
                <a href="#" class="tbl-biru">Keterangan Layanan</a>
            </div>
            <div class="service-card">
                <img src="image2.png" alt="Deep Clean">
                <h3 class="tengah">DEEP CLEAN</h3>
                <p class="deskripsi">Treatment ...</p>
                <a href="#" class="tbl-biru">Keterangan Layanan</a>
            </div>
            <div class="service-card">
                <img src="image1.png" alt="Fast Clean">
                <h3 class="tengah">FAST CLEAN</h3>
                <p class="deskripsi">Treatment ...</p>
                <a href="#" class="tbl-biru">Keterangan Layanan</a>
            </div>
            <div class="service-card">
                <img src="image2.png" alt="Deep Clean">
                <h3 class="tengah">DEEP CLEAN</h3>
                <p class="deskripsi">Treatment ...</p>
                <a href="#" class="tbl-biru">Keterangan Layanan</a>
            </div>
        </div>
    </div>
</div>
<div class="wrapper">
    <h3 class="tengah">Bag Cleaning</h3>
    <div class="service-section">
        <div class="service-cards">
            <div class="service-card">
                <img src="image1.png" alt="Fast Clean">
                <h3 class="tengah">FAST CLEAN</h3>
                <p class="deskripsi">Treatment ...</p>
                <a href="#" class="tbl-biru">Keterangan Layanan</a>
            </div>
            <div class="service-card">
                <img src="image2.png" alt="Deep Clean">
                <h3 class="tengah">DEEP CLEAN</h3>
                <p class="deskripsi">Treatment ...</p>
                <a href="#" class="tbl-biru">Keterangan Layanan</a>
            </div>
            <div class="service-card">
                <img src="image1.png" alt="Fast Clean">
                <h3 class="tengah">FAST CLEAN</h3>
                <p class="deskripsi">Treatment ...</p>
                <a href="#" class="tbl-biru">Keterangan Layanan</a>
            </div>
        </div>
    </div>
</div>

<div class="wrapper">
    <h3 class="tengah">Cap Cleaning</h3>
    <div class="service-section">
        <div class="service-cards">
            <div class="service-card">
                <img src="image1.png" alt="Fast Clean">
                <h3 class="tengah">FAST CLEAN</h3>
                <p class="deskripsi">Treatment ...</p>
                <a href="#" class="tbl-biru">Keterangan Layanan</a>
            </div>
            <div class="service-card">
                <img src="image2.png" alt="Deep Clean">
                <h3 class="tengah">DEEP CLEAN</h3>
                <p class="deskripsi">Treatment ...</p>
                <a href="#" class="tbl-biru">Keterangan Layanan</a>
            </div>
            <div class="service-card">
                <img src="image1.png" alt="Fast Clean">
                <h3 class="tengah">FAST CLEAN</h3>
                <p class="deskripsi">Treatment ...</p>
                <a href="#" class="tbl-biru">Keterangan Layanan</a>
            </div>
        </div>
    </div>
</div>

<div id="copyright">
    <div class="wrapper">
        &copy; 2024. <b>Exshoestic.</b> All Rights Reserved.
    </div>
</div>

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
