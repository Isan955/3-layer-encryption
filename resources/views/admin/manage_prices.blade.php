<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Harga</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style_admin.css') }}">
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h1>EXSHOESTIC</h1>
        </div>
        <a href="{{ route('admin') }}">Daftar Akun</a>
        <a href="{{ route('admin.orders') }}">Kelola Pemesanan</a>
        <a href="{{ route('admin.manage_prices') }}" class="active">Kelola Harga</a>
    </div>

    <!-- Content Section -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <div class="wrapper">
                <div class="menu">
                    <ul>
                        <li><a href="{{ route('home') }}" class="active">Home</a></li>
                        <li>
                            <a href="{{ route('logout') }}" class="active" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </nav>

        <!-- Kelola Harga Section -->
        <section id="manage-prices">
            <h2>Kelola Harga</h2>

            <!-- Tabel Shoes -->
            <h3>Service Shoes</h3>
            <table class="table-admin">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Service</th>
                        <th>Harga (Rp)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shoes as $index => $service)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $service->service_name }}</td>
                            <td>{{ $service->price }}</td>
                            <td>
                                <form action="{{ route('admin.update_price', $service->id) }}" method="POST">
                                    @csrf
                                    <input type="number" name="price" value="{{ $service->price }}" required>
                                    <button type="submit" class="btn-primary">Update</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Tabel Bags -->
            <h3>Service Bags</h3>
            <table class="table-admin">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Service</th>
                        <th>Harga (Rp)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bags as $index => $service)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $service->service_name }}</td>
                            <td>{{ $service->price }}</td>
                            <td>
                                <form action="{{ route('admin.update_price', $service->id) }}" method="POST">
                                    @csrf
                                    <input type="number" name="price" value="{{ $service->price }}" required>
                                    <button type="submit" class="btn-primary">Update</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Tabel Caps -->
            <h3>Service Caps</h3>
            <table class="table-admin">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Service</th>
                        <th>Harga (Rp)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($caps as $index => $service)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $service->service_name }}</td>
                            <td>{{ $service->price }}</td>
                            <td>
                                <form action="{{ route('admin.update_price', $service->id) }}" method="POST">
                                    @csrf
                                    <input type="number" name="price" value="{{ $service->price }}" required>
                                    <button type="submit" class="btn-primary">Update</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
