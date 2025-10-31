<?php

namespace App\Http\Controllers;

use App\Models\BagTreatment;
use App\Models\CapTreatment;
use App\Models\ShoesTreatment;
use Illuminate\Http\Request;

class ShoesTreatmentController extends Controller
{
    // Tampilkan semua pesanan
    public function index()
    {
        $data = ShoesTreatment::all();
        return response()->json($data);
    }

    public function create()
    {   
        return view('shoes.create');
    }


    // Tambahkan pesanan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'alamat_lengkap' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'pickup_delivery' => 'nullable|in:pickup,delivery',
            'tanggal_jam_pickup' => 'nullable|date',
            'jumlah_sepatu' => 'required|integer',
            'service' => 'required',
            'note' => 'nullable|string',
            'progress' => 'nullable|in:pending,on progress,done'
        ]);

        ShoesTreatment::create($validated);

        return redirect()->route('dashboard')->with('success', 'Pesanan berhasil ditambahkan!');
    }

    // Lihat detail pesanan
    public function show(ShoesTreatment $shoesTreatment)
    {
        return response()->json($shoesTreatment);
    }

    public function edit(ShoesTreatment $shoesTreatment)
    {
        return view('shoes.edit', compact('shoesTreatment'));
    }

    // Update pesanan
    public function update(Request $request, ShoesTreatment $shoesTreatment)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'alamat_lengkap' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'pickup_delivery' => 'nullable|in:pickup,delivery',
            'tanggal_jam_pickup' => 'nullable|date',
            'jumlah_sepatu' => 'required|integer',
            'service' => 'required',
            'note' => 'nullable|string',
            'progress' => 'nullable|in:pending,on progress,done'
        ]);

        $shoesTreatment->update($validated);

        return redirect()->route('dashboard')->with('success', 'Pesanan berhasil diperbarui!');
    }

    // Hapus pesanan
    public function destroy(ShoesTreatment $shoesTreatment)
    {
        $shoesTreatment->delete();

        return redirect()->route('dashboard')->with('success', 'Pesanan berhasil dihapus!');
    }

    public function dashboard()
    {
    // Ambil semua data dari tabel terkait
        $shoesTreatments = ShoesTreatment::all();
        $bagTreatments = BagTreatment::all();
        $capTreatments = CapTreatment::all();

    // Kirimkan data ke view menggunakan compact
        return view('dashboard', compact('shoesTreatments', 'bagTreatments', 'capTreatments'));
    }

}
