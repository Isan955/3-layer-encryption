<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServicePrice;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;



class OrderController extends Controller
{
    /**
     * Tampilkan daftar pesanan pengguna.
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get(); // Ambil pesanan berdasarkan ID user
        return view('order.index', compact('orders'));

        if (Auth::check()) {
            $orders = Order::where('user_id', Auth::id())->get();
            return view('order.index', compact('order'));
        } else {
            // Jika pengguna belum login, tampilkan halaman 403
            abort(403, 'Unauthorized access');
        }

        $orders = Order::all(); // Ambil semua order
        return view('order');
    }

    

    /**
     * Tampilkan halaman form pemesanan.
     */
    public function create()
    {
        // Ambil harga layanan untuk setiap kategori
        $shoesPrices = ServicePrice::where('category', 'shoes')->get();
        $bagsPrices = ServicePrice::where('category', 'bags')->get();
        $capsPrices = ServicePrice::where('category', 'caps')->get();

        // Kirim data harga ke view
        return view('order.create', compact('shoesPrices', 'bagsPrices', 'capsPrices'));
    }

    /**
     * Simpan data pesanan baru.
     */
    public function store(Request $request)
    {
        // Validasi data form
        $request->validate([
            'nama' => 'required|string',
            'alamat_lengkap' => 'required|string',
            'no_hp' => 'required|string',
            'email' => 'required|email',
            'category' => 'required|string',
            'service' => 'required|string',
            'jumlah' => 'required|integer',
            'pickup_delivery' => 'nullable|string',
            'note' => 'nullable|string',
        ]);

        // Simpan data ke dalam database
        Order::create([
            'user_id' => Auth::id(), // Hubungkan pesanan dengan pengguna yang sedang login
            'nama' => $request->nama,
            'alamat_lengkap' => $request->alamat_lengkap,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'category' => $request->category,
            'service' => $request->service,
            'jumlah' => $request->jumlah,
            'pickup_delivery' => $request->pickup_delivery,
            'note' => $request->note,
            'status' => $request->progress,
        ]);

        // Redirect atau beri feedback sukses
        return redirect()->route('order.index')->with('success', 'Pemesanan berhasil dilakukan!');
    }

    /**
     * Tampilkan form pemesanan untuk kategori tertentu.
     */
    public function showOrderForm($category)
    {
        // Validasi kategori yang dipilih
        $validCategories = ['shoes', 'bags', 'caps'];
        if (!in_array($category, $validCategories)) {
            abort(404); // Jika kategori tidak valid, tampilkan halaman 404
        }

        // Ambil layanan berdasarkan kategori
        $services = ServicePrice::where('category', $category)->get();

        // Kirim kategori dan layanan ke tampilan
        return view('order.form', compact('category', 'services'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
        ]);

        $order = Order::findOrFail($id);
        $order->update($request->all());

        return redirect()->route('order.index')->with('success', 'Data pemesanan berhasil diperbarui!');
    }

    public function updateProgress(Request $request, $id)
{
    $request->validate([
        'progress' => 'required|in:pending,on_progress,done', // Validasi status progress
    ]);

    // Cari order berdasarkan ID
    $order = Order::findOrFail($id);

    // Update progress
    $order->progress = $request->progress;
    $order->save();

    // Redirect dengan pesan sukses
    return redirect()->route('admin.orders')->with('success', 'Progress pesanan berhasil diperbarui!');
}


 


}
