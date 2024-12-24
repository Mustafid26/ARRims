<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function ar($id)
{
    $product = Product::findOrFail($id); // Ambil produk berdasarkan ID
    return view('ar', compact('product')); // Kirimkan data produk ke halaman AR
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input: '3d_model' untuk file model 3D dan 'image' untuk gambar
        $request->validate([
            'title' => 'required', // Pastikan kolom title ada
            'price' => 'required|numeric', // Validasi harga produk
            'image' => 'required|image', // Validasi gambar
            'model' => 'nullable|file|mimes:glb,gltf|max:20480', // Validasi file GLB/GLTF
        ]);

        // Penyimpanan gambar (image)
        $imagePath = $request->file('image')->store('images', 'public'); // Penyimpanan di folder 'images'

        // Penyimpanan model 3D (GLB/GLTF)
        $modelPath = null;
        if ($request->hasFile('model')) {
            $modelPath = $request->file('model')->store('models', 'public'); // Penyimpanan di folder 'models'
        }

        // Menyimpan data produk ke dalam database
        Product::create([
            'title' => $request->title,
            'price' => $request->price,
            'image' => $imagePath,
            'model' => $modelPath, // Simpan path ke file model (nullable)
        ]);

        // Redirect setelah berhasil menyimpan data
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    // Ambil produk berdasarkan ID
    $product = Product::findOrFail($id);

    // Kirimkan data produk ke view
    return view('admin.products.show', compact('product'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    // Ambil produk berdasarkan ID
    $product = Product::findOrFail($id);

    // Kirimkan data produk ke view
    return view('admin.products.edit', compact('product'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
{
    $request->validate([
        'title' => 'required',
        'price' => 'required|numeric',
        'image' => 'nullable|image',
        'model' => 'nullable|mimes:glb,gltf',
    ]);

    $data = [
        'title' => $request->title,
        'price' => $request->price,
    ];

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('images');
    }

    if ($request->hasFile('model')) {
        $data['model'] = $request->file('model')->store('models');
    }

    $product->update($data);

    return redirect()->route('admin.products.index')
        ->with('success', 'Product updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Product deleted successfully');
    }
    
}
