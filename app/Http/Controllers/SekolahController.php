<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SekolahController extends Controller
{
    public function index()
    {
        return view('sekolah');
    }
    public function fetchSekolah()
    {
        $response = Http::get('https://api-sekolah-indonesia.vercel.app/sekolah');
        return response()->json($response->json());
    }
}
