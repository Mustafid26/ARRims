<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\User; // Menambahkan model User
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Show the dashboard view with product and user data.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil data produk
        $products = Product::all();

        // Mengambil data pengguna
        $users = User::all();

        // Menghitung jumlah produk dan pengguna
        $totalProducts = $products->count();
        $totalUsers = $users->count();

        // Mengirimkan data ke view
        return view('admin.dashboard', compact('products', 'totalProducts', 'totalUsers'));
    }
}
