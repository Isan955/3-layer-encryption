<?php

// App\Http\Controllers\ServicePriceController.php
namespace App\Http\Controllers;

use App\Models\ServicePrice;
use Illuminate\Http\Request;

class ServicePriceController extends Controller
{
    // Menampilkan harga berdasarkan kategori
    public function index($category)
    {
        // Ambil harga berdasarkan kategori
        $prices = ServicePrice::where('category', $category)->get();

        // Kirim data harga dan kategori ke view
        return view('admin.service_prices.index', compact('prices', 'category'));
    }

    // Menampilkan halaman edit harga
    public function edit($id)
    {
        $price = ServicePrice::findOrFail($id);
        return view('admin.service_prices.edit', compact('price'));
    }

    // Mengupdate harga layanan
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'price' => 'required|numeric',
        ]);

        // Cari harga yang ingin diupdate
        $price = ServicePrice::findOrFail($id);
        $price->update($request->all());

        // Redirect ke halaman daftar harga kategori
        return redirect()->route('service_prices.index', ['category' => $price->category])
            ->with('success', 'Harga berhasil diperbarui.');
    }
}


