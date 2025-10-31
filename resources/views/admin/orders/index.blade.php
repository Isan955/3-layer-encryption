<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pemesanan</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style_admin.css') }}">
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h1>EXSHOESTIC</h1>
        </div>
        <a href="{{ route('admin') }}">Daftar Akun</a>
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
            <h2>Kelola Pemesanan</h2>
        </section>

        <!-- Tabel Pemesanan -->
        <div class="table-container">
            <h3>Daftar Pesanan</h3>
            <table class="table-admin">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat Lengkap</th>
                        <th>Nomor HP</th>
                        <th>Email</th>
                        <th>Metode Pengiriman</th>
                        <th>Jumlah</th>
                        <th>Kategori</th>
                        <th>Layanan</th>
                        <th>Catatan</th>
                        <th>Progress</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $index => $order)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $order->nama }}</td>
                            <td>{{ $order->alamat_lengkap }}</td>
                            <td>{{ $order->no_hp }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->pickup_delivery }}</td>
                            <td>{{ $order->jumlah }}</td>
                            <td>{{ $order->category }}</td>
                            <td>{{ $order->service }}</td>
                            <td>{{ $order->note }}</td>
                            <td>{{ $order->progress }}</td>
                            <td>
                                <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn-action edit">Edit</a>
                                <!-- Form Delete -->
                                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action delete" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
