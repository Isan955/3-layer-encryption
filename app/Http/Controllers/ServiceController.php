<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('service'); // Pastikan ada file order.blade.php di folder resources/views
    }
}
