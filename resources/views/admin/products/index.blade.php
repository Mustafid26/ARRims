@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Products</h1>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Add New Product</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>3D Model</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->title }}</td>
                <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                <td><img src="{{ asset('storage/' . $product->image) }}" width="100" alt="Product Image"></td>
                <td>
                    @if($product->model_glb)
                        <model-viewer 
                            src="{{ asset('storage/' . $product->model_glb) }}" 
                            alt="3D Model of {{ $product->title }}" 
                            auto-rotate 
                            camera-controls 
                            style="width: 200px; height: 200px;">
                        </model-viewer>
                    @elseif($product->scene_gltf) 
                        <model-viewer 
                            src="{{ asset('storage/' . $product->scene_gltf) }}" 
                            alt="3D Model of {{ $product->title }}" 
                            auto-rotate 
                            camera-controls 
                            style="width: 200px; height: 200px;">
                        </model-viewer>
                    @else
                        <span class="text-muted">No 3D Model</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Apakah Anda yakin ingin menghapus produk ini?')) { this.closest('form').submit(); }">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Import Model Viewer -->
<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
@endsection
