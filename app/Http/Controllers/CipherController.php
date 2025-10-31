<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\CipherHelper;

class CipherController extends Controller
{
    public function index()
    {
        return view('cipher.index');
    }

    public function result(Request $request)
    {
        $request->validate([
            'pin' => 'required|digits_between:6,12',
        ]);

        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        if ($request->pin !== $user->pin) {
            return back()->with('error', 'PIN salah!');
        }

        $key = $request->pin;

        $encryptedName = $user->username_encrypted;
        $encryptedPassword = $user->password_encrypted;

        $decryptedName = CipherHelper::tripleDecrypt($encryptedName, $key);
        $decryptedPassword = CipherHelper::tripleDecrypt($encryptedPassword, $key);

        $email = $user->email;

        return view('cipher.result', compact(
            'encryptedName',
            'encryptedPassword',
            'decryptedName',
            'decryptedPassword',
            'email'
        ));
    }
}
