<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style_admin.css') }}">
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h1>EXSHOESTIC</h1>
        </div>
        <a href="{{ route('admin') }}" class="active">Daftar Akun</a>
        <a href="{{ route('admin.orders') }}">Kelola Pemesanan</a>
        <a href="{{ route('admin.manage_prices') }}">Kelola Harga</a>
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

        <!-- Admin Dashboard Section -->
        <section id="admin-dashboard">
            <h2>Welcome to the Admin Dashboard</h2>
        </section>

        <!-- Table Section -->
        <div class="table-container">
            <h3>Daftar Akun</h3>
            <table class="table-admin">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->roles->isNotEmpty())
                                    {{ $user->roles->pluck('name')->join(', ') }}
                                @else
                                    No Role
                                @endif
                            </td>
                            <td>
    <a href="{{ route('admin.edit', $user->id) }}" class="btn-action edit">Edit</a>
    <form action="{{ route('admin.destroy', $user->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-action delete" onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">
            Hapus
        </button>
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
