<?php

namespace App\Http\Controllers;

use App\Services\LedgerIntegrityService;

class SystemHealthController extends Controller
{
    public function index()
    {
        $result = LedgerIntegrityService::verify();

        return view('admin.system-health', compact('result'));
    }
}
