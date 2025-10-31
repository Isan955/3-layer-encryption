<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ServicePrice;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::with('roles')->get(); // Include role jika menggunakan Spatie
        return view('admin.dashboard', compact('users'));  // Ganti dengan view yang sesuai jika diperlukan
    }
    public function edit($id)
    {
        $user = User::findOrFail($id); // Cari user berdasarkan ID
        return view('admin.edit', compact('user'));
    }

    // Menyimpan perubahan akun
    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    // Validasi data termasuk role
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $id,
        'role' => 'required|in:admin,user', // Validasi role
    ]);

    // Update data user
    $user->name = $request->name;
    $user->email = $request->email;
    $user->role = $request->role; // Update role
    $user->save();

    return redirect()->route('admin')->with('success', 'Akun berhasil diperbarui!');
}


    public function managePrices()
    {
        $shoes = ServicePrice::where('category', 'shoes')->get();
        $bags = ServicePrice::where('category', 'bags')->get();
        $caps = ServicePrice::where('category', 'caps')->get();

        return view('admin.manage_prices', compact('shoes', 'bags', 'caps'));
    }

    // Update harga service
    public function updatePrice(Request $request, $id)
    {
        $service = ServicePrice::findOrFail($id);

        $request->validate([
            'price' => 'required|numeric|min:0',
        ]);

        $service->price = $request->price;
        $service->save();

        return redirect()->route('admin.manage_prices')->with('success', 'Harga berhasil diperbarui!');
    }

    public function destroy($id)
{
    $user = User::findOrFail($id);
    
    // Menghapus user dari tabel users
    $user->delete();

    return redirect()->route('admin')->with('success', 'Akun berhasil dihapus!');
}

    
}
