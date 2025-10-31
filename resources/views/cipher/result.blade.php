<x-app-layout>
    <div class="max-w-md mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">
            🔐 Hasil Enkripsi & Dekripsi
        </h2>

        <div class="bg-gray-50 p-4 rounded mb-4">
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Username (Encrypted):</strong> {{ $encryptedName }}</p>
            <p><strong>Password (Encrypted):</strong> {{ $encryptedPassword }}</p>
            <hr class="my-3">
            <p><strong>Username (Decrypted):</strong> {{ $decryptedName }}</p>
            <p><strong>Password (Decrypted):</strong> {{ $decryptedPassword }}</p>
        </div>

        <a href="{{ route('cipher.index') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded w-full block text-center">
            ⬅️ Kembali
        </a>
    </div>
</x-app-layout>
