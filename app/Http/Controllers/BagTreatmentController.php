<?php

namespace App\Http\Controllers;

use App\Models\BagTreatment;
use App\Models\CapTreatment;
use App\Models\ShoesTreatment;
use Illuminate\Http\Request;

class BagTreatmentController extends Controller
{
    // Tampilkan semua pesanan
    public function index()
    {
        $data = BagTreatment::all();
        return response()->json($data);
    }
    public function create()
    {   
        return view('bags.create');
    }


    // Tambahkan pesanan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'alamat_lengkap' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'jumlah_tas' => 'required|integer',
            'service' => 'required',
            'note' => 'nullable|string',
            'progress' => 'required|in:pending,on progress,done',
        ]);
        BagTreatment::create($validated);

        return redirect()->route('dashboard')->with('success', 'Pesanan berhasil ditambahkan!');
    }

    // Lihat detail pesanan
    public function show(BagTreatment $bagTreatment)
    {
        return response()->json($bagTreatment);
    }

    public function edit(bagTreatment $bagTreatment)
    {
        return view('bags.edit', compact('bagTreatment'));
    }

    // Update pesanan
    public function update(Request $request, BagTreatment $bagTreatment)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'alamat_lengkap' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'pickup_delivery' => 'nullable|in:pickup,delivery',
            'tanggal_jam_pickup' => 'nullable|date',
            'jumlah_tas' => 'required|integer',
            'service' => 'required|in:Deep Clean : Small,Deep Clean : Medium,Deep Clean : Large',
            'note' => 'nullable|string',
            'progress' => 'nullable|in:pending,on progress,done',
        ]);

        $bagTreatment->update($validated);

        return redirect()->route('dashboard')->with('success', 'Pesanan berhasil diperbarui!');
    }

    // Hapus pesanan
    public function destroy(BagTreatment $bagTreatment)
    {
        $bagTreatment->delete();

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
