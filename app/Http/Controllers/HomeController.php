<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman beranda dengan daftar produk.
     */
    public function index()
    {
        // Ambil semua produk dari database
        $products = Product::all();

        // Kirim data produk ke halaman beranda
        return view('home', compact('products'));
    }
}
