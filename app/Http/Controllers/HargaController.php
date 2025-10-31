<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HargaController extends Controller
{
    public function index()
    {
        return view('admin.harga'); // Pastikan ada file order.blade.php di folder resources/views
    }
}