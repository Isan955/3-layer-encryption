<!-- resources/views/admin/service_prices/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
<h1>Edit Harga Layanan</h1>
    <form action="{{ route('service_prices.update', $price->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="service_name">Nama Layanan</label>
            <input type="text" id="service_name" name="service_name" value="{{ $price->service_name }}" disabled>
        </div>

        <div>
            <label for="price">Harga</label>
            <input type="text" id="price" name="price" value="{{ $price->price }}">
        </div>

        <button type="submit">Simpan</button>
    </form>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>

