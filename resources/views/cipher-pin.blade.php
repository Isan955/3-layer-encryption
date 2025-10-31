<!-- resources/views/cipher-pin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masukkan PIN - Exshoestic</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
<div class="wrapper">
    <h2>Masukkan PIN untuk Melihat Hasil Enkripsi</h2>

    @if (session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif

    <form action="{{ route('cipher.result') }}" method="POST">
        @csrf
        <input type="password" name="pin" placeholder="Masukkan PIN" required>
        <button type="submit" class="tbl-biru">Lihat Hasil</button>
    </form>

    <p><a href="{{ route('home') }}">← Kembali ke Beranda</a></p>
</div>
</body>
</html>
    