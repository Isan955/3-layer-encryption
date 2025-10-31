<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan - Exshoestic</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        .form-wrapper {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-wrapper h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"], input[type="email"], input[type="number"], textarea, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
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

<div class="form-wrapper">
    <h2>Pemesanan untuk {{ ucfirst($category) }}</h2>

    <form action="{{ route('order.store') }}" method="POST">
    @csrf
    <input type="hidden" name="category" value="{{ $category }}">

    <input type="text" name="nama" placeholder="Nama" required>
    <input type="text" name="alamat_lengkap" placeholder="Alamat Lengkap" required>
    <input type="text" name="no_hp" placeholder="Nomor HP" required>
    <input type="email" name="email" placeholder="Email" required>

    <!-- Pilih Kategori -->
    <label for="category">Kategori:</label>
    <select name="category" id="category" required>
        <option value="shoes">Sepatu</option>
        <option value="bags">Tas</option>
        <option value="caps">Topi</option>
    </select>

    <!-- Pilih Layanan -->
    <label for="service">Layanan:</label>
    <select name="service" id="service" required>
        <!-- Service akan diubah dinamis dengan JavaScript -->
    </select>

    <!-- Jumlah Barang -->
    <input type="number" name="jumlah" placeholder="Jumlah" required>

    <!-- Pickup/Delivery -->
    <label for="pickup_delivery">Pickup/Delivery:</label>
    <select name="pickup_delivery" id="pickup_delivery">
        <option value="pickup">Pickup</option>
        <option value="delivery">Delivery</option>
    </select>


    <!-- Catatan -->
    <textarea name="note" placeholder="Catatan"></textarea>

    <button type="submit">Submit</button>
</form>

</div>

<div id="copyright">
    <div class="wrapper">
        &copy; 2024. <b>Exshoestic.</b> All Rights Reserved.
    </div>
</div>
<script src="{{ asset('js/script.js') }}"></script>
<script>
    const services = {
        shoes: ['FastClean', 'Deep Clean Medium', 'Deep Clean Hard'],
        bags: ['Deep Clean : Small', 'Deep Clean : Medium', 'Deep Clean : Large'],
        caps: ['Deep Clean : Medium', 'Deep Clean : Hard']
    };

    document.getElementById('category').addEventListener('change', function () {
        const category = this.value;
        const serviceDropdown = document.getElementById('service');

        // Kosongkan dropdown service
        serviceDropdown.innerHTML = '';

        // Tambahkan opsi layanan sesuai kategori
        services[category].forEach(service => {
            const option = document.createElement('option');
            option.value = service;
            option.textContent = service;
            serviceDropdown.appendChild(option);
        });
    });

    // Trigger event saat halaman pertama kali dimuat
    document.getElementById('category').dispatchEvent(new Event('change'));
</script>

</body>
</html>