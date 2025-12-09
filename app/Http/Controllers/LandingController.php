<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Menampilkan halaman landing page publik.
     */
    public function index()
    {
        return view('index');
    }
}