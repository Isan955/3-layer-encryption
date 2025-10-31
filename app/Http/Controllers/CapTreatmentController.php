<?php

namespace App\Http\Controllers;

use App\Models\BagTreatment;
use App\Models\CapTreatment;
use App\Models\ShoesTreatment;
use Illuminate\Http\Request;

class CapTreatmentController extends Controller
{
    // Tampilkan semua pesanan
    public function index()
    {
        $data = CapTreatment::all();
        return response()->json($data);
    }

    public function create()
    {   
        return view('caps.create');
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
        'jumlah_topi' => 'required|integer',
        'service' => 'required',
        'note' => 'nullable|string',
        'progress' => 'nullable|in:pending,on progress,done',
    ]);

    CapTreatment::create($validated);

    return redirect()->route('dashboard')->with('success', 'Data berhasil ditambahkan!');
}

    // Lihat detail pesanan
    public function show(CapTreatment $capTreatment)
    {
        return response()->json($capTreatment);
    }

    public function edit(CapTreatment $cap)
    {
        return view('caps.edit', compact('cap'));
    }

    // Update pesanan
    public function update(Request $request, CapTreatment $cap)
{
    $validated = $request->validate([
        'nama' => 'required',
        'alamat_lengkap' => 'required',
        'no_hp' => 'required',
        'email' => 'required|email',
        'pickup_delivery' => 'nullable|in:pickup,delivery',
        'tanggal_jam_pickup' => 'nullable|date',
        'jumlah_topi' => 'required|integer',
        'service' => 'required',
        'note' => 'nullable|string',
        'progress' => 'nullable|in:pending,on progress,done',
    ]);

    $cap->update($validated);

    return redirect()->route('dashboard')->with('success', 'Data berhasil diperbarui!');
}

public function destroy(CapTreatment $cap)
{
    $cap->delete();

    return redirect()->route('dashboard')->with('success', 'Data Cap Treatment berhasil dihapus!');
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
