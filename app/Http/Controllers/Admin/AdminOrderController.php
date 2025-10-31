<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        // Ambil semua data pesanan
        $orders = Order::all();
        // Tampilkan view admin orders dengan data pesanan
        return view('admin.orders.index', compact('orders'));
    }

    public function edit($id)
    {
        // Ambil pesanan berdasarkan ID
        $order = Order::findOrFail($id);
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        // Validasi dan update data pesanan
        $validated = $request->validate([
            'status' => 'required|string',
            // Validasi lainnya sesuai kebutuhan
        ]);

        $order = Order::findOrFail($id);
        $order->update($validated);

        return redirect()->route('admin.orders')->with('success', 'Pesanan berhasil diperbarui');
    }
    public function updateProgress(Request $request, $id)
{
    $validated = $request->validate([
        'nama' => 'required|string',
        'alamat_lengkap' => 'required|string',
        'no_hp' => 'required|string',
        'email' => 'required|email',
        'pickup_delivery' => 'required|string',
        'jumlah' => 'required|integer',
        'category' => 'required|string',
        'service' => 'required|string',
        'note' => 'nullable|string',
        'progress' => 'required|string|in:pending,on progress,done', // Pastikan ada validasi untuk progress
    ]);

    // Cari order berdasarkan ID
    $order = Order::findOrFail($id);

    // Update progress
    $order->update($validated);
    $order->progress = $request->progress;
    $order->save();

    // Redirect dengan pesan sukses
    return redirect()->route('admin.orders')->with('success', 'Progress pesanan berhasil diperbarui!');
}



    public function destroy($id)
    {
        // Hapus pesanan berdasarkan ID
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders')->with('success', 'Pesanan berhasil dihapus');
    }
    
}

