<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio - Exshoestic</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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

        <!-- Form Logout -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endauth
            </ul>
        </div>
    </div>
</nav>

<section id="portfolio" class="portfolio-section">
    <div class="wrapper">
        <h1>Our Portfolio</h1>
        <p>Discover the stunning transformations we deliver to your favorite shoes. From sneakers to leather boots, we bring life back to every pair.</p>

        <div class="portfolio-gallery">
            <div class="portfolio-item">
                <img src="{{ asset('assets/image/bg1.jpeg') }}" alt="Before and After Cleaning">
                <div class="portfolio-overlay">
                    <h3>Deep Cleaning</h3>
                    <p>From dirty sneakers to spotless results.</p>
                </div>
            </div>
            <div class="portfolio-item">
            <img src="{{ asset('assets/image/bg2.jpeg') }}"  alt="Before and After Restoration">
                <div class="portfolio-overlay">
                    <h3>Leather Restoration</h3>
                    <p>Rejuvenate your leather shoes to their former glory.</p>
                </div>
            </div>
            <div class="portfolio-item">
                <img src="{{ asset('assets/image/bg3.jpeg') }}" alt="Before and After Polishing">
                <div class="portfolio-overlay">
                    <h3>Polishing</h3>
                    <p>A brilliant shine for your beloved footwear.</p>
                </div>
            </div>
            <div class="portfolio-item">
                <img src="{{ asset('assets/image/bg4.jpeg') }}" alt="Before and After Waterproofing">
                <div class="portfolio-overlay">
                    <h3>Waterproofing</h3>
                    <p>Protect your shoes against the elements.</p>
                </div>
            </div>
        </div>

        <div class="additional-content">
            <h2>Why Choose Exshoestic?</h2>
            <p>At Exshoestic, we specialize in giving your shoes the premium care they deserve. Our portfolio showcases the expertise and attention to detail that sets us apart. Here’s what makes us unique:</p>
            <ul>
                <li><strong>Professional Cleaning:</strong> We use advanced techniques to remove dirt, stains, and odors without damaging your shoes.</li>
                <li><strong>Color Restoration:</strong> Bring back the vibrant colors of your footwear with our expert restoration services.</li>
                <li><strong>Material Expertise:</strong> Whether it’s suede, leather, or fabric, we know how to treat each material with care.</li>
                <li><strong>Waterproof Coating:</strong> Keep your shoes protected from water and stains with our durable waterproofing solutions.</li>
            </ul>
            <p>We take pride in our ability to transform old, worn-out shoes into fresh, like-new condition. Trust us to deliver outstanding results every time.</p>
        </div>
    </div>
</section>

<div class="cta-banner">
    <div class="wrapper">
        <h2>Ready to Transform Your Shoes?</h2>
        <p>Contact us today and experience the Exshoestic difference.</p>
        <a href="{{ route('contact') }}" class="btn-primary">Get in Touch</a>
    </div>
</div>

<div id="copyright">
    <div class="wrapper">
        &copy; 2024. <b>Exshoestic.</b> All Rights Reserved.
    </div>
</div>

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
    background: linear-gradient(135deg,rgb(130, 130, 130),rgb(53, 53, 53));
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
</style>

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
