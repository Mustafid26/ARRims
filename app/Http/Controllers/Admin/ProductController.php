<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|file|mimes:jpg,jpeg,png',
            'model_type' => 'required|in:glb,gltf',
            'model_glb' => 'nullable|file',
            'scene_gltf' => 'file',
            'scene_bin' => 'nullable|file|',
            'textures.*' => 'nullable|required|file|mimes:jpg,jpeg,png',
        ]);
        $imagePath = $request->file('image')->store('images', 'public');

        $data = [
            'title' => $request->title,
            'price' => $request->price,
            'image' => $imagePath,
        ];

        if ($request->model_type === 'glb' && $request->hasFile('model_glb')) {
            $data['model_glb'] = $request->file('model_glb')->storeAs('models', $request->file('model_glb')->getClientOriginalName(), 'public');
        }
        
        if ($request->model_type === 'gltf') {
            if ($request->hasFile('scene_gltf')) {
                $file = $request->file('scene_gltf');
                $originalName = $file->getClientOriginalName();
                $data['scene_gltf'] = $file->storeAs('models', $originalName, 'public');
            }
        
            if ($request->hasFile('scene_bin')) {
                $data['scene_bin'] = $request->file('scene_bin')->storeAs('models', $request->file('scene_bin')->getClientOriginalName(), 'public');
            }
        
            if ($request->hasFile('textures')) {
                $textures = [];
                foreach ($request->file('textures') as $texture) {
                    $textures[] = $texture->storeAs('models/textures', $texture->getClientOriginalName(), 'public');
                }
                $data['textures'] = json_encode($textures);
            }
        }        
        Product::create($data);
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully');
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
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|file|mimes:jpg,jpeg,png',
            'model_type' => 'required|in:glb,gltf',
            'model_glb' => 'required_if:model_type,glb|file|mimes:glb',
            'scene_gltf' => 'required|file|mimes:gltf',
            'scene_bin' => 'required|file|mimes:bin',
            'textures.*' => 'nullable|required|file|mimes:jpg,jpeg,png',
        ]);

        $data = [
            'title' => $request->title,
            'price' => $request->price,
        ];

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete($product->image);
            }
            $data['image'] = $request->file('image')->store('images');
        }
        if ($request->model_type === 'glb' && $request->hasFile('model_glb')) {
            if ($product->model) {
                Storage::delete($product->model);
            }
            $data['model'] = $request->file('model_glb')->store('models');
        }

        if ($request->model_type === 'gltf') {
            if ($request->hasFile('scene_gltf')) {
                if ($product->model) {
                    Storage::delete($product->model);
                }
                $data['model'] = $request->file('scene_gltf')->store('models');
            }
            if ($request->hasFile('scene_bin')) {
                if ($product->scene_bin) {
                    Storage::delete($product->scene_bin);
                }
                $data['scene_bin'] = $request->file('scene_bin')->store('models');
            }
            if ($request->hasFile('textures')) {
                if ($product->textures) {
                    foreach (json_decode($product->textures) as $texture) {
                        Storage::delete($texture);
                    }
                }
                $textures = [];
                foreach ($request->file('textures') as $texture) {
                    $textures[] = $texture->store('models/textures');
                }
                $data['textures'] = json_encode($textures);
            }
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
