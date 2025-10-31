<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exshoestic.</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        /***** Portfolio Styles *****/
        .portfolio-section {
            padding: 50px 0;
            background-color: #f9f9f9;
        }
        .portfolio-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .portfolio-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .portfolio-item img {
            width: 100%;
            display: block;
            transition: transform 0.3s ease;
        }
        .portfolio-item:hover img {
            transform: scale(1.1);
        }
        .portfolio-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .portfolio-item:hover .portfolio-overlay {
            opacity: 1;
        }
        .portfolio-overlay h3 {
            margin: 0;
            font-size: 1.5rem;
        }
        .portfolio-overlay p {
            margin-top: 10px;
            font-size: 1rem;
        }

        /***** CTA Banner *****/
        .cta-banner {
            padding: 40px 0;
            background: linear-gradient(135deg,rgb(130, 130, 130),rgb(138, 138, 138));
            color: #fff;
            text-align: center;
        }
        .cta-banner h2 {
            margin: 0 0 10px;
            font-size: 2rem;
        }
        .cta-banner p {
            margin-bottom: 20px;
            font-size: 1.2rem;
        }
        .cta-banner .btn-primary {
            padding: 10px 20px;
            background-color: #fff;
            color:rgb(6, 6, 6);
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .cta-banner .btn-primary:hover {
            background-color:rgb(255, 221, 0);
        }

        /***** Floating Contact Bar *****/
        .contact-bar {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            color: white;
            padding: 10px 0;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            z-index: 1000;
        }
        .contact-bar a {
            color: white;
            text-decoration: none;
            font-size: 1.5rem;
            padding: 10px;
            border-radius: 50%;
            background-color: #444;
            transition: background-color 0.3s ease;
        }
        .contact-bar a:hover {
            background-color: #fff;
            color: #333;
        }
        .contact-bar a i {
            font-size: 1.8rem;
        }

    </style>
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

<section class="hero" id="home">
    <div class="cta-banner">
        <div class="wrapper">
            <h2>Ready to Transform Your Shoes?</h2>
            <p>Contact us today and experience the Exshoestic difference.</p>
            <a href="{{ route('service') }}" class="btn-primary">Our Service </a>
        </div>
    </div>
</section>

<section class="portfolio" id="portfolio">
    <h2>Our Portfolio</h2>
    <div class="portfolio-grid">
    </div>
</section>

<!-- Floating Contact Bar -->
<div class="contact-bar">
    <a href="tel:+1234567890" title="Call Us">
        <img src="{{ asset('assets/images/phone.png') }}" alt="Call Us" style="width: 40px; height: 40px;">
    </a>
    <a href="https://instagram.com/lynn.fairss" target="_blank" title="Instagram">
        <img src="{{ asset('assets/image/bg.png') }}" alt="Instagram" style="width: 40px; height: 40px;">
    </a>
    <a href="https://facebook.com/yourpage" target="_blank" title="Facebook">
        <img src="{{ asset('assets/images/facebook.png') }}" alt="Facebook" style="width: 40px; height: 40px;">
    </a>
    <a href="https://twitter.com/yourpage" target="_blank" title="Twitter">
        <img src="{{ asset('assets/images/twitter.png') }}" alt="Twitter" style="width: 40px; height: 40px;">
    </a>
</div>

<div id="copyright">
    <div class="wrapper">
        &copy; 2024. <b>Exshoestic.</b> All Rights Reserved. Designed with <a href="#">passion</a>.
    </div>
</div>

<script src="{{ asset('js/script.js') }}"></script>

<!-- Font Awesome Icons for Social Media -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</body>
</html>
