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

                <!-- Menampilkan tombol berdasarkan status login -->
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
<div class="wrapper">
    <!-- Tambahkan bagian dengan gambar dan tombol -->
    <div class="order-section">
        <!-- Order Shoes -->
        <div class="order-item">
            <img src="{{ asset('assets/image/bg1.jpeg') }}" alt="Shoes" class="order-image">
            <a href="{{ route('order.form', ['category' => 'shoes']) }}" class="tbl-oren">Order Shoes</a>
        </div>
        
        <!-- Order Bags -->
        <div class="order-item">
            <img src="{{ asset('assets/image/bg1.jpeg') }}" alt="Bags" class="order-image">
            <a href="{{ route('order.form', ['category' => 'bags']) }}" class="tbl-oren">Order Bags</a>
        </div>
        
        <!-- Order Caps -->
        <div class="order-item">
            <img src="{{ asset('assets/image/bg1.jpeg') }}" alt="Caps" class="order-image">
            <a href="{{ route('order.form', ['category' => 'caps']) }}" class="tbl-oren">Order Caps</a>
        </div>
    </div>
</div>

<div class="table-wrapper">
    <h2>Daftar Pesanan Anda</h2>
    @if($orders->isEmpty())
        <p>Belum ada pesanan yang Anda buat.</p>
    @else
        <table class="styled-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Layanan</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->nama ?? '-' }}</td>
                        <td>{{ ucfirst($order->category ?? '-') }}</td>
                        <td>{{ $order->service ?? '-' }}</td>
                        <td>{{ $order->jumlah ?? '-' }}</td>
                        <td>{{ $order->progress }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>


<style>
    .order-section {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
    }

    .order-item {
        text-align: center;
    }

    .order-image {
        max-width: 150px;
        height: auto;
        display: block;
        margin: 0 auto 10px;
    }

    .tbl-oren {
        display: inline-block;
        background-color: #f0ad4e; /* Warna tombol */
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
    }

    .tbl-oren:hover {
        background-color: #d9940b; /* Warna tombol saat hover */
    }
    .table-wrapper {
    margin: 20px auto;
    padding: 10px;
    max-width: 100%;
    overflow-x: auto;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background: #fff;
}

.styled-table {
    width: 100%;
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: 'Arial', sans-serif;
    color: #333;
    text-align: left;
}

.styled-table thead tr {
    background-color:rgb(121, 121, 121);
    color: #ffffff;
    text-align: left;
    font-weight: bold;
}

.styled-table th, .styled-table td {
    padding: 12px 15px;
    border: 1px solid #ddd;
}

.styled-table tbody tr {
    border-bottom: 1px solid #ddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid rgb(121, 121, 121);
}

.styled-table tbody tr:hover {
    background-color: #f1f1f1;
}

</style>
    <div id="copyright">
    <div class="wrapper">
            &copy; 2024. <b>Exshoestic.</b> All Rights Reserved.
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>