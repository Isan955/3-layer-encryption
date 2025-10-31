<!-- resources/views/cipher-result.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Enkripsi</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
<div class="wrapper">
    <h2>🔐 Hasil Enkripsi & Dekripsi</h2>

    <p><strong>Username Encrypted:</strong> {{ $encryptedName }}</p>
    <p><strong>Password Encrypted:</strong> {{ $encryptedPassword }}</p>
    <hr>
    <p><strong>Username Decrypted:</strong> {{ $decryptedName }}</p>
    <p><strong>Password Decrypted:</strong> {{ $decryptedPassword }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>

    <br>
    <a href="{{ route('cipher.pin') }}" class="tbl-biru">🔁 Kembali Masukkan PIN</a>
    <a href="{{ route('home') }}" class="tbl-biru">🏠 Kembali ke Beranda</a>
</div>
</body>
</html>
