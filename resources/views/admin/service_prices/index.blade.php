<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Harga Layanan - {{ ucfirst($category) }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style_admin.css') }}">

</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href=''>Exshoestic.</a></div>
            <div class="menu">
                <ul>
                    <li><a href="{{ route('home') }}" class="tbl-biru">Home</a></li>
                    <li><a href="{{ route('logout') }}" class="tbl-biru" 
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <section id="service-prices">
            <h2>Kelola Harga Layanan - {{ ucfirst($category) }}</h2>

            <!-- Daftar Harga Layanan Berdasarkan Kategori -->
            <div class="service-list">
                @foreach($prices as $price)
                    <div class="service-item">
                        <p>{{ $price->service_name }}: ${{ $price->price }}</p>
                        <a href="{{ route('service_prices.edit', $price->id) }}" class="tbl-biru">Edit Harga</a>
                    </div>
                @endforeach
            </div>
        </section>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
