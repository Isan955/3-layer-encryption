<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Akun</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style_admin.css') }}">
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h1>EXSHOESTIC</h1>
        </div>
        <a href="{{ route('admin') }}" class="active">Daftar Akun</a>
        <a href="#">Kelola Pemesanan</a>
        <a href="#">Kelola Harga</a>
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

        <!-- Form Edit Akun -->
        <section id="edit-account">
    <h2>Edit Akun</h2>

    <!-- Alert jika ada error -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.update', $user->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
        </div>
        <select name="role" id="role" hidden>
    <option value="admin" {{ $user->roles == 'admin' ? 'selected' : '' }}>Admin</option>
    <option value="user" {{ $user->roles == 'user' ? 'selected' : '' }}>User</option>
</select>
        <div class="form-group">
</div>


        <button type="submit" class="btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin') }}" class="btn-secondary">Batal</a>
    </form>
</section>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
