<?php

namespace App\Http\Controllers\Writer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'breadcrumb1' => 'Home',
            'breadcrumb2' => 'Dashboard'
        ];

        return view('writer.dashboard', $data);
    }
}
