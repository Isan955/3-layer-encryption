<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan - Admin</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style_admin.css') }}">
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-header">
            <h1>EXSHOESTIC</h1>
        </div>
        <a href="{{ route('admin.orders') }}" class="active">Kelola Pemesanan</a>
        <a href="{{ route('admin.manage_prices') }}">Kelola Harga</a>
    </div>

    <!-- Content Section -->
    <div class="content">
        <nav>
            <div class="wrapper">
                <div class="menu">
                    <ul>
                        <li><a href="{{ route('home') }}" class="active">Home</a></li>
                        <li><a href="{{ route('logout') }}" class="active" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <section id="admin-dashboard">
            <h2>Edit Pesanan</h2>
        </section>

        <form action="{{ route('admin.updateProgress', $order->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Method PUT untuk update -->
    
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="{{ $order->nama }}" required>
    
            <label for="alamat_lengkap">Alamat Lengkap:</label>
            <textarea id="alamat_lengkap" name="alamat_lengkap" required>{{ $order->alamat_lengkap }}</textarea>
    
            <label for="no_hp">Nomor HP:</label>
            <input type="text" id="no_hp" name="no_hp" value="{{ $order->no_hp }}" required>
    
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $order->email }}" required>
    
            <label for="pickup_delivery">Metode Pengiriman:</label>
            <select id="pickup_delivery" name="pickup_delivery">
                <option value="pickup" {{ $order->pickup_delivery == 'pickup' ? 'selected' : '' }}>Pickup</option>
                <option value="delivery" {{ $order->pickup_delivery == 'delivery' ? 'selected' : '' }}>Delivery</option>
            </select>
    
            <label for="jumlah">Jumlah:</label>
            <input type="number" id="jumlah" name="jumlah" value="{{ $order->jumlah }}" required>
    
            <label for="category">Kategori:</label>
            <select id="category" name="category">
                <option value="shoes" {{ $order->category == 'shoes' ? 'selected' : '' }}>Shoes</option>
                <option value="bags" {{ $order->category == 'bags' ? 'selected' : '' }}>Bags</option>
                <option value="caps" {{ $order->category == 'caps' ? 'selected' : '' }}>Caps</option>
            </select>
    
            <label for="service">Layanan:</label>
            <input type="text" id="service" name="service" value="{{ $order->service }}" required>
    
            <label for="note">Catatan Tambahan:</label>
            <textarea id="note" name="note">{{ $order->note }}</textarea>
    
            <label for="progress">Progress:</label>
            <select id="progress" name="progress">
                <option value="pending" {{ $order->progress == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="on progress" hidden {{ $order->progress == 'on progress' ? 'selected' : '' }}></option>
                <option value="done" {{ $order->progress == 'done' ? 'selected' : '' }}>Done</option>
            </select>
    
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
