<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        // $data = [
        //     'title' => 'Dashboard',
        //     'breadcrumb1' => 'Home',
        //     'breadcrumb2' => 'Dashboard'
        // ];
        return view('index');
    }
}
