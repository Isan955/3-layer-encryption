<x-app-layout>
    <div class="max-w-md mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">
            Masukkan PIN untuk Melihat Hasil Enkripsi
        </h2>

        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('cipher.result') }}">
            @csrf
            <div class="mb-4">
                <label for="pin" class="block font-semibold mb-1">PIN Anda</label>
                <input id="pin"
                       name="pin"
                       type="password"
                       maxlength="12"
                       minlength="6"
                       class="w-full border rounded p-2"
                       required>
            </div>

            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded w-full">
                🔐 Lihat Hasil
            </button>
            
        </form>
    </div>
</x-app-layout>
