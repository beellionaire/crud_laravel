<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index()
    {
        return view('sekolah');
    }
    public function fetchSekolah()
    {
        $response = Http::get('https://api-sekolah-indonesia.vercel.app');
        return response()->json($response->json());
    }
}
